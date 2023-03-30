<div class="box box-solid">
    <div class="box-header">
        <h3 class="box-title">
            {{ __('settings.account.2fa.title') }}
        </h3>
    </div>
    @if (!$user->passwordSecurity?->google2fa_enable)
        <div class="box-body">
            <p class="hep-block">{{ __('settings.account.2fa.enabled') }}</p>
        </div>

        <div class="box-footer text-right">
            <button class="btn btn-outline btn-error" data-toggle="dialog" data-target="delete-tfa">
                {{ __('settings.account.2fa.actions.disable') }}
            </button>
        </div>
    @elseif (!auth()->user()->isSubscriber())
        <div class="box-body">
            <p>
                {{ __('settings.account.2fa.helper') }} {!! link_to('https://docs.kanka.io/en/latest/account/security/two-factor-authentication.html', __('settings.account.2fa.learn_more')) !!}
            </p>

            <p>
                {!! __('callouts.subscribe.pitch-2fa', [
                    'more' => link_to_route('front.pricing', __('subscription.benefits.more'), '#paid-features', ['target' => '_blank']),
                    'boosters' => link_to_route('front.boosters', __('subscription.benefits.boosters'), '', ['target' => '_blank'])
                ]) !!}
            </p>
        </div>
    @elseif (auth()->user()->isSubscriber())
        @if(auth()->user()->isSocialLogin())
            <div class="box-body">
                <p>{{ __('settings.account.2fa.social') }}</p>
            </div>
        @elseif(empty($user->passwordSecurity) && (auth()->user()->isSubscriber() || auth()->user()->subscription('kanka')->canceled()))
            <div class="box-body">
                <p>
                    {{ __('settings.account.2fa.helper') }} {!! link_to('https://docs.kanka.io/en/latest/account/security/two-factor-authentication.html', __('settings.account.2fa.learn_more')) !!}
                </p>

                <p>{!! __('settings.account.2fa.enable_instructions', [
                    'android' => link_to('https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2', 'Android', ['target' => '_blank']),
                    'ios' => link_to('https://apps.apple.com/us/app/google-authenticator/id388497605', 'iOS', ['target' => '_blank']),
                ]) !!}</p>
            </div>
            {!! Form::open(['route' => 'settings.security.generate-2fa', 'method' => 'POST']) !!}
                <div class="box-footer text-right">
                    <button type="submit" class="btn btn-primary" name="button">{{ __('settings.account.2fa.generate_qr') }}</button>
                </div>
            {!! Form::close() !!}
        @elseif(!$user->passwordSecurity->google2fa_enable && auth()->user()->isSubscriber() || auth()->user()->subscription('kanka')->canceled())
            {!! Form::open(['route' => 'settings.security.enable-2fa', 'method' => 'POST']) !!}
            <div class="box-body">
                <p>{{ __('settings.account.2fa.activation_helper') }}</p>

                <div class="form-group required">
                    <label>{{ __('settings.account.2fa.fields.qrcode') }}</label><br />
                    {!! $user->passwordSecurity->getGoogleQR() !!}
                </div>
                <div class="form-group required">
                    <label>{{ __('settings.account.2fa.fields.otp') }}</label>
                    {!! Form::password('otp', ['class' => 'form-control', 'maxlength' => 12]) !!}
                </div>
            </div>
            <div class="box-footer text-right">
                <button type="submit" class="btn btn-primary" name="button">{{ __('settings.account.2fa.actions.finish') }}</button>
            </div>
            {!! Form::close() !!}
       @endif
  @endif
</div>

@section('modals')
    @parent
    @if(!$user->passwordSecurity?->google2fa_enable))

    <dialog class="dialog rounded-2xl text-center" id="delete-tfa" aria-modal="true" aria-labelledby="label-delete-tfa">
        <header>
            <h4 id="label-delete-tfa">
                {{ __('settings.account.2fa.disable.title') }}
            </h4>
            <button type="button" class="rounded-full" onclick="this.closest('dialog').close('close')">
                <i class="fa-solid fa-times" aria-hidden="true"></i>
                <span class="sr-only">{{ __('crud.delete_modal.close') }}</span>
            </button>
        </header>
        {!! Form::model($user, ['method' => 'POST', 'route' => ['settings.security.disable-2fa']]) !!}
        <article class="p-5 py-2">
            <p class="mt-3">
                {{ __('settings.account.2fa.disable.helper') }}                    </p>
            <div class="py-5">
                <button type="submit" class="btn btn-error">
                    <i class="fa-solid fa-exclamation-triangle mr-1" aria-hidden="true"></i>
                    {{ __('crud.click_modal.confirm') }}
                </button>
            </div>
        </article>
        {!! Form::close() !!}
    </dialog>
    @endif
@endsection
