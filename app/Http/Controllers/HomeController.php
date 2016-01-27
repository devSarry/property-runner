<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Portfolio;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use JavaScript;



class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {

        Javascript::put(['portfolio' => Portfolio::all()]);
        return view('dashboard.index');
    }
}
