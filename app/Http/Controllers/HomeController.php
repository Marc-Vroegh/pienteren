<?php

namespace App\Http\Controllers;

use App\Models\CustomWidget;
use Illuminate\Http\Request;
use App\Models\dataBox;
use App\Models\defaultWidget;
use App\Models\permissionDataUser;
use App\Models\User;
use App\Models\Dashboards;
use App\Models\dashboardRights;
use Session;
use Carbon\Carbon;


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

    public function index(Request $request)
    {  
        $allDashboards = Dashboards::all();

        //for every dashboard
        foreach ($allDashboards as $dashboard) {
            //retrive all users
            $allUsers = User::all();

            //for every dashboard check all users
            foreach ($allUsers as $user) {
                //chexk for every dashbioard if every user has the right to edit
                $rightsExist = DashboardRights::where('user_id', $user->id)
                                            ->where('dashboard_id', $dashboard->id)
                                            ->exists();
        
                // Voeg rechten toe als ze nog niet bestaan
                if (!$rightsExist) {
                    DashboardRights::create([
                        "view" => 0,
                        "edit" => 0,
                        "user_id" => $user->id,
                        "dashboard_id" => $dashboard->id
                    ]);
                }
            }
        }

        //check if id is set then use the rquest otherwise use 1 
        $wantedDash1 = $request->query('id') ?? "null";

        if($wantedDash1 == "null") {
            if(auth()->id() == 1) {
                //check if user has dashboard
                $findDashboardUser = User::find(1)->Dashboards()->orderBy('id', 'ASC')->first();
                //wanteddash is id of dashboard
                $wantedDash = $findDashboardUser->id;
            } else {
                //get all dashboard on order
                $dashboard = Dashboards::orderBy('id', 'ASC')->get();
                //set fallback value
                $wantedDash = 1;
                //foreach dashboard
                foreach ($dashboard as $dash) {
                $new = User::find(auth()->id())->dashboardRights()->where('dashboard_id', $dash->id)->first();
                //check if user has right to dashboard
                    if($new->view == 1) {
                        //set wanted dash
                        $wantedDash = $dash->id;
                        //break loop
                        break;
                    }
                }
            }
        } else {
            $wantedDash = $wantedDash1;
        }

       //checking the dashboardrights a user has an checking if user has an right record to his wanted id 
        $checkUserRight = User::find(auth()->id())->dashboardRights()->where('dashboard_id', $wantedDash)->first();

        //echo $checkUserRight;
        //check if users is allowed to view his wanted id or is admin that can see every dashboard no matter which settings
        if ($checkUserRight->view == 1 || auth()->id() == 1) {
            //retrieving all widgets from dashboard that is selected with wanted id
            $customWidgets1 = Dashboards::find($wantedDash)->CustomWidgets;
            $userId = auth()->id(); //catch auth user

            //getting cuurent time minus the amount specified (*10 minutes)
            $twentyMinutesAgo = Carbon::now()->subMinutes(10);

            //getting data from teh data box
            $dataBoxes1 = dataBox::where('created_at', '>=', $twentyMinutesAgo)
            ->orderBy('created_at', 'desc')
            ->first(); 
            //making array with all the widgets, all databox data and all default widgets data
            $customWidgets = array($customWidgets1, $dataBoxes1, defaultWidget::all());

            $defaultRights =  User::find(auth()->id())->dashboardRights()->get();

            //returning all the dafault widgets for the widgetbar
            $widgets = defaultWidget::all();

            //getting all dashboard rights
            $name = Dashboards::all();

            //setting sessions for the permissions of the users
            Session::put('dash_id', $checkUserRight->dashboard_id);
            Session::put('edit', $checkUserRight->edit);
            Session::put('dashboard', $name);

            $perm = array(User::all(), Dashboards::all(), dashboardRights::all());
            return view('dashboard', compact('widgets', 'customWidgets', 'perm', 'defaultRights'));
        } else {
            echo "You do not have any dashboards yet, ask your admin to add the rights to view a dashboard.";
            echo '<br><a href="' . route('logout') . '" onclick="event.preventDefault(); document.getElementById(\'logout-form\').submit();">
            <span>' . __('Logout') . '</span>
            <form id="logout-form" action="' . route('logout') . '" method="POST" class="d-none">' . csrf_field() . '</form></a>';
        }
    }
}
