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
                        "view" => 1,
                        "edit" => 0,
                        "user_id" => $user->id,
                        "dashboard_id" => $dashboard->id
                    ]);
                }
            }
        }

        //check if id is set then use the rquest otherwise use 1 
        $wantedDash1 = $request->query('id') ?? 1;

        if($wantedDash1 == 1) {
            if(auth()->id() == 1) {
                $findDashboardUser = User::find(1)->Dashboards()->orderBy('id', 'ASC')->first();
                $wantedDash = $findDashboardUser->id;
            } else {
                $dashboard = Dashboards::orderBy('id', 'ASC')->get();
                $wantedDash = 1;
                foreach ($dashboard as $dash) {
                $new = User::find(auth()->id())->dashboardRights()->where('dashboard_id', $dash->id)->first();
                    if($new->view == 1) {
                        $wantedDash = $dash->id;
                        break;
                    }
                }
            }
        } else {
            $wantedDash = $wantedDash1;
        }

       //checking the dashboardrights a user has an checking if user has an right record to his wanted id 
        $checkUserRight = User::find(auth()->id())->dashboardRights()->where('dashboard_id', $wantedDash)->first();
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

            //setting sessions for the permissions of the users
            Session::put('dash_id', $checkUserRight->dashboard_id);
            Session::put('edit', $checkUserRight->edit);

            $perm = array(User::all(), Dashboards::all(), dashboardRights::all());
            return view('dashboard', compact('widgets', 'customWidgets', 'perm', 'defaultRights'));
        } else {
            echo "You are not allowed to see this dashboard";
        }
    }
}
