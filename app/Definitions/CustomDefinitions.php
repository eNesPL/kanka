<?php

namespace App\Definitions;

use HTMLPurifier_HTMLDefinition;
use Stevebauman\Purify\Definitions\Definition;
use Stevebauman\Purify\Definitions\Html5Definition;

class CustomDefinitions implements Definition
{
    public static function apply(HTMLPurifier_HTMLDefinition $def)
    {
        Html5Definition::apply($def);

        $def->addAttribute('a', 'data-toggle', 'Text');
        $def->addAttribute('a', 'data-html', 'Text');
        $def->addAttribute('a', 'target', 'Text');

        $def->addElement(
            'details',
            'Block',
            'Flow',
            'Common',
            array(
                'open' => new \HTMLPurifier_AttrDef_HTML_Bool(true)
            )
        );
        $def->addElement(
            'section',
            'Block',
            'Flow',
            'Common'
        );

        $def->addElement(
            'aside',
            'Block',
            'Flow',
            'Common'
        );
        $def->addElement(
            'sidebar',
            'Block',
            'Flow',
            'Common'
        );

        $def->addElement('summary', 'Inline', 'Inline', 'Common');
    }
}
