<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Map;
use App\Models\Campaign;
use App\Models\MapLayer;
use App\Http\Requests\StoreMapLayer as Request;
use App\Http\Resources\MapLayerResource as Resource;
use Illuminate\Support\Facades\Log;

class MapLayerApiController extends ApiController
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
            'endpoint' => 'map_layers'
        ]);
        return Resource::collection($map->layers()->paginate());
    }

    /**
     * @param Campaign $campaign
     * @param MapLayer $mapLayer
     * @return Resource
     */
    public function show(Campaign $campaign, Map $map, MapLayer $mapLayer)
    {
        $this->authorize('access', $campaign);
        $this->authorize('view', $map);
        return new Resource($mapLayer);
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
        $model = MapLayer::create($request->all());
        return new Resource($model);
    }

    /**
     * @param Request $request
     * @param Campaign $campaign
     * @param Map $map
     * @param MapLayer $mapLayer
     * @return Resource
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(
        Request $request,
        Campaign $campaign,
        Map $map,
        MapLayer $mapLayer
    ) {
        $this->authorize('access', $campaign);
        $this->authorize('update', $map);
        $mapLayer->update($request->all());

        return new Resource($mapLayer);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param Campaign $campaign
     * @param Map $map
     * @param MapLayer $mapLayer
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(
        \Illuminate\Http\Request $request,
        Campaign $campaign,
        Map $map,
        MapLayer $mapLayer
    ) {
        $this->authorize('access', $campaign);
        $this->authorize('update', $map);
        $mapLayer->delete();

        return response()->json(null, 204);
    }
}
