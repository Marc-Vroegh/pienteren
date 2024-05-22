<?php

namespace App\Http\Controllers;

use App\Models\CustomWidget;
use Illuminate\Http\Request;
use App\Models\dataBox;
use App\Models\defaultWidget;


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
        $dataBoxes = dataBox::orderBy('id', 'DESC')->get(); 
        $customWidgets = CustomWidget::where('user_id', $userId)->get();
        $widgets = defaultWidget::all(); 
        return view('dashboard', compact('dataBoxes', 'widgets', 'customWidgets'));
    }
}
