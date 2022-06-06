<?php

return [
    'abilities'     => [
        'title' => 'Потомки способности :name',
    ],
    'children'      => [
        'actions'       => [
            'add'   => 'Добавить способность к объекту',
        ],
        'create'        => [
            'success'   => 'Способность ":name" добавлена к объекту.',
            'title'     => 'Добавление способности :name к объекту',
        ],
        'description'   => 'Объекты с этой способностью',
        'title'         => 'Объекты способности :name',
    ],
    'create'        => [
        'title' => 'Новая способность',
    ],
    'destroy'       => [],
    'edit'          => [],
    'entities'      => [
        'title' => 'Объекты со способностью :name',
    ],
    'fields'        => [
        'abilities' => 'Способности',
        'ability'   => 'Родительская способность',
        'charges'   => 'Заряды',
        'name'      => 'Название',
        'type'      => 'Тип',
    ],
    'helpers'       => [
        'descendants'   => 'Это список всех потомков этой способности, включая всех потомков ее потомков.',
        'nested_parent' => 'Показаны способности, входящие в способность :parent.',
        'nested_without'=> 'Показаны все способности, у которых нет родительских способностей. Нажмите на строку способности, чтобы увидеть список ее способностей-потомков.',
    ],
    'index'         => [
        'title' => 'Способности',
    ],
    'placeholders'  => [
        'charges'   => 'Число зарядов. На атрибуты можно ссылаться так: {Уровень}*{ХАР}.',
        'name'      => 'Огненный шар, сигнал тревоги, коварный удар',
        'type'      => 'Заклинание, навык, атака',
    ],
    'show'          => [
        'tabs'  => [
            'abilities' => 'Способности',
            'entities'  => 'Объекты',
        ],
    ],
];
