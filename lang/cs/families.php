<?php

return [
    'create'        => [
        'title' => 'Nový rod',
    ],
    'destroy'       => [],
    'edit'          => [],
    'families'      => [
        'title' => 'Rody rodu :name',
    ],
    'fields'        => [
        'families'  => 'Podřazené rody',
        'family'    => 'Nadřazený rod',
        'members'   => 'Členové',
    ],
    'helpers'       => [
        'descendants'       => 'Seznam zobrazuje všechny rody, podřazené tomuto rodu, nejen přímo podléhající.',
        'nested_without'    => 'Zobrazují se rody bez nadřazeného rodu. Klepnutím na řádek se zobrazí podřazené rody.',
    ],
    'hints'         => [
        'members'   => 'Zde se zobrazují členové rodu. Postavu lze přičlenit některému rodu na její kartě "Rod".',
    ],
    'index'         => [],
    'members'       => [
        'helpers'   => [
            'all_members'       => 'Tento seznam obsahuje všechny členy tohoto rodu a jeho podřazených rodů.',
            'direct_members'    => 'Většinu rodů proslavili někteří její členové. Zde je seznam postav, které jsou přímými členy tohoto rodu.',
        ],
        'title'     => 'Členové rodu :name',
    ],
    'placeholders'  => [
        'location'  => 'Vyberte místo',
        'name'      => 'Název rodu',
        'type'      => 'Královský, šlechtický, vymřelý,...',
    ],
    'show'          => [
        'tabs'  => [
            'all_members'   => 'Všichni členové',
            'families'      => 'Rody',
            'members'       => 'Členové',
        ],
    ],
];
