<?php /** @var \App\Models\Tag $tag */?>
@if ($campaignService->enabled('tags') && $model->entity->tags()->count() > 0)
    <li class="list-group-item entity-tags">
        <b>{{ __('entities.tags') }}</b>
        <p>
            @foreach ($model->entity->tags()->with('entity')->get() as $tag)
                <a href="{{ route('tags.show', $tag) }}" data-toggle="tooltip-ajax" data-id="{{ $tag->entity->id }}"
                   data-url="{{ route('entities.tooltip', $tag->entity->id) }}">
                    {!! $tag->html() !!}
                </a>
            @endforeach
        </p>
    </li>
@endif
