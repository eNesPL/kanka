<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Resources\ProfileResource;
use Illuminate\Support\Facades\Log;

class ProfileApiController extends ApiController
{
    public function index()
    {
        Log::info('API', [
            'action' => 'index',
            'endpoint' => 'profile'
        ]);
        return new ProfileResource(auth()->user());
    }
}
