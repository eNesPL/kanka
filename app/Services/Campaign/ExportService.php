<?php

namespace App\Services\Campaign;

use App\Jobs\CampaignAssetExport;
use App\Jobs\CampaignExport;
use App\Traits\CampaignAware;
use App\Traits\UserAware;
use Illuminate\Support\Facades\Log;

class ExportService
{
    use CampaignAware;
    use UserAware;

    /**
     * Set the campaign export for the export jobs
     * @return $this
     */
    public function export(): self
    {
        $this->campaign->export_date = date('Y-m-d');
        $this->campaign->withObservers = false;
        $this->campaign->save();

        CampaignExport::dispatch($this->campaign, $this->user);
        CampaignAssetExport::dispatch($this->campaign, $this->user);

        Log::info('Campaign export', [
            'user' => $this->user->id,
            'campaign' => $this->campaign->id,
        ]);
        return $this;
    }
}
