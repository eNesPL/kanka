<?php

return [
    'create'        => [
        'title' => 'New Quest',
    ],
    'elements'      => [
        'create'    => [
            'success'   => 'Element :entity added to the quest.',
            'title'     => 'New element for :name',
        ],
        'destroy'   => [
            'success'   => 'Element :entity removed.',
        ],
        'edit'      => [
            'success'   => 'Element :entity updated.',
            'title'     => 'Update element for :name',
        ],
        'fields'    => [
            'description'       => 'Description',
            'entity_or_name'    => 'Either select either an entity of the campaign, or give a name for this element.',
            'name'              => 'Name',
            'quest'             => 'Quest',
        ],
        'title'     => 'Quest :name Elements',
        'warning'   => [
            'editing'   => [
                'description'   => 'Looks like someone else is currently editing this quest element! Do you want to go back or ignore this warning, at the risk of losing data? Members currently editing this quest element:',
            ],
        ],
    ],
    'fields'        => [
        'character'     => 'Instigator',
        'copy_elements' => 'Copy elements attached to the quest',
        'date'          => 'Date',
        'element_role'  => 'Role',
        'is_completed'  => 'Completed',
        'quest'         => 'Parent Quest',
        'quests'        => 'Sub Quests',
        'role'          => 'Role',
    ],
    'helpers'       => [
        'is_completed'      => 'Select if the quest is considered as completed.',
        'nested_without'    => 'Displaying all quests that don\'t have a parent quest. Click on a row to see the children quests.',
    ],
    'hints'         => [
        'quests'    => 'A web of interlocking quests can be built using the Parent Quest field.',
    ],
    'placeholders'  => [
        'date'      => 'Real world date for the quest',
        'entity'    => 'Name of an element from the quest',
        'name'      => 'Name of the quest',
        'quest'     => 'Parent Quest',
        'role'      => 'This entity\'s role in the quest',
        'type'      => 'Character Arc, Sidequest, Main',
    ],
    'show'          => [
        'actions'   => [
            'add_element'   => 'Add an element',
        ],
        'tabs'      => [
            'elements'  => 'Elements',
        ],
    ],
];
