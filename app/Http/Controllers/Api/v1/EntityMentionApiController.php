<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Campaign;
use App\Models\Entity;
use App\Http\Resources\EntityMentionResource as Resource;
use Illuminate\Support\Facades\Log;

class EntityMentionApiController extends ApiController
{
    /**
     * @param Campaign $campaign
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(Campaign $campaign, Entity $entity)
    {
        $this->authorize('access', $campaign);
        $this->authorize('view', $entity->child);
        Log::info('API', [
            'action' => 'index',
            'endpoint' => 'entity_mentions'
        ]);
        return Resource::collection($entity->mentions()->paginate());
    }
}
