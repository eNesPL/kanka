<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Map;
use App\Models\Campaign;
use App\Models\MapGroup;
use App\Http\Requests\StoreMapGroup as Request;
use App\Http\Resources\MapGroupResource as Resource;
use Illuminate\Support\Facades\Log;

class MapGroupApiController extends ApiController
{
    /**
     * @param Campaign $campaign
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(Campaign $campaign, Map $map)
    {
        $this->authorize('access', $campaign);
        $this->authorize('view', $map);
        Log::info('API', [
            'action' => 'index',
            'endpoint' => 'map_groups'
        ]);
        return Resource::collection($map->groups()->paginate());
    }

    /**
     * @param Campaign $campaign
     * @param MapGroup $mapGroup
     * @return Resource
     */
    public function show(Campaign $campaign, Map $map, MapGroup $mapGroup)
    {
        $this->authorize('access', $campaign);
        $this->authorize('view', $map);
        return new Resource($mapGroup);
    }

    /**
     * @param Request $request
     * @param Campaign $campaign
     * @param Map $map
     * @return Resource
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(Request $request, Campaign $campaign, Map $map)
    {
        $this->authorize('access', $campaign);
        $this->authorize('update', $map);
        $model = MapGroup::create($request->all());
        return new Resource($model);
    }

    /**
     * @param Request $request
     * @param Campaign $campaign
     * @param Map $map
     * @param MapGroup $mapGroup
     * @return Resource
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(
        Request $request,
        Campaign $campaign,
        Map $map,
        MapGroup $mapGroup
    ) {
        $this->authorize('access', $campaign);
        $this->authorize('update', $map);
        $mapGroup->update($request->all());

        return new Resource($mapGroup);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param Campaign $campaign
     * @param Map $map
     * @param MapGroup $mapGroup
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(
        \Illuminate\Http\Request $request,
        Campaign $campaign,
        Map $map,
        MapGroup $mapGroup
    ) {
        $this->authorize('access', $campaign);
        $this->authorize('update', $map);
        $mapGroup->delete();

        return response()->json(null, 204);
    }
}
