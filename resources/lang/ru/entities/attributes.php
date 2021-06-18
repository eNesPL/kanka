<?php

return [
    'actions'       => [
        'apply_template'    => 'Применить шаблон атрибутов',
        'manage'            => 'Управление',
        'more'              => 'Другое',
        'remove_all'        => 'Удалить все',
    ],
    'errors'        => [
        'loop'  => 'При вычислении этого атрибута обнаружен бесконечный цикл!',
    ],
    'fields'        => [
        'attribute'             => 'Атрибут',
        'community_templates'   => 'Шаблоны сообщества',
        'is_private'            => 'Скрытые атрибуты',
        'is_star'               => 'Закреплен',
        'template'              => 'Шаблон',
        'value'                 => 'Значение',
    ],
    'helpers'       => [
        'delete_all'    => 'Вы уверены, что хотите удалить все атрибуты этого объекта?',
    ],
    'hints'         => [
        'is_private'    => 'Вы можете скрыть все атрибуты этого объекта от всех участников, кроме админов.',
    ],
    'index'         => [
        'success'   => 'Атрибуты объекта :entity обновлены.',
        'title'     => 'Атрибуты объекта :name',
    ],
    'placeholders'  => [
        'attribute' => 'Число побед, рейтинг опасности, инициатива, население',
        'block'     => 'Название блока',
        'checkbox'  => 'Название флажка',
        'icon'      => [
            'class' => 'Класс FontAwesome или RPG Awesome: fas fa-users',
            'name'  => 'Название иконки',
        ],
        'random'    => [
            'name'  => 'Название атрибута',
            'value' => 'Диапазон вида 1-100 или список значений через запятую',
        ],
        'section'   => 'Название раздела',
        'template'  => 'Выберите шаблон',
        'value'     => 'Значение атрибута',
    ],
    'template'      => [
        'success'   => 'Шаблон атрибутов :name применен к объекту :entity.',
        'title'     => 'Применение шаблона атрибутов к объекту :name',
    ],
    'types'         => [
        'attribute' => 'Атрибут',
        'block'     => 'Блок текста',
        'checkbox'  => 'Флажок',
        'icon'      => 'Иконка',
        'random'    => 'Случайный',
        'section'   => 'Раздел',
        'text'      => 'Блок текста',
    ],
    'visibility'    => [
        'entry'     => 'Этот атрибут отображается в меню объекта.',
        'private'   => 'Этот атрибут виден только участникам роли "Админ".',
        'public'    => 'Этот атрибут виден всем участникам.',
        'tab'       => 'Этот атрибут отображается только во вкладке атрибутов.',
    ],
];
