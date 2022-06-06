<?php

return [
    'create'        => [
        'title' => 'Новая заметка',
    ],
    'destroy'       => [],
    'edit'          => [],
    'fields'        => [
        'description'   => 'Описание',
        'image'         => 'Изображение',
        'is_pinned'     => 'Закреплена',
        'name'          => 'Название',
        'note'          => 'Родительская заметка',
        'notes'         => 'Подзаметки',
        'type'          => 'Тип',
    ],
    'helpers'       => [
        'nested_parent' => 'Показаны заметки, входящие в :parent.',
        'nested_without'=> 'Показаны все заметки без родительских заметок. Нажмите на строку заметки, чтобы увидеть список ее подзаметок.',
    ],
    'hints'         => [
        'is_pinned' => 'В обзоре кампании можно закрепить не более 3 заметок.',
    ],
    'index'         => [
        'title' => 'Заметки',
    ],
    'placeholders'  => [
        'name'  => 'Название заметки',
        'note'  => 'Выберите родительскую заметку',
        'type'  => 'Религия, раса, политика',
    ],
    'show'          => [],
];
