<?php
/**
 * @var \App\Models\Campaign $campaign
 * @var \App\Models\CampaignBoost $boost
 */
?>
<header>
    <h4 id="boostedDialogTitle">
        {!! __('settings/boosters.superboost.title', ['campaign' => $campaign->name]) !!}
    </h4>
    <button type="button" class="rounded-full" onclick="this.closest('dialog').close('close')">
        <i class="fa-solid fa-times" aria-hidden="true"></i>
        <span class="sr-only">{{ __('crud.delete_modal.close') }}</span>
    </button>
</header>
<article class="text-center">
    <div class="w-full">
    @include ('partials.boost_icon')
    </div>

    @if ($campaign->superboosted())
        <p>{!! __('settings/boosters.superboost.errors.boosted', ['campaign' => $campaign->name])!!}</p>
    @elseif(auth()->user()->availableBoosts() < $cost)
        @subscriber
            <p class="my-1">
                {!! __('settings/boosters.boost.errors.out-of-boosters', [
                    'upgrade' => link_to_route('settings.subscription', __('settings/boosters.boost.upgrade')),
                    'cost' => '<code>' . $cost . '</code>',
                    'available' => '<strong>' . auth()->user()->availableBoosts() . '</strong>'
                ]) !!}
            </p>

            <div class="text-center my-5">
                <button type="button" class="btn px-8 rounded-full mr-5" data-dismiss="modal">
                    {{ __('crud.cancel') }}
                </button>
                <a href="{{ route('settings.subscription') }}" class="btn bg-boost text-white rounded-full px-8">
                    {!! __('settings/boosters.boost.actions.upgrade') !!}
                </a>
            </div>
        @else
            <p class="my-1">
                {{ __('settings/boosters.boost.pitch') }}
            </p>

            <div class="text-center my-3">
                <a href="{{ route('front.boosters') }}" target="_blank" class="btn bg-boost text-white rounded-full px-8 mr-5">
                    {!! __('callouts.booster.learn-more') !!}
                </a>
                <a href="{{ route('settings.subscription') }}" class="btn bg-boost text-white rounded-full px-8">
                    {!! __('settings/boosters.boost.actions.subscribe') !!}
                </a>
            </div>
        @endsubscriber
    @else

        <p class="my-3">
            {!! __('settings/boosters.superboost.upgrade', [
    'cost' => '<code>' . $cost . '</code>',
    'campaign' => '<strong>' . $campaign->name . '</strong>'
    ])!!}
        </p>
        <p class="my-3">{{ __('settings/boosters.boost.duration') }}</p>

       {!! Form::model($boost, ['route' => ['campaign_boosts.update', $boost], 'method' => 'PATCH', 'class' => 'w-full']) !!}
        <div class="flex gap-2 justify-center mb-5">
            <button type="button" class="btn btn-ghost"  onclick="this.closest('dialog').close('close')">
                {{ __('crud.cancel') }}
            </button>
            <button type="submit" class="btn bg-boost">
                <span class="fa-solid fa-rocket mr-1" aria-hidden="true"></span>
                <span class="">{{ __('settings/boosters.superboost.actions.confirm') }}</span>
            </button>
        </div>
        {!! Form::hidden('action', 'superboost') !!}
        {!! Form::hidden('campaign_id', $campaign->id) !!}
        {!! Form::close() !!}
    @endif
</article>
