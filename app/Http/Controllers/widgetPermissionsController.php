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
        $edit = $request['edit'] == "checked" ? 1 : 0;
        $view = $request['view'] == "checked" ? 1 : 0;

        $perm = dashboardRights::where('user_id', $request['user_id'])
            ->where('dashboard_id', $request['dashboard_id'])
            ->first();

        $perm->edit = $edit;
        $perm->view = $view;

        $perm->save();

        return redirect()->to('/home');
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