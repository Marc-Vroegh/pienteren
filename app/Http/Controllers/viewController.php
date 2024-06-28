<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dataBox;
use App\Models\CustomWidget;
use App\Models\defaultWidget;
use Auth;

class viewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $default_id = CustomWidget::find($request->id)->default_widget_id;
        $unit = DefaultWidget::find($default_id)->unit;

        $unitMap = [
            "graden" => "temp",
            "procent" => "lvh",
            "ppm" => "ppm",
            "dB" => "db",
            "lumen" => "lumen",
        ];

        $value = $unitMap[$unit] ?? null;

        $data = DataBox::select($value, 'created_at')
            ->orderBy('created_at', 'desc') 
            ->take(10)                      
            ->get()
            ->map(function ($item) use ($value, $unit) {
                return [
                    'name' => $item->$value,
                    'created_at' => $item->created_at,
                    'unit' => $unit
                ];
        });

        return response()->json([
            'data' => $data,
            'success' => true
        ]); 
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
        //
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
