<?php

return [
    'actions'       => [
        'add_element'   => 'Добавить элемент в эру :era',
        'back'          => 'Назад к :name',
        'edit'          => 'Редактировать хронологию',
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
        'reverse_order' => 'Обратный порядок эр',
        'timeline'      => 'Родительская хронология',
        'timelines'     => 'Хронологии',
    ],
    'helpers'       => [
        'nested_without'    => 'Показаны все хронологии без родительских хронологий. Нажмите на строку хронологии, чтобы увидеть список ее хронологий-потомков.',
        'reverse_order'     => 'Отображение эр в обратном хронологическом порядке (чем древнее эра, тем она выше).',
    ],
    'index'         => [],
    'placeholders'  => [
        'name'  => 'Название хронологии',
        'type'  => 'Основные события, хроники мира, история королевства',
    ],
    'reorder'       => [
        'success'   => 'Порядок элементов хронологии изменен.',
        'title'     => 'Изменение порядка элементов',
    ],
    'show'          => [
        'tabs'  => [
            'reorder'   => 'Изменить порядок',
            'timelines' => 'Хронологии',
        ],
    ],
    'timelines'     => [
        'title' => 'Хронологии хронологии :name',
    ],
];
