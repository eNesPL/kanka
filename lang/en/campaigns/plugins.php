<?php

return [
    'actions'       => [
        'bulks'             => [
            'disable'   => 'Disable plugins',
            'enable'    => 'Enable plugins',
            'update'    => 'Update plugins',
        ],
        'changelog'         => 'Changelog',
        'disable'           => 'Disable plugin',
        'enable'            => 'Enable plugin',
        'go_to_marketplace' => 'Go to the Marketplace',
        'import'            => 'Import',
        'remove'            => 'Remove plugin',
        'update'            => 'Update plugin',
        'update_available'  => 'Update available!',
    ],
    'bulks'         => [
        'delete'    => '{1} Removed :count plugin.|[2,*] Removed :count plugins.',
        'disable'   => '{1} Disabled :count plugin.|[2,*] Disabled :count plugins.',
        'enable'    => '{1} Enabled :count plugin.|[2,*] Enabled :count plugins.',
        'update'    => '{1} Updated :count plugin.|[2,*] Updated :count plugins.',
    ],
    'destroy'       => [
        'success'   => 'Plugin :plugin removed.',
    ],
    'disabled'      => [
        'success'   => 'Plugin :plugin disabled.',
    ],
    'empty_list'    => 'The campaign doesn\'t currently have any plugins. Go to the marketplace to install a few and come back to activate them.',
    'enabled'       => [
        'success'   => 'Plugin :plugin enabled.',
    ],
    'errors'        => [
        'invalid_plugin'    => 'Invalid plugin.',
    ],
    'fields'        => [
        'name'      => 'Plugin name',
        'obsolete'  => 'This plugin has been marked as obsolete by the Kanka team, meaning it no longer works as originally intended by its creator.',
        'status'    => 'Status',
        'type'      => 'Plugin type',
    ],
    'import'        => [
        'button'                => 'Import',
        'created'               => 'Created the following entities:',
        'helper'                => 'You are about to import :count entities from the :plugin plugin. If this plugin was previously imported, changes you have made to the imported entities can be lost.',
        'no_new_entities'       => 'There are no new entities to be imported.',
        'option_only_import'    => 'Only import new entities, skipping previously imported entities.',
        'option_private'        => 'Import all entities as private.',
        'success'               => '{1} Imported :count entity from the plugin :plugin.|[2,*] Imported :count entities from the plugin :plugin.',
        'title'                 => 'Import :plugin',
        'updated'               => 'Updated the following entities:',
    ],
    'info'          => [
        'helper'        => 'When a new version of a plugin is released, you can update it to the latest version for your campaign.',
        'title'         => 'Plugin :plugin updates',
        'updates'       => 'Updates',
        'your_version'  => 'Your version',
    ],
    'pitch'         => 'Install and manage plugins from the :marketplace.',
    'status'        => [
        'disabled'  => 'Disabled',
        'enabled'   => 'Enabled',
    ],
    'templates'     => [
        'name'  => ':name by :user',
    ],
    'title'         => 'Plugins - :name',
    'types'         => [
        'attribute' => 'Attribute Template',
        'pack'      => 'Content Pack',
        'theme'     => 'Theme',
    ],
    'update'        => [
        'success'   => 'Plugin :plugin updated.',
    ],
];
