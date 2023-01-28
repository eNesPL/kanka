<?php

namespace App\Jobs\Users;

use App\Observers\UserObserver;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class DeleteUser implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /** @var int */
    protected $user;

    /**queue
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user->id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $user = User::find($this->user);
        if (!$user) {
            // User wasn't found
            Log::warning('Unknown user to delete', ['user' => $this->user, 'job' => true]);
        }

        User::observe(UserObserver::class);
        $user->delete();

        Log::info('Delete user', ['user' => $this->user, 'job' => true]);
    }
}
