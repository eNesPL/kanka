<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Campaign;
use App\Models\Entity;
use App\Http\Requests\StoreEntityTag as Request;
use App\Http\Resources\EntityTagResource as Resource;
use App\Models\EntityTag;
use Illuminate\Support\Facades\Log;

class EntityTagApiController extends ApiController
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
            'endpoint' => 'entity_tags'
        ]);
        return Resource::collection($entity->entityTags()->paginate());
    }

    /**
     * @param Campaign $campaign
     * @param Entity $entity
     * @param EntityTag $entityTag
     * @return Resource
     */
    public function show(Campaign $campaign, Entity $entity, EntityTag $entityTag)
    {
        $this->authorize('access', $campaign);
        $this->authorize('view', $entity->child);
        return new Resource($entityTag);
    }

    /**
     * @param Request $request
     * @param Campaign $campaign
     * @return Resource
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(Request $request, Campaign $campaign, Entity $entity)
    {
        $this->authorize('access', $campaign);
        $this->authorize('update', $entity->child);
        $model = EntityTag::create($request->all());
        return new Resource($model);
    }

    /**
     * @param Request $request
     * @param Campaign $campaign
     * @param Entity $entity
     * @param EntityTag $entityTag
     * @return Resource
     */
    public function update(Request $request, Campaign $campaign, Entity $entity, EntityTag $entityTag)
    {
        $this->authorize('access', $campaign);
        $this->authorize('update', $entity->child);
        $entityTag->update($request->all());

        return new Resource($entityTag);
    }

    /**
     * @param Request $request
     * @param Campaign $campaign
     * @param Entity $entity
     * @param EntityTag $entityTag
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(
        \Illuminate\Http\Request $request,
        Campaign $campaign,
        Entity $entity,
        EntityTag $entityTag
    ) {
        $this->authorize('access', $campaign);
        $this->authorize('update', $entity->child);
        $entityTag->delete();

        return response()->json(null, 204);
    }
}
