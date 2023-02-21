<?php


namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;


use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;
use DB;
use Exception;

class CheckDatabaseOnline extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    // protected function redirectTo($request)
    // {
    //     try {
    //         DB::connection()->getPdo();
    //         //code...
    //     } catch (\Throwable $th) {
    //         //throw $th;
    //         dd($th);
    //     }
        
    // }

    public function handle($request, Closure $next, ...$guards)
    {
        try {
            DB::connection()->getPDO();
dump("database is connected.");
            // return $next($request);
            // dd("sdf");
        } catch (Exception $th) {
            //throw $th;
dump("failed");
            // return route('login.api');
        }

        
    }
}
