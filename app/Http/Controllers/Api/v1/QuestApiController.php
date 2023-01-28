<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Campaign;
use App\Models\Quest;
use App\Http\Requests\StoreQuest as Request;
use App\Http\Resources\QuestResource as Resource;
use Illuminate\Support\Facades\Log;

class QuestApiController extends ApiController
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
            'endpoint' => 'quests'
        ]);
        return Resource::collection($campaign
            ->quests()
            ->filter(request()->all())
            ->withApi()
            ->lastSync(request()->get('lastSync'))
            ->paginate());
    }

    /**
     * @param Campaign $campaign
     * @param Quest $quest
     * @return Resource
     */
    public function show(Campaign $campaign, Quest $quest)
    {
        $this->authorize('access', $campaign);
        $this->authorize('view', $quest);
        return new Resource($quest);
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
        $this->authorize('create', Quest::class);

        /** @var Quest $model */
        $model = Quest::create($request->all());
        $this->crudSave($model);
        return new Resource($model);
    }

    /**
     * @param Request $request
     * @param Campaign $campaign
     * @param Quest $quest
     * @return Resource
     */
    public function update(Request $request, Campaign $campaign, Quest $quest)
    {
        $this->authorize('access', $campaign);
        $this->authorize('update', $quest);
        $quest->update($request->all());
        $this->crudSave($quest);

        return new Resource($quest);
    }

    /**
     * @param Request $request
     * @param Campaign $campaign
     * @param Quest $quest
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(\Illuminate\Http\Request $request, Campaign $campaign, Quest $quest)
    {
        $this->authorize('access', $campaign);
        $this->authorize('delete', $quest);
        $quest->delete();

        return response()->json(null, 204);
    }
}
