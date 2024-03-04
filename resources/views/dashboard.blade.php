@extends('layouts.app')

@section('sidebar')
    @parent
@endsection
@section('content')
<div style="margin-left: 300px;" class="">
    <div style="width: 300px; height: 300px;" id="div1" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
    <div style="width: 300px; height: 300px;" id="div2" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
    <div style="width: 278px; height: 278px; border-width: 1px;" id="drag1" draggable="true" ondragstart="drag(event)" class="rounded-lg container p-2 bg-gray-500 border-solid; border-gray-400">
    <h1>Temperatuur</h1>
    <div style="margin-left: -20px; margin-top: 65px;" class="flex justify-center items-center">
        <i style="font-size: 100px;" class="bi bi-thermometer-half"></i>
        <h1>29 graden</h1>
        </div>
    </div>
    <div style="width: 278px; height: 278px; border-width: 1px;" id="drag2" draggable="true" ondragstart="drag(event)" class="rounded-lg container p-2 bg-amber-600 border-solid; border-amber-500">
    <h1>Clock</h1>
    <div style="margin-top: 75px;" class="flex justify-center items-center">
         <div id="MyClockDisplay" class="clock" onload="showTime()"></div>
        </div>
    </div>

    <div style="display: none;" id="hideatstart" class="absolute right-0 top-0 text-white hideatstart h-screen flex items-center">
        <div style="height: 80%;" class="bg-gray-300 p-5 rounded-l-2xl border-solid; border-gray-400 border-2 opacity-90">
            <div style="width: 290px; height: 300px; border: 2px;" id="div1" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
            <div style="width: 290px; height: 300px; border: 2px;" id="div2" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
        </div>
    </div>
</div>


 
    
@endsection