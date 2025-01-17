<?php

namespace App\Services;

use App\Models\CampaignUser;
use App\User;

class UserService
{
    /**
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function authenticated(User $user)
    {
        // If the user is login in from a 403 page, go to there now first
        $redirectTo = session()->get('login_redirect');
        if (!empty($redirectTo)) {
            session()->remove('login_redirect');
            return redirect()->to($redirectTo);
        }

        // If a user has a last campaign id, we need to make sure the
        if ($user->last_campaign_id) {
            // The user should be part of the last campaign
            $campaign = $user->lastCampaign;

            // No campaign yet
            if ($campaign === null) {
                return redirect()->route('home');
            }

            $member = CampaignUser::where('campaign_id', $campaign->id)
                ->where('user_id', $user->id)
                ->first();
            if (!$member) {
                // The user is no longer part of the campaign, so let's get ride of it.
                $user->last_campaign_id = null;
                $user->save();
            } else {
                // redirect
                return redirect()->route('home');
            }
        }

        // So we don't have a valid last campaign id, so lets just try and use the first one of the list.
        $campaign = $user->campaigns()->first();

        // We have no campaign
        if (!$campaign) {
            // The user do not have any campaign
            // So we invite him to create a campaign
            return redirect()->route('start');
        }

        if ($user->last_campaign_id != $campaign->id) {
            $user->last_campaign_id = $campaign->id;
            $user->save();
        }
        return redirect()->route('home');
    }
}
