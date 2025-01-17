<?php

namespace App\Console\Commands\Tests;

use App\Services\NewsletterService;
use App\User;
use Illuminate\Console\Command;

class Mailerlite extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:mailerlite';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test the mailerlite integration';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        /** @var NewsletterService $service */
        $newsletter = app()->make(NewsletterService::class);

        $user = User::findorFail(13);

        if ($newsletter->user($user)->isSubscribed()) {
            $newsletter->remove();
        } else {
            $options = [
                'releases' => (bool) $user->mail_release
            ];

            $newsletter->update($options);
        }
        return Command::SUCCESS;
    }
}
