<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dashboardRights;
use Auth;

class widgetPermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //checking if the request edit equals checked then use 1 otherwise 0
        $edit = $request->edit == "checked" ? 1 : 0;
        //checking if the request view equals checked then use 1 otherwise 0
        $view = $request->view == "checked" ? 1 : 0;

        //getting all dashboardRights where user_id equals request user_id and dashboard_id equals request dashboard_id
        $perm = dashboardRights::where('user_id', $request->user_id)
            ->where('dashboard_id', $request->dash_id)
            ->first();

        //perm edit from get request is the $edit variable
        $perm->edit = $edit;
        //perm view from get request is the $viewvariable
        $perm->view = $view;

        //saving the changes
        $perm->save();

        //return response for javascript
        return response()->json(['success' => true]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
