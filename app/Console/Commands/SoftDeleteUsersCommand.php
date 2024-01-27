<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class SoftDeleteUsersCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:softDelete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Soft delete users for users have status inactive';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Soft delete users with status inactive
        $count = User::where('status', 'inactive')->delete();

        // Output the number of users soft deleted
        $this->info("$count users soft deleted.");
    }
}
