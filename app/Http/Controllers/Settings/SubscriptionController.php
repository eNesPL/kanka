<?php

namespace App\Http\Controllers\Settings;

use App\Facades\DataLayer;
use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\UserAltSubscribeStore;
use App\Http\Requests\Settings\UserSubscribeStore;
use App\Models\Pledge;
use App\Models\SubscriptionCancellation;
use Carbon\Carbon;
use App\Services\SubscriptionService;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Laravel\Cashier\Exceptions\IncompletePayment;

class SubscriptionController extends Controller
{
    /** @var SubscriptionService */
    protected $subscription;

    /**
     * SubscriptionController constructor.
     * @param SubscriptionService $service
     */
    public function __construct(SubscriptionService $service)
    {
        $this->middleware(['auth', 'identity', 'subscriptions']);
        $this->subscription = $service;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $stripeApiToken = config('cashier.key', null);
        $status = $this->subscription->user(auth()->user())->status();
        $currentPlan = $this->subscription->currentPlan();
        $service = $this->subscription;
        /** @var User $user */
        $user = Auth::user();
        $currency = $user->currencySymbol();
        $invoices = !empty($user->stripe_id) ? $user->invoices(true, ['limit' => 3]) : [];
        $tracking = session()->get('sub_tracking');
        $gaTrackingEvent = null;
        if (!empty($tracking)) {
            $gaTrackingEvent = 'TJhYCMDErpYDEOaOq7oC';
            if ($tracking === 'subscribed') {
                DataLayer::newSubscriber();
                DataLayer::add('userSubValue', session('sub_value'));
            } else {
                DataLayer::newCancelledSubscriber();
            }
        }

        // Log that the user visited the page
        Log::info('Subscription view', [
            'user' => $user->id,
            'pledge' => $user->pledge,
        ]);

        return view('settings.subscription.index', compact(
            'stripeApiToken',
            'status',
            'currentPlan',
            'user',
            'currency',
            'service',
            'invoices',
            'tracking',
            'gaTrackingEvent'
        ));
    }

    /**
     * Change subscription modal
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function change(Request $request)
    {
        $tier = $request->get('tier');
        $period = $request->get('period', 'monthly');

        Log::info('Subscription changing', [
            'user' => auth()->user()->id,
            'pledge' => auth()->user()->pledge,
            'tier' => $tier,
            'period' => $period
        ]);

        $amount = $this->subscription->user($request->user())->tier($tier)->period($period)->amount();
        $card = $request->user()->hasPaymentMethod() ? Arr::first($request->user()->paymentMethods()): null;
        if (empty($request->user()->stripe_id)) {
            $request->user()->createAsStripeCustomer();
        }
        $intent = $request->user()->createSetupIntent();
        $cancel = $tier == Pledge::KOBOLD;
        $user = $request->user();
        $isDowngrading = $this->subscription->downgrading();
        $hasPromo = $period == 'yearly' && \Carbon\Carbon::create(2022, 10, 31)->isFuture();

        return view('settings.subscription.change', compact(
            'tier',
            'period',
            'amount',
            'card',
            'intent',
            'cancel',
            'user',
            'isDowngrading',
            'hasPromo',
        ));
    }

    /**
     * Subscribe
     */
    public function subscribe(UserSubscribeStore $request)
    {
        try {
            $this->subscription->user($request->user())
                ->tier($request->get('tier'))
                ->period($request->get('period'))
                ->coupon($request->get('coupon'))
                ->change($request->all())
                ->finish();

            $flash = 'subscribed';
            $routeOptions = ['success' => 1];
            if ($this->subscription->cancelled()) {
                $flash = 'cancel';
                $routeOptions = ['cancelled' => 1];
                SubscriptionCancellation::create([
                    'user_id' => $request->user()->id,
                    'reason' => $request->reason,
                    'custom' => $request->reason_custom,
                    'tier'  => $request->user()->pledge,
                    'duration' => $request->user()->subscription('kanka')->created_at->diffInDays(Carbon::now()),
                ]);
            }

            return redirect()
                ->route('settings.subscription', $routeOptions)
                ->withSuccess(__('settings.subscription.success.' . $flash))
                ->with('sub_tracking', $flash)
                ->with('sub_value', $this->subscription->subscriptionValue());
        } catch (IncompletePayment $exception) {
            session()->put('subscription_callback', $request->get('payment_id'));
            return redirect()->route(
                'cashier.payment',
                // @phpstan-ignore-next-line
                [$exception->payment->id, 'redirect' => route('settings.subscription.callback')]
            );
        } catch (\Exception $e) {
            // Error? json
            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
            ]);
        }
    }

    /**
     * @param UserAltSubscribeStore $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Stripe\Exception\ApiErrorException
     */
    public function altSubscribe(UserAltSubscribeStore $request)
    {
        $source = $this->subscription->user($request->user())
            ->tier($request->get('tier'))
            ->period($request->get('period'))
            ->method($request->get('method'))
            ->prepare($request);

        // @phpstan-ignore-next-line
        return redirect($source->redirect->url);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Stripe\Exception\ApiErrorException
     */
    public function altCallback(Request $request)
    {
        if ($this->subscription->validSource($request->get('source'))) {
            return redirect()
                ->route('settings.subscription')
                ->withSuccess(__('settings.subscription.success.alternative'));
        } else {
            return redirect()
                ->route('settings.subscription')
                ->withErrors(__('settings.subscription.errors.callback'));
        }
    }

    /**
     * Stripe secure 3d callback page handler
     * @param Request $request
     * @return mixed
     */
    public function callback(Request $request)
    {
        // Not expecting a callback
        if (!session()->has('subscription_callback')) {
            return redirect()
                ->route('settings.subscription');
        }

        // This contains our original request
        session()->remove('subscription_callback');

        if ($request->get('success')) {
            return redirect()
                ->route('settings.subscription')
                ->withSuccess(__('settings.subscription.success.callback'));
        }
        return redirect()
            ->route('settings.subscription')
            ->withError(__('settings.subscription.errors.callback'));
    }
}
