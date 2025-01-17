<?php

return [
    'actions'       => [
        'add_element'   => 'Add element to era :era',
        'back'          => 'Back to :name',
        'edit'          => 'Edit timeline',
        'save_order'    => 'Save new order',
    ],
    'create'        => [
        'title' => 'New Timeline',
    ],
    'fields'        => [
        'copy_elements' => 'Copy Elements',
        'copy_eras'     => 'Copy Eras',
        'eras'          => 'Eras',
        'reverse_order' => 'Reverse era order',
        'timeline'      => 'Parent Timeline',
        'timelines'     => 'Timelines',
    ],
    'helpers'       => [
        'nested_without'    => 'Displaying all timelines that don\'t have a parent timeline. Click on a row to see the children timelines.',
        'no_era_v2'         => 'This timeline currently doesn\'t have any eras. Add one or several eras to it, after which you can add elements to the eras here.',
        'reverse_order'     => 'Enable to display eras in reverse chronological order (older era first)',
    ],
    'placeholders'  => [
        'name'  => 'Name of the timeline',
        'type'  => 'Primary, World chronicle, Kingdom legacy',
    ],
    'reorder'       => [
        'success'   => 'Timeline successfully reordered.',
        'title'     => 'Reorder the timeline',
    ],
    'show'          => [
        'tabs'  => [
            'reorder'   => 'Reorder timeline',
            'timelines' => 'Timelines',
        ],
    ],
    'timelines'     => [
        'title' => 'Timeline :name Timelines',
    ],
];
