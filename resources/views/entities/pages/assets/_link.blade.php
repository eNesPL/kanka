<?php /** @var \App\Models\EntityAsset $asset */?>
<div class="">
    <div class="entity-asset asset-link flex justify-center items-center overflow-hidden mb-4">
        <a href="{{ route('entities.entity_assets.go', [$entity, $asset]) }}" target="_blank" class="w-1/2 h-20 block text-center icon rounded flex items-center align-center justify-center bg-black/10 ">
            <i class="text-3xl {{ $asset->icon() }}" aria-hidden="true"></i>
        </a>
        <div class="w-1/2 text truncate p-2">
            {!! $asset->name !!}<br />
            <div class="url">{{ $asset->metadata['url'] }}</div>

            <div class="text-lg">
            @if(auth()->check() && auth()->user()->can('update', $entity->child))
                <a href="#" data-toggle="ajax-modal" data-target="#entity-modal" data-url="{{ route('entities.entity_assets.edit', [$entity, $asset]) }}">
                    <i class="fa-solid fa-pencil" aria-hidden="true" aria-label="{{ __('crud.edit') }}"></i>
                </a>
            @endif
            {!! $asset->visibilityIcon() !!}
            </div>

        </div>
    </div>
</div>
