<?php /**
 * @var \App\Models\MiscModel $model
 * @var \App\Services\CampaignService $campaign
 */
?>
@if ($campaignService->enabled('locations') && $model->location)
    <div class="entity-header-sub pull-left">
        <i class="ra ra-tower" title="{{ __('entities.location') }}"></i>

        @if ($model->location->parentLocation)
            {!! __('crud.fields.locations', [
                'first' => $model->location->tooltipedLink(),
                'second' => $model->location->parentLocation->tooltipedLink(),
            ]) !!}
        @else
            {!! $model->location->tooltipedLink() !!}
        @endif

    </div>
@endif
