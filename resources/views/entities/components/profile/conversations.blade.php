<?php /** @var \App\Models\Conversation $model */?>

@if (!$model->showProfileInfo())
    @php return @endphp
@endif

<div class="sidebar-section-box sidebar-section-profile">
    <div class="sidebar-section-title cursor-pointer text-lg user-select" data-toggle="collapse" data-target="#sidebar-profile-elements">
        <i class="fa-solid fa-chevron-right" style="display: none"></i>
        <i class="fa-solid fa-chevron-down"></i>
        {{ __('crud.tabs.profile') }}
    </div>

    <div class="sidebar-elements grid my-1 collapse !visible in" id="sidebar-profile-elements">

        <div class="element profile-target">
            <div class="title text-uppercase text-xs">{{ __('conversations.fields.target') }}</div>
            {{ __('conversations.targets.' . ($model->forCharacters() ? 'characters' : 'members')) }}
        </div>


        @include('entities.components.profile._type')
    </div>
</div>
