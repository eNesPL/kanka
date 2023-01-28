<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Campaign;
use App\Models\Race;
use App\Http\Requests\StoreRace as Request;
use App\Http\Resources\RaceResource as Resource;
use Illuminate\Support\Facades\Log;

class RaceApiController extends ApiController
{
    /**
     * @param Campaign $campaign
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(Campaign $campaign)
    {
        $this->authorize('access', $campaign);
        Log::info('API', [
            'action' => 'index',
            'endpoint' => 'races'
        ]);
        return Resource::collection($campaign
            ->races()
            ->filter(request()->all())
            ->withApi()
            ->has('entity')
            ->lastSync(request()->get('lastSync'))
            ->paginate());
    }

    /**
     * @param Campaign $campaign
     * @param Race $race
     * @return Resource
     */
    public function show(Campaign $campaign, Race $race)
    {
        $this->authorize('access', $campaign);
        $this->authorize('view', $race);
        return new Resource($race);
    }

    /**
     * @param Request $request
     * @param Campaign $campaign
     * @return Resource
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(Request $request, Campaign $campaign)
    {
        $this->authorize('access', $campaign);
        $this->authorize('create', Race::class);

        $model = Race::create($request->all());
        $this->crudSave($model);
        return new Resource($model);
    }

    /**
     * @param Request $request
     * @param Campaign $campaign
     * @param Race $race
     * @return Resource
     */
    public function update(Request $request, Campaign $campaign, Race $race)
    {
        $this->authorize('access', $campaign);
        $this->authorize('update', $race);
        $race->update($request->all());
        $this->crudSave($race);

        return new Resource($race);
    }

    /**
     * @param Request $request
     * @param Campaign $campaign
     * @param Race $race
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(\Illuminate\Http\Request $request, Campaign $campaign, Race $race)
    {
        $this->authorize('access', $campaign);
        $this->authorize('delete', $race);
        $race->delete();

        return response()->json(null, 204);
    }
}
