@extends('layouts.app', [
    'title' => __('settings.patreon.title'),
    'description' => __('settings.patreon.description'),
    'breadcrumbs' => false,
    'sidebar' => 'settings',
    'noads' => true,
])

@section('content')

    <h1 class="mb-5">
        {{ __('settings.patreon.title') }}
    </h1>

    @include('partials.errors')

    @if(auth()->user()->isLegacyPatron())
        @includeIf('settings.pledges._' . strtolower(auth()->user()->pledge ?: 'kobold'))

        <div class="text-center">
            <button class="btn btn-error" data-toggle="dialog"
                    data-target="remove-patreon">{{ __('settings.patreon.remove.button') }}</button>
        </div>
    @else
        <div class="rounded bg-red-100 p-2 text-base">
            <p>
                {!! __('settings.patreon.deprecated', ['subscription' => link_to_route('settings.subscription', __('settings.menu.subscription'))]) !!}
            </p>
        </div>
    @endif
@endsection

@section('modals')
    <dialog class="dialog rounded-2xl text-center" id="remove-patreon" aria-modal="true" aria-labelledby="label-remove-patreon">
        <header>
            <h4 id="label-remove-patreon">
                {{ __('settings.patreon.remove.title') }}
            </h4>
            <button type="button" class="rounded-full" onclick="this.closest('dialog').close('close')">
                <i class="fa-solid fa-times" aria-hidden="true"></i>
                <span class="sr-only">{{ __('crud.delete_modal.close') }}</span>
            </button>
        </header>
        {!! Form::model(auth()->user(), ['method' => 'DELETE', 'route' => ['settings.patreon.unlink']]) !!}
        <article class="p-5 py-2">
            <p class="text-muted">
                {{ __('settings.patreon.remove.text') }}
            </p>

            <button class="btn btn-outline btn-error mb-5">
                {{ __('crud.click_modal.confirm') }}
            </button>
        </article>
        {!! Form::close() !!}
    </dialog>
@endsection
