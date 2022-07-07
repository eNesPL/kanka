<?php

namespace App\Console\Commands;

use App\Models\Campaign;
use Illuminate\Console\Command;

class CampaignEntityStat extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'campaigns:entity-count';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    protected int $count = 0;

    protected int $total = 0;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->total = Campaign::count();
        Campaign::select('id')->chunk(5000, function ($campaigns) {
            /** @var Campaign $campaign */
            foreach ($campaigns as $campaign) {
                $campaign->entity_count = $campaign->entities()->where('type_id', '<>', config('entities.ids.tag'))->count();
                $campaign->timestamps = false;
                $campaign->save();
                $this->count++;
            }

            $progress = ceil(($this->count / $this->total) * 100);
            $this->info("Progressed " . $progress . "%");
        });
        $this->info('Finished');
        return 0;
    }
}
