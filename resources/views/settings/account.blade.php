<?php /** @var \App\User $user */?>
@extends('layouts.app', [
    'title' => __('settings.account.title'),
    'breadcrumbs' => false,
    'sidebar' => 'settings',
    'noads' => true,
])

@section('content')
    <div class="max-w-4xl">
        {!! Form::model($user, ['method' => 'PATCH', 'route' => ['settings.account.email']]) !!}
        <div class="grid md:grid-cols-2 gap-2">
        <div class="box box-solid flex flex-col">
            <div class="box-header">
                <h3 class="box-title">
                    {{ __('settings.account.email') }}
                </h3>
            </div>
            <div class="box-body grow">
                <div class="mb-2">
                    <label class="font-bold">{{ __('profiles.fields.email') }} <span class="text-red">*</span></label>
                    {!! Form::email('email', null, ['placeholder' => __('profiles.placeholders.email'), 'class' => 'w-full rounded border p-2']) !!}
                </div>
            </div>
            <div class="box-footer text-right">
                <button class="btn btn-primary">
                    {{ __('settings.account.actions.update_email') }}
                </button>
            </div>
        </div>
        {!! Form::close() !!}


        <div class="box box-solid flex flex-col">
            @if (!$user->isSocialLogin())
            <div class="box-header">
                <h3 class="box-title">
                    {{ __('settings.account.password') }}
                </h3>
            </div>
            {!! Form::model($user, ['method' => 'PATCH', 'route' => ['settings.account.password']]) !!}
            <div class="box-body grow">
                <div class="mb-2">
                    <label class="font-bold">{{ __('profiles.fields.new_password') }}</label>
                    {!! Form::password('password_new', ['placeholder' => __('profiles.placeholders.new_password'), 'class' => 'w-full rounded border p-2']) !!}
                </div>
                <div class="mb-2">
                    <label class="font-bold">{{ __('profiles.fields.new_password_confirmation') }}</label>
                    {!! Form::password('password_new_confirmation', ['placeholder' => __('profiles.placeholders.new_password_confirmation'), 'class' => 'w-full rounded border p-2']) !!}
                </div>
            </div>
            <div class="box-footer text-right">
                <button class="btn btn-primary">
                    {{ __('settings.account.actions.update_password') }}
                </button>
            </div>
            {!! Form::close() !!}
            @else
            <div class="box-header with-border">
                <h3 class="box-title">
                    {{ __('settings.account.social.title') }}
                </h3>
            </div>
            {!! Form::model($user, ['method' => 'PATCH', 'route' => ['settings.account.social']]) !!}

            <div class="box-body">

                <p class="help">{{ __('settings.account.social.helper', ['provider' => ucfirst($user->provider)]) }}</p>
                <div class="form-group">
                    <label>{{ __('profiles.fields.new_password') }}</label>
                    {!! Form::password('password_new', ['placeholder' => __('profiles.placeholders.new_password'), 'class' => 'w-full rounded border p-2']) !!}
                </div>
            </div>
            <div class="box-footer text-right">
                <button class="btn btn-primary">
                    {{ __('settings.account.actions.social') }}
                </button>
            </div>
            {!! Form::close() !!}
            @endif
        </div>
        </div>

        @includeWhen(config('google2fa.enabled'), 'settings._tfa')

        <div class="box box-solid">
            <div class="box-header with-border">
                <h3 class="box-title text-red">
                    {{ __('profiles.sections.dangerzone') }}
                </h3>
            </div>
            <div class="box-body">
                <div class="flex gap-2">
                    <div class="grow">
                        <strong>
                            {{ __('profiles.sections.delete.title') }}
                        </strong><br />
                        <p>{{ __('profiles.sections.delete.helper') }}</p>


                        @if (auth()->user()->subscribed('kanka') && !auth()->user()->subscription('kanka')->canceled())
                            <p class="text-red">
                                {!! __('profiles.sections.delete.subscribed', [
                'subscription' => link_to_route('settings.subscription', __('settings.menu.subscription'))
            ]) !!}
                            </p>
                        @endif

                    </div>
                    @if (!auth()->user()->subscribed('kanka') || auth()->user()->subscription('kanka')->canceled())
                        <div class="flex-0">
                            <button class="btn btn-outline btn-error" data-toggle="dialog"
                                    data-target="delete-account">
                                <i class="fa-solid fa-exclamation-triangle text-lg mr-1" aria-hidden="true"></i> {{ __('profiles.sections.delete.delete') }}
                            </button>
                        </div>
                    @endif
                </div>



            </div>
        </div>
    </div>
@endsection

@section('modals')
    @parent
    <dialog class="dialog rounded-2xl text-center" id="delete-account" aria-modal="true" aria-labelledby="label-delete-account">
        <header>
            <h4 id="label-delete-account">
                {{ __('profiles.sections.delete.title') }}
            </h4>
            <button type="button" class="rounded-full" onclick="this.closest('dialog').close('close')">
                <i class="fa-solid fa-times" aria-hidden="true"></i>
                <span class="sr-only">{{ __('crud.delete_modal.close') }}</span>
            </button>
        </header>
        {!! Form::model($user, ['method' => 'PATCH', 'route' => ['settings.account.destroy']]) !!}
        <article class="p-5 py-2">
            <p class="mt-3">
                {{ __('profiles.sections.delete.helper') }}
            </p>
            <p class="mt-3">
                {{ __('profiles.sections.delete.warning') }}
            </p>
            <div class="">
                <p>
                    {!! __('profiles.sections.delete.goodbye', ['code' => '<code>goodbye</code>']) !!}
                </p>
                <div class="mb-2">
                    {!! Form::text('goodbye',null, ['class' => 'w-full rounded border p-2','required']) !!}
                </div>
                <button type="submit" class="btn btn-outline w-full btn-error">
                    <i class="fa-solid fa-exclamation-triangle mr-1" aria-hidden="true"></i>
                    {{ __('profiles.sections.delete.confirm') }}
                </button>
            </div>
        </article>
        {!! Form::close() !!}
    </dialog>
@endsection
