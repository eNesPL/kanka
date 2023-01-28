<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Campaign;
use App\Http\Resources\RelationResource as Resource;
use Illuminate\Support\Facades\Log;

class RelationApiController extends ApiController
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
            'endpoint' => 'relations'
        ]);
        return Resource::collection(
            $campaign->entityRelations()
                ->has('target')
            ->paginate()
        );
    }

}
