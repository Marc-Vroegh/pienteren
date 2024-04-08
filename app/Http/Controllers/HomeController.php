<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dataBox;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $return = dataBox::where("email", Auth::user()->email)->orderBy('id', 'DESC')->get();
        return view('dashboard')->with('return', $return);
    }
}
