@extends('layouts.app', [
    'title' => trans('characters.dice_rolls.title', ['name' => $model->name]),
    'description' => '',
    'breadcrumbs' => [
        ['url' => route('characters.index'), 'label' => __('entities.characters')],
        ['url' => route('characters.show', $model), 'label' => $model->name],
        trans('characters.show.tabs.dice_rolls')
    ],
    'mainTitle' => false,
    'miscModel' => $model,

])

@inject('campaignService', 'App\Services\CampaignService')

@include('entities.components.header', ['model' => $model])
@section('content')
    @include('partials.errors')
    <div class="row entity-grid">
        <div class="col-md-2 entity-sidebar-submenu">
            @include('characters._menu', ['active' => 'dice_rolls'])
        </div>
        <div class="col-md-10 entity-main-block">
            @include('characters.panels.dice_rolls')
        </div>
    </div>
@endsection
