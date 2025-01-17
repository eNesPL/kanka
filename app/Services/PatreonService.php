<?php

namespace App\Services;

use App\Models\Pledge;
use App\Traits\UserAware;
use App\Models\Role;

/**
 * Class PatreonService
 * @package App\Services
 */
class PatreonService
{
    use UserAware;

    /**
     * @return mixed
     */
    protected function getRole()
    {
        return Role::where('name', '=', Pledge::ROLE)->first();
    }

    /**
     * Remove a user's legacy link to the patreon service
     * @return bool
     */
    public function unlink(): bool
    {
        if (!$this->user->isLegacyPatron()) {
            return false;
        }

        if ($this->user->hasRole(Pledge::ROLE)) {
            $this->user->roles()->detach($this->getRole()->id);
        }

        $settings = $this->user->settings;
        unset($settings['patreon_fullname'], $settings['patreon_name'], $settings['patreon_id'], $settings['patreon_email']);



        if (empty($settings)) {
            $settings = null;
        }
        $this->user->pledge = null;
        $this->user->settings = $settings;
        $this->user->save();

        return true;
    }
}
