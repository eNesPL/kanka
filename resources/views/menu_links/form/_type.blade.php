@inject('entityService', 'App\Services\EntityService')
<?php
$entityTypes = ['' => ''];
foreach ($entityService->getEnabledEntities($campaignService->campaign()) as $entity) {
$entityTypes[$entity] = __('entities.' . \Illuminate\Support\Str::plural($entity));
}
?>
<p class="help-block">{!! __('menu_links.helpers.type', [
    'filter' => '<code>' . __('menu_links.fields.filters') . '</code>',
    '?' => '<code>?</code>',
]) !!}</p>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>{{ __('crud.fields.type') }}</label>
            {!! Form::select('type', $entityTypes, FormCopy::field('type')->string(), ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>{{ __('menu_links.fields.filters') }}</label>
            {!! Form::text('filters', FormCopy::field('filters')->string(), ['placeholder' => __('menu_links.placeholders.filters'), 'class' => 'form-control', 'maxlength' => 191]) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        {!! Form::hidden('options[is_nested]', 0) !!}
        <label>
            {!! Form::checkbox('options[is_nested]', 1, empty($model->options) ? false : $model->options['is_nested']) !!}
            {!! __('menu_links.fields.is_nested') !!}
        </label>
    </div>
</div>
