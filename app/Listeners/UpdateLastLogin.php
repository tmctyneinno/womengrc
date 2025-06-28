<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;

class UpdateLastLogin
{
    /**
     * Handle the event.
     *
     * @param  \Illuminate\Auth\Events\Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        // Update the last_login_at timestamp when the user logs in
        $event->user->update([
            'last_login_at' => now(),
        ]);
    }
}
