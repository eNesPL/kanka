<?php

return [
    'create'        => [
        'title' => 'Nový záznam v denníku',
    ],
    'destroy'       => [],
    'edit'          => [],
    'fields'        => [
        'author'    => 'Autor',
        'date'      => 'Dátum',
        'image'     => 'Obrázok',
        'journal'   => 'Nadradený denník',
        'journals'  => 'Podradený denník',
        'name'      => 'Názov',
        'type'      => 'Typ',
    ],
    'helpers'       => [
        'journals'          => 'Zobrazí všetky alebo len priamo podradené denníky tohto denníka.',
        'nested_without'    => 'Zobraziť všetky denníky, ktoré nemajú nadradený denník. Kliknutím na riadok zobrazíš podradené denníky.',
    ],
    'index'         => [
        'title' => 'Záznamy v denníku',
    ],
    'journals'      => [
        'title' => 'Podradené denníky denníka :name',
    ],
    'placeholders'  => [
        'author'    => 'Kto napísal tento záznam',
        'date'      => 'Reálny dátum tohto záznamu',
        'journal'   => 'Vyber nadradený denník',
        'name'      => 'Názov tohto záznamu',
        'type'      => 'sedenie, one shot, návrh',
    ],
    'show'          => [
        'tabs'  => [
            'journals'  => 'Denníky',
        ],
    ],
];