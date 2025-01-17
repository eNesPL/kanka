<?php
$required = !isset($bulk);
$horizontalForm = isset($horizontalForm) ? $horizontalForm : false;
?>
<div class="form-group">
    <label @if($horizontalForm) class="control-label col-sm-3 col-lg-2" @endif>{{ __('entities/links.fields.icon') }}</label>
        @if($campaignService->campaign()->boosted())
            @if($horizontalForm) <div class="col-sm-9 col-lg-10"> @endif
                {!! Form::text(
                    'icon',
                    null,
                    [
                        'placeholder' => 'fa-solid fa-users',
                        'class' => 'form-control',
                        'maxlength' => 45
                    ]
                ) !!}
                @if ($horizontalForm) </div> @endif
                <p class="help-block">
                    {!! __('entities/links.helpers.icon', [
                        'fontawesome' => link_to(config('fontawesome.search'), 'FontAwesome', ['target' => '_blank']),
                        'rpgawesome' => link_to('https://nagoshiashumari.github.io/Rpg-Awesome/', 'RPGAwesome', ['target' => '_blank']),
                        'docs' => link_to('https://docs.kanka.io/en/latest/features/campaigns/sidebar.html#what-fonts-are-available', __('front.menu.documentation', ['target' => '_blank']))
                    ]) !!}
                </p>
            @else
                @subscriber()
                <p class="help-block">
                    {!! __('callouts.booster.pitches.icon', ['boosted-campaign' => link_to_route('settings.boost', __('concept.boosted-campaign'), ['campaign' => $campaignService->campaign()])]) !!}
                </p>
            @else
                <p class="help-block">
                    {!! __('callouts.booster.pitches.icon', ['boosted-campaign' => link_to_route('front.boosters', __('concept.boosted-campaign'))]) !!}
                </p>
                @endsubscriber

            @endif
        </div>
