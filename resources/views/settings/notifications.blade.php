<?php /** @var \App\User $user */?>
@extends('layouts.app', [
    'title' => __('profiles.newsletter.title'),
    'breadcrumbs' => false,
    'sidebar' => 'settings',
    'noads' => true,
])

@section('content')
    <div class="max-w-4xl">
        <h1 class="mb-5">
            {{ __('profiles.newsletter.title') }}
        </h1>
        <p class="text-lg">
            {{ __('profiles.newsletter.helpers.header') }}
        </p>
        <div class="box box-solid">
            <div class="box-body">
                <p class="help-block">
                </p>
                <div class="form-group checkbox">
                    <label>
                        {!! Form::checkbox('mail_release', 1, $user->mail_release) !!}
                        {!! __('profiles.newsletter.options.monthly') !!}
                    </label>
                    <p class="help-block">
                        {{ __('front/newsletter.groups.all') }}
                    </p>
                </div>

                <input type="hidden" id="newsletter-api" value="{{ route('settings.newsletter-api') }}" />
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @parent
    @vite('resources/js/profile.js')
@endsection
