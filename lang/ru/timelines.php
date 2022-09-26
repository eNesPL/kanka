<?php

return [
    'actions'       => [
        'add_element'   => 'Добавить элемент в эру :era',
        'back'          => 'Назад к :name',
        'edit'          => 'Редактировать хронологию',
        'reorder'       => 'Изменить порядок',
        'save_order'    => 'Сохранить новый порядок',
    ],
    'create'        => [
        'title' => 'Новая хронология',
    ],
    'destroy'       => [],
    'edit'          => [],
    'fields'        => [
        'copy_elements' => 'Копировать элементы',
        'copy_eras'     => 'Копировать эры',
        'eras'          => 'Эры',
        'name'          => 'Название',
        'reverse_order' => 'Обратный порядок эр',
        'timeline'      => 'Родительская хронология',
        'timelines'     => 'Хронологии',
        'type'          => 'Тип',
    ],
    'helpers'       => [
        'nested_without'    => 'Показаны все хронологии без родительских хронологий. Нажмите на ряд хронологии, чтобы увидеть список ее хронологий-потомков.',
        'reorder'           => 'Чтобы изменить положение элемента, перетащите его мышкой.',
        'reorder_tooltip'   => 'Нажмите, чтобы изменить порядок элементов путем перетаскивания.',
        'reverse_order'     => 'Отображение эр в обратном хронологическом порядке (чем древнее эра, тем она выше).',
    ],
    'index'         => [
        'title' => 'Хронологии',
    ],
    'placeholders'  => [
        'name'  => 'Название хронологии',
        'type'  => 'Основные события, хроники мира, история королевства',
    ],
    'show'          => [
        'tabs'  => [
            'timelines' => 'Хронологии',
        ],
    ],
    'timelines'     => [
        'title' => 'Хронологии хронологии :name',
    ],
];