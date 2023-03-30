<?php /**
 * @var \App\Models\CampaignBoost $boost
 * @var \App\Models\Campaign $campaign
 */
?>
@extends('layouts.app', [
    'title' => __('settings/boosters.title'),
    'breadcrumbs' => false,
    'sidebar' => 'settings',
    'noads' => true,
])

@section('content')
    @include('partials.errors')

    <div class="max-w-3xl">
        <h1 class="mb-5">
            <i class="fa-solid fa-rocket" aria-hidden="true"></i>
            {{ __('settings/boosters.title') }}
        </h1>

        <div style="" class=" box">
            <div class="box-body">
                <h3 class="my-1">{{ __('settings/boosters.pitch.title') }}</h3>
                <p class="my-5">{{ __('settings/boosters.pitch.description') }}</p>

                <h4 class="mt-5">{{ __('settings/boosters.pitch.benefits.title') }}</h4>
                <div class="grid grid-cols-2 lg:grid-cols-3 gap-1 mb-3">
                    <div class="flex">
                        <div class="p-1 w-12 flex-none">
                            <i class="fa-solid fa-palette fa-2x" aria-hidden="true"></i>
                        </div>
                        <div class="p-1">
                            {{ __('settings/boosters.pitch.benefits.customisable') }}
                        </div>
                    </div>
                    <div class="flex">
                        <div class="p-1 w-12 flex-none">
                            <i class="fa-solid fa-image-portrait fa-2x" aria-hidden="true"></i>
                        </div>
                        <div class="p-1">
                            {{ __('settings/boosters.pitch.benefits.entities') }}
                        </div>
                    </div>
                    <div class="flex">
                        <div class="p-1 w-12 flex-none">
                            <i class="fa-solid fa-hourglass-half fa-2x" aria-hidden="true"></i>
                        </div>
                        <div class="p-1">
                            {{ __('settings/boosters.pitch.benefits.backup', ['amount' => config('entities.hard_delete')]) }}
                        </div>
                    </div>
                    <div class="flex">
                        <div class="p-1 w-12 flex-none">
                            <i class="fa-solid fa-horse-head fa-2x" aria-hidden="true"></i>
                        </div>
                        <div class="p-1">
                            {{ __('settings/boosters.pitch.benefits.icons') }}
                        </div>
                    </div>
                    <div class="flex">
                        <div class="p-1 w-12 flex-none">
                            <i class="fa-solid fa-camera fa-2x" aria-hidden="true"></i>
                        </div>
                        <div class="p-1">
                            {{ __('settings/boosters.pitch.benefits.upload') }}
                        </div>
                    </div>
                    <div class="flex">
                        <div class="p-1 w-12 flex-none">
                            <i class="fa-solid fa-user-group fa-2x" aria-hidden="true"></i>
                        </div>
                        <div class="p-1">
                            {{ __('settings/boosters.pitch.benefits.relations') }}
                        </div>
                    </div>
                </div>
                <p>{!! __('settings/boosters.pitch.more', ['boosters' => link_to_route('front.boosters', __('footer.boosters'))]) !!}</p>
            </div>
        </div>


        <h2 class="mt-5">
            {{ __('settings/boosters.ready.title') }}

            @if (auth()->user()->hasBoosters() || !empty(auth()->user()->booster_count))
                <div class="rounded inline-block label bg-boost text-white ml-3 px-2 py-1 text-base" title="{{ __('settings/boosters.ready.available') }}">
                    <i class="fa-solid fa-rocket" aria-hidden="true"></i>
                    {{ auth()->user()->availableBoosts() }}
                </div>
            @endif
        </h2>
        @if (!auth()->user()->isGoblin())
        <p>{!! __('settings/boosters.ready.pricing', [
        'amount' => '<strong>' . __('settings/boosters.ready.pricing-amount', [
            'currency' => auth()->user()->currencySymbol(),
            'amount' => '5.00'
        ]) . '</strong>'
        ]) !!}</p>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 campaign-list mb-5">
            @foreach ($boosts as $boost)
                @include('settings.boosters._campaign', ['campaign' => $boost->campaign])
            @endforeach
            @foreach ($campaigns as $campaign)
                @include('settings.boosters._campaign')
            @endforeach
        </div>
    </div>

@endsection

@section('styles')
    @parent
    @vite('resources/sass/settings.scss')
@endsection

@section('modals')
    @parent

    <dialog class="dialog rounded-2xl text-center" id="boost-modal" aria-modal="true" aria-labelledby="privacyDialogTitle">
        <article class="loader text-center p-5">
            <i class="fa-solid fa-spinner fa-spin fa-2x" aria-hidden="true"></i>
        </article>
    </dialog>
    @if ($focus)
        <dialog class="dialog rounded-2xl text-center min-w-fit" id="focus-modal-2" aria-modal="true" aria-labelledby="boostedDialogTitle" data-dialog="open">
            @include('settings.boosters.create', [
                'campaign' => $focus,
                'superboost' => $superboost,
                'cost' => $superboost ? 3 : 1,
                'canSuperboost' => auth()->user()->availableBoosts() >= 3
            ])
        </dialog>
    @endif

@endsection

@section('scripts')
    @parent
    @vite('resources/js/settings.js')
@endsection
