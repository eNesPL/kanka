@php
Datagrid::layout(\App\Renderers\Layouts\Entity\Relation::class)
    ->route('entities.relations_table', [$entity, 'mode' => 'table']);

$rows = $entity
    ->allRelationships()
    ->sort(request()->only(['o', 'k']))
    ->paginate()
    ->withPath(route('entities.relations_table', [$entity, 'mode' => 'table']));
@endphp
<div class="print-box-relations">
    <h2>{{ __('crud.tabs.relations') }}</h2>

    <div id="datagrid-parent" class="table-responsive">
        @include('layouts.datagrid._table')
    </div>

</div>
