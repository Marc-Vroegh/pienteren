<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dataBox;
use Auth;

class rpiStoreController extends Controller
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
        $temp = $request['temp'];
        $lvh = $request['lvh'];
        $ppm = $request['ppm'];
        $db = $request['db'];
        $lumen = $request['lumen'];

        dataBox::create([
            "email"=>Auth::user()->email,
            "temp"=>$temp,
            "lvh"=>$lvh,
            "ppm"=>$ppm,
            "db"=>$db,
            "lumen"=>$lumen
        ]);
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
