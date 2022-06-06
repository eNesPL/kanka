<?php

return [
    'attribute_templates'   => [
        'title' => 'Шаблоны атрибутов :name',
    ],
    'create'                => [
        'title' => 'Новый шаблон атрибутов',
    ],
    'destroy'               => [],
    'edit'                  => [],
    'fields'                => [
        'attribute_template'    => 'Родительский шаблон атрибутов',
        'attributes'            => 'Атрибуты',
        'name'                  => 'Название',
    ],
    'hints'                 => [
        'automatic'                 => 'Атрибуты добавлены автоматически по шаблону атрибутов :link.',
        'entity_type'               => 'Этот шаблон атрибутов будет автоматически применен к новым объектам указанного типа.',
        'parent_attribute_template' => 'Этот шаблон атрибутов может быть потомком другого шаблона атрибутов. При применении этого шаблона, будут также применены все его родительские шаблоны.',
    ],
    'index'                 => [
        'title' => 'Шаблоны атрибутов',
    ],
    'placeholders'          => [
        'attribute_template'    => 'Выберите шаблон атрибутов',
        'name'                  => 'Название шаблона атрибутов',
    ],
    'show'                  => [
        'tabs'  => [
            'attribute_templates'   => 'Шаблоны атрибутов',
            'attributes'            => 'Атрибуты',
        ],
    ],
];
