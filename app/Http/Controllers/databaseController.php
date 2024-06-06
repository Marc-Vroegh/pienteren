<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dashboards;
use App\Models\dashboardRights;
use App\Models\User;

class databaseController extends Controller
{
    public function store(Request $request)
    {
        $name = $request['name'];

        Dashboards::create([
            "name"=>$name,
            "user_id"=>auth()->id()
        ]);

        $dashboard = Dashboards::orderBy('id', 'DESC')->first();

        $id = $dashboard->id;

        $all = user::all();


        foreach ($all as $user) {
            dashboardRights::create([
                "view"=>1,
                "edit"=>0,
                "user_id"=>$user->id,
                "dashboard_id"=>$id
            ]);
    
        }

        return redirect('/home');
    }
}
