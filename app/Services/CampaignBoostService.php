<?php

namespace App\Services;

use App\Exceptions\Campaign\AlreadyBoostedException;
use App\Exceptions\Campaign\ExhaustedBoostsException;
use App\Exceptions\Campaign\ExhaustedSuperboostsException;
use App\Models\CampaignBoost;
use App\Traits\CampaignAware;
use App\Traits\UserAware;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CampaignBoostService
{
    use CampaignAware;
    use UserAware;

    /** @var string */
    protected $action;

    /** @var bool If updating an existing boost to a superboost */
    protected $upgrade = false;

    /**
     * @param string $action
     * @return $this
     */
    public function action(string $action = 'boost'): self
    {
        $this->action = $action;
        return $this;
    }

    /**
     * @return $this
     */
    public function upgrade(): self
    {
        $this->upgrade = true;
        return $this;
    }

    /**
     * @param User|null $user
     * @throws AlreadyBoostedException
     * @throws ExhaustedBoostsException
     */
    public function boost(): void
    {
        if ($this->campaign->boosted() && !$this->upgrade) {
            throw new AlreadyBoostedException($this->campaign);
        }

        if ($this->user->availableBoosts() === 0) {
            throw new ExhaustedBoostsException();
        }

        if ($this->action == 'superboost' && $this->user->availableBoosts() < ($this->upgrade ? 2 : 3)) {
            throw new ExhaustedSuperboostsException();
        }

        $amount = 1;
        if ($this->upgrade) {
            // Create two more
            $amount = 2;
        } elseif ($this->action === 'superboost') {
            // Create three
            $amount = 3;
        }

        for ($i = 0; $i < $amount; $i++) {
            CampaignBoost::create([
                'campaign_id' => $this->campaign->id,
                'user_id' => $this->user->id
            ]);
        }
        $this->campaign->boost_count = $this->campaign->boosts()->count();
        $this->campaign->withObservers = false;
        $this->campaign->save();

        Log::info('Boost campaign', [
            'user' => $this->user->id,
            'amount' => $amount,
            'campaign' => $this->campaign->id,
            'upgrade' => $this->upgrade,
        ]);
    }

    /**
     * Unboost a campaign
     */
    public function unboost(CampaignBoost $campaignBoost, bool $manual = true): self
    {
        $campaignBoost->delete();

        // Delete other boosts on the same campaign if the user is superboosting
        $boosts = $this->user->boosts()->where('campaign_id', $campaignBoost->campaign_id)->get();
        foreach ($boosts as $boost) {
            $boost->delete();
        }

        $oldAmount = $this->campaign->boost_count;
        $this->campaign->boost_count = $this->campaign->boosts()->count();
        $this->campaign->saveQuietly();

        Log::info('Unboost campaign', [
            'user' => $this->user->id,
            'campaign' => $this->campaign->id,
            'amount' => $oldAmount,
            'manual' => $manual,
            'days' => $campaignBoost->created_at->diffInDays(),
        ]);

        return $this;
    }
}
