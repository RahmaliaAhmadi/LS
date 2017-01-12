<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use App\Services\Statut;

class ReSuccess
{
    /**
     * Handle the event.
     *
     * @param  Login  $login
     * @return void
     */
    public function handle(Login $login)
    {
       session('kiddan', 'ki');
	   die("heheh");
    }
}
