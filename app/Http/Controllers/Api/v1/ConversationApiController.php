<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Campaign;
use App\Models\Conversation;
use App\Http\Requests\StoreConversation as Request;
use App\Http\Resources\ConversationResource as Resource;
use Illuminate\Support\Facades\Log;

class ConversationApiController extends ApiController
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
            'endpoint' => 'conversations'
        ]);
        return Resource::collection($campaign
            ->conversations()
            ->filter(request()->all())
            ->withApi()
            ->lastSync(request()->get('lastSync'))
            ->paginate());
    }

    /**
     * @param Campaign $campaign
     * @param Conversation $conversation
     * @return Resource
     */
    public function show(Campaign $campaign, Conversation $conversation)
    {
        $this->authorize('access', $campaign);
        $this->authorize('view', $conversation);
        return new Resource($conversation);
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
        $this->authorize('create', Conversation::class);

        /** @var Conversation $model */
        $model = Conversation::create($request->all());
        $this->crudSave($model);
        return new Resource($model);
    }

    /**
     * @param Request $request
     * @param Campaign $campaign
     * @param Conversation $conversation
     * @return Resource
     */
    public function update(Request $request, Campaign $campaign, Conversation $conversation)
    {
        $this->authorize('access', $campaign);
        $this->authorize('update', $conversation);
        $conversation->update($request->all());
        $this->crudSave($conversation);

        return new Resource($conversation);
    }

    /**
     * @param Request $request
     * @param Campaign $campaign
     * @param Conversation $conversation
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(\Illuminate\Http\Request $request, Campaign $campaign, Conversation $conversation)
    {
        $this->authorize('access', $campaign);
        $this->authorize('delete', $conversation);
        $conversation->delete();

        return response()->json(null, 204);
    }
}
