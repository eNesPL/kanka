<?php

return [
    'create'        => [
        'success'   => 'Relazione aggiunta per :name.',
        'title'     => 'Crea le relazioni',
    ],
    'destroy'       => [
        'success'   => 'Relazione rimossa per :name.',
    ],
    'fields'        => [
        'attitude'  => 'Attitudine',
        'is_star'   => 'Fissata',
        'relation'  => 'Relazione',
        'target'    => 'Bersaglio',
        'two_way'   => 'Crea anche la relazione speculare',
    ],
    'helper'        => 'Imposta le relazioni fra due entità con atteggiamento e visibilitò. Le relazioni possono anche essere fissate nel menù dell\'entità.',
    'hints'         => [
        'mirrored'  => [
            'text'  => 'Questa relazione è speculare con :link.',
            'title' => 'Speculare',
        ],
        'two_way'   => 'Se selezione la creazione della relazione speculare la stessa relazione sarà creata per il bersaglio. Però, se ne modificherai una, quella speculare non verrà aggiornata.',
    ],
    'placeholders'  => [
        'attitude'  => 'da -100 a 100, 100 vuol dire essere molto positivo.',
        'relation'  => 'Natura della relazione',
        'target'    => 'Seleziona un\'entità',
    ],
    'show'          => [
        'title' => 'Relazioni per :name',
    ],
    'update'        => [
        'success'   => 'Relazione aggiornata per :name.',
        'title'     => 'Aggiorna le relazioni',
    ],
];
