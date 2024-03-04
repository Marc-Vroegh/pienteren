@extends('layouts.app')

@section('sidebar')
    @parent
@endsection
@section('content')
<div style="margin-left: 300px;" class="">
    <div style="width: 300px; height: 300px;" id="div1" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
    <div style="width: 300px; height: 300px;" id="div2" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
    <div style="width: 278px; height: 278px;" id="drag1" draggable="true" ondragstart="drag(event)" class="rounded-lg container p-2 bg-stone-600">
    <h1>Temperatuur</h1>
    <div style="margin-left: -20px; margin-top: 65px;" class="flex justify-center items-center">
        <i style="font-size: 100px;" class="bi bi-thermometer"></i>
        <h1>29 graden</h1>
        </div>
    </div>
    <div style="width: 278px; height: 278px;" id="drag2" draggable="true" ondragstart="drag(event)" class="rounded-lg container p-2 bg-stone-600">
    <h1>CO2</h1>
    <div style="margin-left: -20px; margin-top: 65px;" class="flex justify-center items-center">
        <i style="font-size: 100px;" class="bi bi-thermometer"></i>
        <h1>6 co2</h1>
        </div>
    </div>

    <div style="display: none;" id="hideatstart" class="absolute right-0 top-20 text-white flex items-center justify-center">
        <div style="height: 1000%;" class="bg-gray-500 p-5 rounded-xl">
            <div style="width: 300px; height: 300px; border: 2px;" id="div1" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
            <div style="width: 300px; height: 300px; border: 2px;" id="div2" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
        </div>
    </div>
</div>


 
    
@endsection