<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class ChangeUserStatusCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:changeStatus';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Change status to inactive for users whose email contains test word';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Find users whose email contains test word
        $users = User::where('email', 'LIKE', '%test%')->get();
        $count = 0;

        foreach ($users as $user) {
            $user->status = 'inactive';
            $user->save();
            ++$count;
        }

        $this->info("$count users status changed to In-active.");
    }
}
