<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class MakeUserAdmin extends Command
{
    protected $signature = 'user:make-admin {email}';
    protected $description = 'Grant admin privileges to a user';

    public function handle()
    {
        $user = User::where('email', $this->argument('email'))->first();

        if (!$user) {
            $this->error('User not found!');
            return;
        }

        if ($user->isAdmin()) {
            $this->info('User is already an admin.');
            return;
        }

        $user->is_admin = true;
        $user->save();

        $this->info("Success! {$user->email} is now an admin.");
    }
}