<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Map;
use App\Models\Campaign;
use App\Models\MapMarker;
use App\Http\Requests\StoreMapMarker as Request;
use App\Http\Resources\MapMarkerResource as Resource;
use Illuminate\Support\Facades\Log;

class MapMarkerApiController extends ApiController
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
            'endpoint' => 'map_markers'
        ]);
        return Resource::collection($map->markers()->paginate());
    }

    /**
     * @param Campaign $campaign
     * @param MapMarker $mapMarker
     * @return Resource
     */
    public function show(Campaign $campaign, Map $map, MapMarker $mapMarker)
    {
        $this->authorize('access', $campaign);
        $this->authorize('view', $map);
        return new Resource($mapMarker);
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
        $data = $request->all();
        $data['map_id'] = $map->id;
        $model = MapMarker::create($data);
        return new Resource($model);
    }

    /**
     * @param Request $request
     * @param Campaign $campaign
     * @param Map $map
     * @param MapMarker $mapMarker
     * @return Resource
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(
        Request $request,
        Campaign $campaign,
        Map $map,
        MapMarker $mapMarker
    ) {
        $this->authorize('access', $campaign);
        $this->authorize('update', $map);
        $mapMarker->update($request->all());

        return new Resource($mapMarker);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param Campaign $campaign
     * @param Map $map
     * @param MapMarker $mapMarker
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(
        \Illuminate\Http\Request $request,
        Campaign $campaign,
        Map $map,
        MapMarker $mapMarker
    ) {
        $this->authorize('access', $campaign);
        $this->authorize('update', $map);
        $mapMarker->delete();

        return response()->json(null, 204);
    }
}
