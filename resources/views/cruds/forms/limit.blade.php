@extends('layouts.' . (request()->ajax() ? 'ajax' : 'app'), [
    'title' => __($name . '.create.title'),
    'breadcrumbs' => [
        ['url' => Breadcrumb::index($name), 'label' => __('entities.' . $name)],
        __('crud.create'),
    ]
])

@inject('campaignService', 'App\Services\CampaignService')

@section('content')
    @include('layouts.callouts.limit', ['texts' => [__('campaigns/limits.' . $key)]])
@endsection
