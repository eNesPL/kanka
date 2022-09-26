<?php

return [
    'actions'       => [
        'add_element'   => 'Aggiungi all\'era :era',
        'back'          => 'Torna a :nome',
        'edit'          => 'Modifica linea temporale',
        'reorder'       => 'Riordina',
        'save_order'    => 'Salva nuovo ordine',
    ],
    'create'        => [
        'title' => 'Nuova linea temporale',
    ],
    'destroy'       => [],
    'edit'          => [],
    'fields'        => [
        'copy_elements' => 'Copia elementi',
        'copy_eras'     => 'Copia ere',
        'eras'          => 'Ere',
        'name'          => 'Nome',
        'reverse_order' => 'Inverti l\'ordine delle ere',
        'timeline'      => 'Linea temporale principale',
        'timelines'     => 'Linee temporali',
        'type'          => 'Tipo',
    ],
    'helpers'       => [
        'nested_without'    => 'Tutte le linee temporali che non hanno una linea temporale principale. Clicca su una riga per vedere le linee temporali figlie',
        'no_era'            => 'Attualmente questa linea temporale non ha ere. Le ere possono essere aggiunte nella schermata di modifica delle linee temporali, dove è possibile aggiungere elementi.',
        'reorder'           => 'Trascina gli elementi dell\'era per riordinarli.',
        'reorder_tooltip'   => 'Clicca per abilitare il riordino degli elementi trascinandoli.',
        'reverse_order'     => 'Abilita per visualizzare le ere in ordine cronologico inverso (prima l\'era più antica)',
    ],
    'index'         => [
        'title' => 'Linee temporali',
    ],
    'placeholders'  => [
        'name'  => 'Nome della linea temporale',
        'type'  => 'Principale, Cronache del mondo, Storia del Regno',
    ],
    'show'          => [
        'tabs'  => [
            'timelines' => 'Linee temporali',
        ],
    ],
    'timelines'     => [
        'title' => 'Linea temporale :name Linee temporali',
    ],
];