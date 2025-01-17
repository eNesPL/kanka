<?php

return [
    'actions'   => [
        'status'    => 'Status: :status',
    ],
    'public'    => [
        'campaign'      => [
            'private'   => 'The campaign is currently private.',
            'public'    => 'The campaign is currently public.',
        ],
        'description'   => 'Set the permissions for the public role to view entities of the following modules of the campaign. A user is automatically considered to be in the public role if they are viewing the campaign without being one of its members.',
        'test'          => 'To test the public role\'s permissions, open the campaign dashboard :url in an incognito window.',
    ],
    'show'      => [
        'title' => ':role permissions - :campaign',
    ],
    'toggle'    => [
        'disabled'  => 'Members of the :role role can no longer :action :entities',
        'enabled'   => 'Members of the :role role can now :action :entities',
    ],
];
