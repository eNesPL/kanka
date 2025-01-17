@extends('layouts.' . (request()->ajax() ? 'ajax' : 'app'), [
    'title' => trans('campaigns.roles.edit.title', ['name' => $role->name]),
    'breadcrumbs' => [
        ['url' => route('campaign'), 'label' => __('entities.campaign')],
        ['url' => route('campaign_roles.index'), 'label' => trans('campaigns.show.tabs.roles')],
        $role->name,
    ],
    'mainTitle' => false,
])

@section('content')
    {!! Form::model($role, ['method' => 'PATCH', 'route' => ['campaign_roles.update', $role->id], 'data-shortcut' => 1, 'class' => 'entity-form']) !!}

    @include('partials.forms.form', [
            'title' => __('campaigns.roles.edit.title', ['name' => $role->name]),
            'content' => 'campaigns.roles._form',
            'submit' => __('campaigns.roles.actions.rename')
        ])
    {!! Form::hidden('campaign_id', $model->id) !!}
    {!! Form::close() !!}
@endsection
