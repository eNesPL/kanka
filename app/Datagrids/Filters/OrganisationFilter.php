<?php

namespace App\Datagrids\Filters;

use App\Models\Organisation;
use App\Models\Character;

class OrganisationFilter extends DatagridFilter
{
    /**
     * Filters available for organisations
     */
    public function __construct()
    {
        $this
            ->add('name')
            ->add('type')
            ->location()
            ->add([
                'field' => 'organisation_id',
                'label' => __('entities.organisation'),
                'type' => 'select2',
                'route' => route('organisations.find'),
                'placeholder' =>  __('crud.placeholders.organisation'),
                'model' => Organisation::class,
            ])
            ->add([
                'field' => 'member_id',
                'label' => __('entities.character'),
                'type' => 'select2',
                'route' => route('characters.find'),
                'placeholder' =>  __('crud.placeholders.character'),
                'model' => Character::class,
            ])
            ->add('is_defunct')
            ->isPrivate()
            ->template()
            ->hasImage()
            ->hasPosts()
            ->hasEntityFiles()
            ->hasAttributes()
            ->tags()
            ->attributes()
        ;
    }
}
