<?php
/**
 * @var \App\Models\TimelineEra $era
 * @var \App\Models\Timeline $model
 * @var \App\Services\CampaignService $campaign
 */
?>
    <p class="help-block">
        {{ __('timelines/eras.helper.primary') }}
    </p>

@if(isset($model))
    <table class="table table-condensed">
    <thead>
    <tr>
        <th>{{ __('crud.fields.name') }}</th>
        <th>{{ __('timelines/eras.fields.abbreviation') }}</th>
        <th>{{ __('timelines/eras.fields.start_year') }}</th>
        <th>{{ __('timelines/eras.fields.end_year') }}</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php $eras = $model->eras()->ordered()->paginate(); ?>
    @foreach ($eras as $era)
        <tr>
            <td>{{ $era->name }}</td>
            <td>{{ $era->abbreviation }}</td>
            <td>{{ $era->start_year }}</td>
            <td>{{ $era->end_year }}</td>
            <td class="text-right">
                <a href="{{ route('timelines.timeline_eras.edit', [$model, $era]) }}" class="btn btn-primary btn-xs"
                   title="{{ __('crud.edit') }}"
                   data-toggle="ajax-modal" data-target="#entity-modal"
                   data-url="{{ route('timelines.timeline_eras.edit', [$model, $era]) }}"
                >
                    <i class="fa fa-pencil"></i>
                </a>

                <a href="#" class="btn btn-xs btn-danger delete-confirm" data-toggle="modal" data-name="{{ $era->name }}"
                        data-target="#delete-confirm" data-delete-target="delete-form-timeline-{{ $era->id }}"
                        title="{{ __('crud.remove') }}">
                    <i class="fa fa-trash" aria-hidden="true"></i>
                </a>
            </td>
        </tr>
    @endforeach

    </tbody>
    </table>

    <div class="pull-right">
        {{ $eras->links() }}
    </div>

    <a href="{{ route('timelines.timeline_eras.create', ['timeline' => $model]) }}" class="btn btn-primary btn-sm"
       data-toggle="ajax-modal" data-target="#entity-modal"
       data-url="{{ route('timelines.timeline_eras.create', ['timeline' => $model]) }}"
    >
        <i class="fas fa-plus"></i> {{ __('maps/groups.actions.add') }}
    </a>


@if (!empty($eras))
@section('modals')
    @parent
    @foreach ($eras as $era)
        {!! Form::open(['method' => 'DELETE', 'route' => ['timelines.timeline_eras.destroy', $model, $era], 'style '=> 'display:inline', 'id' => 'delete-form-era-' . $era->id]) !!}
        {!! Form::close() !!}
    @endforeach
@endsection
@endif

@else
    <p class="help-block">
        {{ __('timelines.helpers.eras') }}
    </p>
@endif


@section('scripts')
    @parent
    <script src="{{ mix('js/timeline.js') }}" defer></script>
@endsection
