<?php

namespace Figurluk\LogLogin\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * User: Lukas Figura
 * Date: 16.08.16
 * Time: 20:46.
 */
class LogLoginEventListener implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the login event.
     */
    public function handle()
    {
        DB::table(config('loglogin.table_name'))->insert(array(
            'ip_address' => \Request::getClientIp(),
            'user_id' => Auth::user()->id,
            'created_at' => date('Y-m-d H:i:s'),
        ));
    }
}
