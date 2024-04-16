<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customWidget;
use App\Models\dataWidget;
use Auth;

class customWidgetController extends Controller
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
        $div = $request['div'];
        $color = $request['color'];
        $name = $request['name'];
        $box = $request['box'];

        customWidget::create([
            "email"=>Auth::user()->email,
            "toCloneDiv"=>$div,
            "color"=>$color,
            "name"=>$name,
            "source"=>$box,
            "clonedDiv"=>"empty"
        ]);
    
        $count = dataWidget::where('widget', 'LIKE', '%customDrag%')->where('email', Auth::user()->email)->get();
        $Count = $count->count();
        $new = $Count;

        $new2 = $Count + 7;


        $divnew = "div".strval($new2);
        $newdrag = "customDrag".strval($new);

        dataWidget::create([
            "email"=>Auth::user()->email,
            "container"=>$divnew,
            "widget"=>$newdrag
        ]);
        
        return response()->json(["msg"=>"succes"]);
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
