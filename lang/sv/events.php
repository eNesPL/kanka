<?php

return [
    'create'        => [
        'title' => 'Ny Händelse',
    ],
    'destroy'       => [],
    'edit'          => [],
    'fields'        => [
        'date'      => 'Datum',
        'image'     => 'Bild',
        'location'  => 'Plats',
        'name'      => 'Namn',
        'type'      => 'Typ',
    ],
    'helpers'       => [
        'date'  => 'Detta fält kan innehålla vad som helst och är inte länkat till kampanjens kalender. För att länka denna händelse med en kalender, gå och lägg till den på kalendern eller på påminnelser fliken för denna händelse.',
    ],
    'index'         => [
        'title' => 'Händelser',
    ],
    'placeholders'  => [
        'date'      => 'Ett datum för din händelse',
        'location'  => 'Välj en plats',
        'name'      => 'Namn på händelsen',
        'type'      => 'Ceremoni, Festival, Katastrof, Strid, Födelse',
    ],
    'show'          => [],
    'tabs'          => [
        'calendars' => 'Kalender Noteringar',
    ],
];