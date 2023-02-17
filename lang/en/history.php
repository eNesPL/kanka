<?php

return [
    'actions'   => [
        'show-old'  => 'Changes',
    ],
    'cta'       => 'Display a log of all the recent changes to the campaign.',
    'empty'     => 'No value',
    'filters'   => [
        'all-actions'   => 'All actions',
        'all-users'     => 'All members',
        'no-results'    => 'No results to display. Try with other filters, or come back after making changes to the campaign\'s entities.',
    ],
    'helpers'   => [
        'base'      => 'This interface contains recent changes to entities of the campaign for up to :amount months, showing the most recent changes first.',
        'changes'   => 'The following fields previously had these values.',
    ],
    'log'       => [
        'create'    => ':user created :entity',
        'delete'    => ':user deleted :entity',
        'restore'   => ':user restored :entity',
        'update'    => ':user updated :entity',
        'create_post'    => ':user created the post ":post" on :entity',
        'delete_post'    => ':user deleted a post on :entity',
        'reorder_post'   => ':user reordered the posts of :entity',
        'update_post'    => ':user updated the post ":post" on :entity',
    ],
    'title'     => 'History',
    'unknown'   => [
        'entity'    => 'an unknown entity',
    ],
];
