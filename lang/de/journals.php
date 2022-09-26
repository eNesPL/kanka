<?php

return [
    'create'        => [
        'title' => 'Erstelle ein neues Logbuch',
    ],
    'destroy'       => [],
    'edit'          => [],
    'fields'        => [
        'author'    => 'Autor',
        'date'      => 'Datum',
        'image'     => 'Bild',
        'journal'   => 'Übergeordnetes Logbuch',
        'journals'  => 'Untergeordnetes Logbuch',
        'name'      => 'Name',
        'type'      => 'Typ',
    ],
    'helpers'       => [
        'journals'          => 'Zeigen Sie alle oder nur die direkt Untergeordneten Logbücher dieses Logbuchs an.',
        'nested_without'    => 'Anzeigen aller Journale ohne übergeordnetes Journal. Klicken Sie auf eine Zeile, um die Kinderjournale anzuzeigen.',
    ],
    'index'         => [
        'title' => 'Logbücher',
    ],
    'journals'      => [
        'title' => 'Logbuch :name Untergeordnetes Logbuch',
    ],
    'placeholders'  => [
        'author'    => 'Wer hat das Logbuch geschrieben',
        'date'      => 'Datum des Logbuchs',
        'journal'   => 'Wähle ein übergeordnetes Logbuch',
        'name'      => 'Name des Logbuchs',
        'type'      => 'Session, One Shot, Entwurf',
    ],
    'show'          => [
        'tabs'  => [
            'journals'  => 'Logbücher',
        ],
    ],
];