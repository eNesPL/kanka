<?php

namespace App\Models;

use App\Facades\CampaignLocalization;
use App\Models\Concerns\HasFilters;

/**
 * @property DiceRoll|null $diceRoll
 */
class DiceRollResult extends MiscModel
{
    use HasFilters;


    /** @var string[]  */
    protected $fillable = [
        'dice_roll_id',
        'created_by',
        'results',
        'is_private',
    ];

    /**
     * Fields that can be sorted on
     * @var array
     */
    protected $sortableColumns = [
        'diceRoll.name',
        'character.name',
        'user.name',
        'results',
        'created_at',
    ];

    protected $defaultOrderField = 'created_at';
    protected $defaultOrderDirection = 'DESC';

    /**
     * We want to use the dice_roll entity type for permissions
     * @var string
     */
    protected $entityType = 'dice_roll';

    /** @var bool No relations for this entity "type" */
    protected $hasRelations = false;

    /**
     *
     */
    public function newQuery()
    {
        // When exporting in console, we don't have this so don't use it
        if (!app()->runningInConsole()) {
            return parent::newQuery()->whereHas('diceRoll', function ($query) {
                $query->where('campaign_id', CampaignLocalization::getCampaign()->id);
            });
        }
        return parent::newQuery();
    }

    /**
     * Who created this entry
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator()
    {
        return $this->belongsTo('App\User', 'created_by');
    }

    /**
     * Who created this entry
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'created_by');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function diceRoll()
    {
        return $this->belongsTo('App\Models\DiceRoll', 'dice_roll_id');
    }

    /**
     * @return mixed
     */
    public function character()
    {
        return $this->diceRoll->character();
    }

    /**
     * Define the fields unique to this model that can be used on filters
     * @return string[]
     */
    public function filterableColumns(): array
    {
        return [
            'dice_roll_id',
            'created_at',
            'created_by',
            'diceRoll-character_id',
        ];
    }
}
