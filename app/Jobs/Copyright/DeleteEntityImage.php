<?php

namespace App\Jobs\Copyright;

use App\Observers\CampaignObserver;
use App\Models\Campaign;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Services\ImageService;
use App\Models\Entity;

class DeleteEntityImage implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    protected $entityId;
    protected $removeHeader;
    protected $removeImage;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->entityId = $request->post('entity');
        $this->removeHeader = $request->post('remove_header');
        $this->removeImage = $request->post('remove_image');
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $field = 'header_image';
        // Most basic setup, the child has an image, otherwise, might have a gallery image
        if ($this->removeImage) {
            $this->deleteImage('image');
        }
        if ($this->removeHeader) {
            $this->deleteImage('header_image');
        }

        Log::info('Removed image or header from entity #' . $this->entityId . ' for copyrigh reasons');
    }

    private function deleteImage(string $field)
    {
        $entity = Entity::find($this->entityId);

        if (empty($entity) || empty($entity->child)) {
            // Entity was deleted
            return;
        }
        $service = app()->make(\App\Services\CampaignService::class);
        $campaign = Campaign::find($entity->campaign_id);
        if (!$campaign) {
            // Campaign wasn't found
            Log::warning('Hide Campaign: unknown #' . $this->campaign . '.');
        }

        //Campaign::observe(CampaignObserver::class);

        $service->removedImage($campaign, $entity);
        $child = $entity->child;

        if (!empty($entity->child->image)) {
            ImageService::cleanup($child, $field);
            $child->update(['image' => $child->image]);
        } elseif ($entity->image && $field == 'image') {
            $entity->image->delete();
        }

        if ($entity->header && $field == 'header_image') {
            $entity->header->delete();
        }

        // Whenever an entity is updated, we always want to re-calculate the cached image.
        if (method_exists($entity, 'clearAvatarCache')) {
            $entity->clearAvatarCache();
        }
    }
}
