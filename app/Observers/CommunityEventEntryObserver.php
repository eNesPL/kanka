<?php

namespace App\Observers;

use App\Models\CommunityEventEntry;

class CommunityEventEntryObserver
{
    /**
     * Purify trait
     */
    use PurifiableTrait;

    /**
     * @param CommunityEventEntry $communityEventEntry
     */
    public function creating(CommunityEventEntry $communityEventEntry)
    {
        $communityEventEntry->created_by = auth()->user()->id;
    }
}
