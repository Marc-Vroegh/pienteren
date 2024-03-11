@extends('layouts.app')

@section('sidebar')
    @parent
@endsection
@section('content')
<div style="margin-left: 300px;" class="">
    <div style="width: 300px; height: 300px;" id="div1" class="div1" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
    <div style="width: 300px; height: 300px;" id="div2" class="div2" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
    <div style="width: 100%; height: 100%; max-width: 278px; max-height: 278px; border-width: 1px;" id="drag1" draggable="true" ondragstart="drag(event)" class="drag rounded-lg container p-2 bg-gray-500 border-solid; border-gray-400" onclick="widgetClick()">
    <h1>Temperature</h1>
    <div style="margin-left: -20px; margin-top: 65px;" class="flex justify-center items-center">
        <i style="font-size: 100px;" class="bi bi-thermometer-half"></i>
        <h1>29 graden</h1>
        </div>
    </div>
    <div style="width: 100%; height: 100%; width: 278px; height: 278px; border-width: 1px;" id="drag2" draggable="true" ondragstart="drag(event)" class="drag rounded-lg container p-2 bg-amber-600 border-solid; border-amber-500" onclick="widgetClick()">
    <h1>Clock</h1>
    <div style="margin-top: 75px;" class="flex justify-center items-center">
         <div id="MyClockDisplay" class="clock" onload="showTime()"></div>
        </div>
    </div>

    <div style="display: none;" id="hideatstart" class="absolute right-0 top-0 text-white hideatstart h-screen flex items-center">
        <div style="color: white !important; height: 80%;" class=" bg-gray-300 p-5 rounded-l-2xl border-solid; border-gray-400 border-2 opacity-90 overflow-scroll">
            <div style="width: 290px; height: 300px; border: 2px;" id="div20" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
            <div style="width: 290px; height: 300px; border: 2px;" id="div21" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
            <div style="width: 290px; height: 300px; border: 2px;" id="div22" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
            <div style="width: 290px; height: 300px; border: 2px;" id="div23" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
            <div style="width: 290px; height: 300px; border: 2px;" id="div24" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
            <div style="width: 290px; height: 300px; border: 2px;" id="div25" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
            <div style="width: 290px; height: 300px; border: 2px;" id="div26" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
            <div style="width: 290px; height: 300px; border: 2px;" id="div27" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
        </div>
    </div>

    <div style="display: none; width: calc(100% - 300px);" id="hideatstart2" class="absolute right-0 top-0 text-white hideatstart2 h-screen flex items-center">
        <div style="color: white !important; width: 100%; height: 100%;" class="bg-zinc-950 p-5">
            
        </div>
    </div>
</div>


 
    
@endsection