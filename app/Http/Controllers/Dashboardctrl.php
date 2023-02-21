<?php


namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use Hash;


// use Illuminate\Support\Arr;
// use Illuminate\Support\Collection;
// use App\Models\User;

// use Illuminate\Support\Facades\Log;
// use Illuminate\Support\Facades\Auth;

use Auth;

class Dashboardctrl extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        
        // Auth::logout();

        return view('dashboard.wrap');
    }
}
