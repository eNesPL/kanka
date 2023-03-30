<?php /**
 * @var \App\Models\CampaignBoost $boost
 * @var \App\Models\Campaign $campaign
 */
?>
@extends('layouts.app', [
    'title' => __('billing/payment_methods.title'),
    'breadcrumbs' => false,
    'sidebar' => 'settings',
])

@section('content')
    @include('partials.errors')
    <div class="max-w-3xl">

        <h1 class="mb-5">
            {{ __('billing/payment_methods.title') }}
        </h1>
        <p class="text-lg">
            {!! __('settings.subscription.billing.helper', [
                'stripe' => link_to('https://www.stripe.com', 'Stripe', ['target' => '_blank'])
            ]) !!}
        </p>
        <div class="box box-solid">
            <div class="box-body">

                <strong>
                    {{ __('settings.subscription.billing.saved' )}}
                </strong>
                <div id="billing">
                    <billing-management
                            api_token="{{ $stripeApiToken }}"
                            trans="{{ $translations }}"
                    ></billing-management>
                </div>

                <hr />

                {!! Form::model(auth()->user(), ['method' => 'PATCH', 'route' => ['billing.payment-method.save']]) !!}
                <div class="w-full mb-2">
                    <label class="font-bold inline-block my-1">{{ __('settings.subscription.fields.currency') }}</label>
                    {!! Form::select('currency', ['' => __('settings.subscription.currencies.usd'), 'eur' => __('settings.subscription.currencies.eur')], auth()->user()->currency(), ['class' => 'rounded border w-full p-2']) !!}
                </div>
                <button class="rounded px-6 py-2 uppercase bg-blue-600 text-white hover:bg-blue-800 ">
                    {{ __('settings.subscription.actions.update_currency') }}
                </button>
                {!! Form::close() !!}

            </div>
        </div>
    </div>
@endsection


@section('scripts')
    @parent
    @vite('resources/js/billing.js')
@endsection
