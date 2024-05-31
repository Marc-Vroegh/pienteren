<?php

namespace App\Http\Controllers;

use App\Models\CustomWidget;
use Illuminate\Http\Request;
use App\Models\dataBox;
use App\Models\defaultWidget;
use App\Models\permissionDataUser;


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
        $userId = auth()->id(); //catch auth user
        $dataBoxes1 = dataBox::orderBy('id', 'DESC')->first(); 
        $customWidgets1 = CustomWidget::where('user_id', $userId)->get();
        $permissionUsers = permissionDataUser::where('email', Auth::user()->email)->first();
        $customWidgets = array($customWidgets1, $dataBoxes1, defaultWidget::all(), $permissionUsers);
        $widgets = defaultWidget::all(); 
        $perm = permissionDataUser::all(); 
        return view('dashboard', compact('widgets', 'customWidgets', 'perm'));
    }
}
