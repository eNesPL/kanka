<?php /** @var \App\Models\EntityAsset $asset */?>
<div class="">
    <div class="entity-asset asset-file flex justify-center items-center overflow-hidden mb-4">
        <a href="{{ Storage::url($asset->metadata['path']) }}" target="_blank" class="w-1/2 block h-20 cover-background icon rounded flex items-center align-center justify-center bg-black/10 " @if($asset->isImage()) style="background-image: url({{ $asset->imageUrl() }})"@endif>
            @if (!$asset->isImage())
            <i class="text-3xl fa-solid fa-file-o" aria-hidden="true"></i>
            @endif
        </a>
        <div class="w-1/2 text truncate p-2">
            {!! $asset->name !!}<br />

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
