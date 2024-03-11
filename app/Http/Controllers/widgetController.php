<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dataWidget;

class widgetController extends Controller
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
        $target = $request['target'];
        $widget = $request['widget'];

            $retrievingWid = dataWidget::where(['email' => 'vroeghmarc@gmail.com', 'widget' => $widget])->get();
            foreach($retrievingWid as $retrievingWid2) {
               dataWidget::find($retrievingWid2->id)->delete();
            }
            dataWidget::create([
                "email"=>"vroeghmarc@gmail.com",
                "container"=>$target,
                "widget"=>$widget
            ]);
    
        return response()->json(["msg"=>"succes"]);
     /* header('Location: ../instr_home.php'); */
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $return = dataWidget::where("email", "vroeghmarc@gmail.com")->get();
        
        return response()->json($return);
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
    public function update(Request $request, dataWidget $widget)
    {

        // $target = $request['target'];
        // $widget = $request['widget'];

        // dataWidget::create([
        //     "container"=>$target,
        //     "widget"->$widget
        // ]);
    
        // return response()->json(["OK", 200]);
     /* header('Location: ../instr_home.php'); */

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
