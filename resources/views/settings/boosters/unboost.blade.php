<?php
/**
 * @var \App\Models\Campaign $campaign
 * @var \App\Models\CampaignBoost $boost
 */
?>

<header>
    <h4 id="boostedDialogTitle">
        {{ __('settings/boosters.unboost.title') }}
    </h4>
    <button type="button" class="rounded-full" onclick="this.closest('dialog').close('close')">
        <i class="fa-solid fa-times" aria-hidden="true"></i>
        <span class="sr-only">{{ __('crud.delete_modal.close') }}</span>
    </button>
</header>
<article class="text-center">
    <p class="py-5">{!! __('settings/boosters.unboost.warning', [
    'action' => $campaign->superboosted() ? __('settings/boosters.unboost.status.superboosting') : __('settings/boosters.unboost.status.boosting'),
    'campaign' => '<strong>' . $campaign->name . '</strong>'])!!}</p>

   {!! Form::open(['method' => 'DELETE', 'route' => ['campaign_boosts.destroy', $boost->id], 'class' => 'w-full']) !!}
    <div class="flex gap-2 justify-center">
        <button type="button" class="btn btn-ghost"  onclick="this.closest('dialog').close('close')">
            {{ __('crud.cancel') }}
        </button>
        <button type="submit" class="btn btn-error">
            <span class="">{{ __('settings/boosters.unboost.confirm') }}</span>
        </button>
    </div>
    {!! Form::close() !!}


</article>
