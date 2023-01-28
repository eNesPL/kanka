<?php

namespace App\Services;

use App\Models\Pledge;
use App\Traits\UserAware;
use App\User;
use App\Models\Role;
use Illuminate\Support\Facades\Log;

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
        unset($settings['patreon_fullname']);
        unset($settings['patreon_name']);
        unset($settings['patreon_id']);
        unset($settings['patreon_email']);
        if (empty($settings)) {
            $settings = null;
        }
        $previousPledge = $this->user->pledge;
        $this->user->pledge = null;
        $this->user->settings = $settings;
        $this->user->save();

        $this->log($previousPledge);

        return true;
    }

    protected function log(?string $previousPledge): void
    {
        Log::info('Patreon unlink', [
            'user' => $this->user->id,
            'tier' => $previousPledge
        ]);
    }


}
