<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Campaign;
use App\Models\Entity;
use App\Http\Requests\StoreRelation as Request;
use App\Http\Resources\RelationResource as Resource;
use App\Models\Relation;
use Illuminate\Support\Facades\Log;

class EntityRelationApiController extends ApiController
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
            'endpoint' => 'entity_relationsw'
        ]);
        return Resource::collection($entity->relationships()->has('target')->paginate());
    }

    /**
     * @param Campaign $campaign
     * @param Entity $entity
     * @param Relation $relation
     * @return Resource
     */
    public function show(Campaign $campaign, Entity $entity, Relation $relation)
    {
        $this->authorize('access', $campaign);
        $this->authorize('view', $entity->child);
        return new Resource($relation);
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
        $model = Relation::create($request->all());
        return new Resource($model);
    }

    /**
     * @param Request $request
     * @param Campaign $campaign
     * @param Entity $entity
     * @param Relation $relation
     * @return Resource
     */
    public function update(Request $request, Campaign $campaign, Entity $entity, Relation $relation)
    {
        $this->authorize('access', $campaign);
        $this->authorize('update', $entity->child);
        $relation->update($request->all());

        return new Resource($relation);
    }

    /**
     * @param Request $request
     * @param Campaign $campaign
     * @param Entity $entity
     * @param Relation $relation
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(
        \Illuminate\Http\Request $request,
        Campaign $campaign,
        Entity $entity,
        Relation $relation
    ) {
        $this->authorize('access', $campaign);
        $this->authorize('update', $entity->child);
        $relation->delete();

        return response()->json(null, 204);
    }
}
