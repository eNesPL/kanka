<?php

return [
    'actions' => [
        'clear' => 'Clear tree',
        'reset' => 'Reset tree',
        'save' => 'Save tree',
        'first' => 'Add a character',
        'rename-relation' => 'Rename relation',
    ],
    'title' => ':name Family Tree',
    'modal'   => [
        'title'         => 'Replace entity',
        'first-title'   => 'Select an entity',
        'helper'        => 'Replace the entity with another from your campaign',
        'first-helper'  => 'Select an entity from your campaign',
        'relation'      => 'Relation',
    ],
    'modals' => [
        'relations' => [
            'add' => [
                'title' => 'Add a relation',
                'success' => 'Relation added',
            ],
            'edit' => [
                'title' => 'Update a relation',
                'success' => 'Relation updated',
            ],
        ],
        'entity' => [
            'add' => [
                'title' => 'Add a character',
                'success' => 'Character added.',
            ],
            'edit' => [
                'title' => 'Update a character',
                'success' => 'Character updated.',
            ],
            'child' => [
                'title' => 'Add a child',
                'success' => 'Child added',
            ],
            'remove' => [
                'confirm' => 'Are you sure you want to remove this character from the family tree?',
                'success' => 'Character removed.',
            ],
        ],
        'reset' => [
            'confirm' => 'Are you sure you want to reset the family tree?',
        ],
    ],
    'helpers'   => [
        'clear'         => 'Are you sure you want to clear the family tree?',
        'reset'         => 'Are you sure you want to reset the family tree?',
        'relation'      => 'Relation',
        'remove-node'   => 'Do you want to remove this node?',
    ],
    'unknown' => 'unknown',
    'success' => [
        'saved' => 'Family tree saved.',
        'cleared' => 'Family tree cleared.',
        'reseted' => 'Family tree has been reset.',
    ],
    'saved' => 'Saved successfully',
];