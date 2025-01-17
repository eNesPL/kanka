<?php

return [
    'create'        => [
        'title' => 'Nuevo diario',
    ],
    'destroy'       => [],
    'edit'          => [],
    'fields'        => [
        'author'    => 'Autor',
        'date'      => 'Fecha',
        'journal'   => 'Diario superior',
        'journals'  => 'Subdiarios',
    ],
    'helpers'       => [
        'journals'          => 'Muestra todos o solo los descendientes directos de este diario.',
        'nested_without'    => 'Mostrando todos los diarios sin ningún superior. Haz clic sobre una fila para mostrar sus descendientes.',
    ],
    'index'         => [],
    'journals'      => [
        'title' => 'Subdiarios del diario :name',
    ],
    'placeholders'  => [
        'author'    => 'Quién ha escrito el diario',
        'date'      => 'Fecha del diario',
        'journal'   => 'Elige un diario superior',
        'name'      => 'Nombre del diario',
        'type'      => 'Sesión, Borrador...',
    ],
    'show'          => [
        'tabs'  => [
            'journals'  => 'Diarios',
        ],
    ],
];
