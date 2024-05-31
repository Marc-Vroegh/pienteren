<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\permissionDataUser;
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
            $perm = permissionDataUser::where('email', $request['email'])->first();
            if(isset($request['temp'])) {
                $perm->temp = $request['temp'];
            }
            if(isset($request['lvh'])) {
                $perm->lvh = $request['lvh'];
            }
            if(isset($request['ppm'])) {
                $perm->ppm = $request['ppm'];
            }
            if(isset($request['db'])) {
                $perm->db = $request['db'];
            }
            if(isset($request['lumen'])) {
                $perm->lumen = $request['lumen'];
            }
            $perm->save();

            return redirect()->to('/home'); 

       // $perm->save();
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
