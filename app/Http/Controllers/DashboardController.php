<?php

namespace App\Http\Controllers;

use App\Facades\CampaignLocalization;
use App\Facades\Dashboard;
use App\Facades\DataLayer;
use App\Models\CampaignDashboardWidget;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    /**
     */
    public function index()
    {
        // Check the campaign
        $campaign = CampaignLocalization::getCampaign();
        if (empty($campaign) && (Auth::check() && !Auth::user()->hasCampaigns())) {
            return redirect()->route('start');
        }

        $user = null;
        $settings = null;
        if (Auth::check() && Auth::user()->can('dashboard', $campaign)) {
            $settings = true;
        }

        // Determine the user's dashboard
        $requestedDashboard = request()->get('dashboard');
        if ($requestedDashboard == 'default') {
            $requestedDashboard = -1;
        }
        $dashboard = Dashboard::campaign($campaign)
            ->getDashboard((int) $requestedDashboard);
        $dashboards = Dashboard::getDashboards();

        $widgets = CampaignDashboardWidget::onDashboard($dashboard)->positioned()->get();

        // A user with campaigns doesn't need this process.
        $gaTrackingEvent = null;
        $welcome = false;
        if (session()->has('user_registered')) {
            session()->remove('user_registered');
            $gaTrackingEvent = 'pa10CJTvrssBEOaOq7oC';
            DataLayer::newAccount();
            $welcome = true;
        }

        return view('home', compact(
            'campaign',
            'settings',
            'widgets',
            'dashboard',
            'dashboards',
            'welcome',
            'gaTrackingEvent',
        ));
    }

    /**
     * @param int $id
     */
    public function recent($id)
    {
        /** @var CampaignDashboardWidget $widget */
        $widget = CampaignDashboardWidget::findOrFail($id);
        $campaign = CampaignLocalization::getCampaign();
        if ($widget->widget != CampaignDashboardWidget::WIDGET_RECENT) {
            return response()->json([
                'success' => true
            ]);
        }

        $entities = $widget->entities();

        return view('dashboard.widgets._recent_list')
            ->with('entities', $entities)
            ->with('widget', $widget)
            ->with('campaign', $campaign)
        ;
    }

    /**
     * @param int $id
     */
    public function unmentioned($id)
    {
        /** @var CampaignDashboardWidget $widget */
        $widget = CampaignDashboardWidget::findOrFail($id);
        $campaign = CampaignLocalization::getCampaign();
        if ($widget->widget != CampaignDashboardWidget::WIDGET_UNMENTIONED) {
            return response()->json([
                'success' => true
            ]);
        }

        $entities = \App\Models\Entity::unmentioned()
            ->inTags($widget->tags->pluck('id')->toArray())
            ->type($widget->conf('entity'))
            ->with(['updater'])
            ->paginate(10);

        return view('dashboard.widgets._recent_list')
            ->with('entities', $entities)
            ->with('widget', $widget)
            ->with('campaign', $campaign)
        ;
    }
}
