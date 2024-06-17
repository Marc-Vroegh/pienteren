<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dashboards;
use App\Models\dashboardRights;
use App\Models\User;

class databaseController extends Controller
{
    public function destroy(Request $request)
    {
        //getting id to destroy with request
        $dashboard = $request->input('id');
        //finding all dashboards with id and then find all dashboardrights which cooresponds with it and delete that
        Dashboards::find($dashboard)->dashboardRights()->delete();
        //finding all dashboards with id and then find all customWidgets which cooresponds with it and delete that
        Dashboards::find($dashboard)->CustomWidgets()->delete();
        //finally delete the dashboard itself
        Dashboards::find($dashboard)->delete();
        //redirect back to home
        return redirect('/home');
    }

    public function store(Request $request)
    {
        //getting request name for the dashboard
        $name = $request['name'];

        //creating dashboard with name and the authenticated user_id
        Dashboards::create([
            "name"=>$name,
            "user_id"=>auth()->id()
        ]);

        //getting all dashboards and take last
        $dashboard = Dashboards::orderBy('id', 'DESC')->first();

        //getting the new dashboard id
        $id = $dashboard->id;

        //getting all users
        $all = user::all();


        //foreach user as all
        foreach ($all as $user) {
            //create new dashboard right for all users
            dashboardRights::create([
                "view"=>0,
                "edit"=>0,
                "user_id"=>$user->id,
                "dashboard_id"=>$id
            ]);
    
        }

        //redirect user back to home
        return redirect('/home');
    }
}
