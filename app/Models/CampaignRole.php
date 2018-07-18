<?php

namespace App\Models;

use App\Traits\VisibleTrait;
use Illuminate\Database\Eloquent\Model;
use DateTime;

/**
 * Class Attribute
 * @package App\Models
 *
 * @property integer $campaign_id
 * @property string $name
 * @property boolean $is_admin
 * @property boolean $is_public
 */
class CampaignRole extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'campaign_id',
        'is_admin',
        'is_public',
        'name',
    ];

    /**
     * Searchable fields
     * @var array
     */
    protected $searchableColumns = [
        'name'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function campaign()
    {
        return $this->belongsTo('App\Campaign', 'campaign_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->hasMany('App\Models\CampaignRoleUser', 'campaign_role_id');
        //return $this->belongsToMany('App\User', 'campaign_role_users');
    }

    /**
     * Filter on a campaign role's public status
     * @param $query
     * @param int $value
     * @return mixed
     */
    public function scopePublic($query, $value = 1)
    {
        return $query->where('is_public', $value);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function permissions()
    {
        return $this->hasMany('App\Models\CampaignPermission', 'campaign_role_id');
    }

    public function savePermissions($permissions = array())
    {
        // Load existing
        $existing = [];
        foreach ($this->permissions as $permission) {
            $existing[$permission->key] = $permission;
        }

        // Loop on submitted form
        if (empty($permissions)) {
            $permissions = [];
        }

        foreach ($permissions as $key => $value) {
            // Check if exists
            if (isset($existing[$key])) {
                // Do nothing
                unset($existing[$key]);
            } else {
                $permission = CampaignPermission::create([
                    'key' => $key,
                    'campaign_role_id' => $this->id,
                    'table_name' => $value
                ]);
            }
        }

        // Delete existing that weren't updated
        foreach ($existing as $permission) {
            // Only delete if it's a "general" and not an entity specific permission
            if (!is_numeric($permission->entityId())) {
                $permission->delete();
            }
        }
    }
}
