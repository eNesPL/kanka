@extends('layouts.login', [
    'title' => 'Kanka Permission Authorization',
])

@section('content')
    <h1>Authorization Request</h1>
    <p class="marg">The application <strong>{{ $client->name }}</strong> is requesting permission to access your Kanka account.</p>

    <!-- Scope List -->
    @if (count($scopes) > 0)
        <div class="scopes">
            <p><strong>This application will be able to:</strong></p>

            <ul>
                @foreach ($scopes as $scope)
                    <li>{{ $scope->description }}</li>
                @endforeach
            </ul>
        </div>
    @else
        <div class="alert alert-warning">
            <p>This application will have full access to your account and campaigns.</p>
        </div>
    @endif

    <div style="display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 2rem">
        <!-- Authorize Button -->
        <form method="post" action="{{ route('passport.authorizations.approve') }}">
            @csrf

            <input type="hidden" name="state" value="{{ $request->state }}">
            <input type="hidden" name="client_id" value="{{ $client->id }}">
            <input type="hidden" name="auth_token" value="{{ $authToken }}">
            <button type="submit" class="btn btn-primary btn-approve btn-block">
                <i class="fa-solid fa-check" aria-hidden="true"></i>
                Authorize
            </button>
        </form>

        <!-- Cancel Button -->
        <form method="post" action="{{ route('passport.authorizations.deny') }}">
            @csrf
            @method('DELETE')

            <input type="hidden" name="state" value="{{ $request->state }}">
            <input type="hidden" name="client_id" value="{{ $client->id }}">
            <input type="hidden" name="auth_token" value="{{ $authToken }}">
            <button class="btn btn-danger btn-block">
                <i class="fa-solid fa-ban" aria-hidden="true"></i>
                Deny
            </button>
        </form>
    </div>

    <hr />
    <p>If you are unsure why you are seeing this, contact us at <a href="mailto:{{ config('app.email') }}">{{ config('app.email') }}</a> or directly on <a href="{{ config('social.discord') }}">Discord</a>.</p>

@endsection
