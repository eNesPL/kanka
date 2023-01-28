<?php

namespace App\Traits;

use App\Models\Entity;

trait EntityAware
{
    /** @var Entity */
    public Entity $entity;

    /**
     * @param Entity $entity
     * @return EntityAware
     */
    public function entity(Entity $entity): self
    {
        $this->entity = $entity;
        return $this;
    }
}
