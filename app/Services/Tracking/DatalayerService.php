<?php

namespace App\Services\Tracking;

class DatalayerService
{
    public function base(): string
    {
        $data = [
            'userType' => auth()->check() ? 'registered' : 'visitor',
            'userGroup' => $this->userGroup()
        ];
        return json_encode($data);
    }

    protected function userGroup(): string
    {
        // Set in session? Use that
        if (session()->has('user_group')) {
            return session()->get('user_group');
        }

        if (auth()->check()) {
            return auth()->user()->id % 2 == 0 ? 'a' : 'b';
        }

        // Unlogged user, use one from the session
        $group = mt_rand(0, 1) === 0 ? 'a' : 'b';
        session()->put('user_group', $group);
        return $group;
    }
}