<?php

return [
    'actions'   => [
        'transform' => 'Трансформировать',
    ],
    'bulk'      => [
        'errors'    => [
            'unknown_type'  => 'Неизвестный или недействительный тип объекта.',
        ],
        'success'   => '{1} :count объект трансформирован в новый тип: :type.|[2,4] :count объекта трансформировано в новый тип: :type.|[5,*] :count объектов трансформировано в новый тип: :type.',
    ],
    'fields'    => [
        'select_one'    => 'Выберите тип',
        'target'        => 'Новый тип объектов',
    ],
    'panel'     => [
        'bulk_description'  => 'Смена типа нескольких объектов. Имейте в виду, что возможна потеря некоторых данных из-за отличий в наборах полей разных типов объектов.',
        'bulk_title'        => 'Трансформация нескольких объектов',
        'description'       => 'Вы создали этот объект в одном типе, но потом поняли, что ему больше подойдет другой? Не беспокойтесь, вы всегда можете изменить тип объекта. Примите во внимание, что некоторые данные могут быть потеряны из-за отличий между полями разных типов объектов.',
        'title'             => 'Трансформация объекта',
    ],
    'success'   => 'Объект ":name" трансформирован.',
    'title'     => 'Трансформация :name',
];