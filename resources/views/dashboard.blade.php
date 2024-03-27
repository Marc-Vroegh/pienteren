@extends('layouts.app')

@section('sidebar')
    @parent
@endsection

@section('content')

<div id="changeHeight" style="margin-left: 600px;" class="">

<!-- Dashboard -->

<div class="flex flex-wrap">
    <div style="min-width: 278px; min-height: 278px; border: 2px; padding: 10px;" id="div1" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
    <div style="min-width: 278px; min-height: 278px; border: 2px; padding: 10px;" id="div2" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
    <div style="min-width: 278px; min-height: 278px; border: 2px; padding: 10px;" id="div3" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
    <div style="min-width: 278px; min-height: 278px; border: 2px; padding: 10px;" id="div4" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
    <div style="min-width: 278px; min-height: 278px; border: 2px; padding: 10px;" id="div5" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
    <div style="min-width: 278px; min-height: 278px; border: 2px; padding: 10px;" id="div6" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
    <div style="min-width: 278px; min-height: 278px; border: 2px; padding: 10px;" id="div7" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
    <div style="min-width: 278px; min-height: 278px; border: 2px; padding: 10px;" id="div8" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
    <div style="min-width: 278px; min-height: 278px; border: 2px; padding: 10px;" id="div9" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
    <div style="min-width: 278px; min-height: 278px; border: 2px; padding: 10px;" id="div10" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
    <div style="min-width: 278px; min-height: 278px; border: 2px; padding: 10px;" id="div11" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
    <div style="min-width: 278px; min-height: 278px; border: 2px; padding: 10px;" id="div12" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
    <div style="min-width: 278px; min-height: 278px; border: 2px; padding: 10px;" id="div13" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
    <div style="min-width: 278px; min-height: 278px; border: 2px; padding: 10px;" id="div14" ondrop="drop(event)" ondragover="allowDrop(event)"></div>               
</div>


    <!-- Widgetbar -->


    <div style="height: 250px; min-width: calc(100% - 573px); margin-left: 573px;" id="hideatstart" class="absolute bottom-0 start-0 text-white hideatstart">
        <div style="color: white !important; width: 100%; height: 250px;" class=" bg-gray-300 p-5 rounded-t-2xl border-solid; border-gray-400 border-2 opacity-90 overflow-scroll">
            <div class="flex flex-wrap">
                <div style="min-width: 278px; min-height: 278px; border: 2px; padding: 10px;" id="div10" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
                <div style="min-width: 278px; min-height: 278px; border: 2px; padding: 10px;" id="div20" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
                <div style="min-width: 278px; min-height: 278px; border: 2px; padding: 10px;" id="div30" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
                <div style="min-width: 278px; min-height: 278px; border: 2px; padding: 10px;" id="div40" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
                <div style="min-width: 278px; min-height: 278px; border: 2px; padding: 10px;" id="div50" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
                <div style="min-width: 278px; min-height: 278px; border: 2px; padding: 10px;" id="div60" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
                <div style="min-width: 278px; min-height: 278px; border: 2px; padding: 10px;" id="div70" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
                <div style="min-width: 278px; min-height: 278px; border: 2px; padding: 10px;" id="div80" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
                <div style="min-width: 278px; min-height: 278px; border: 2px; padding: 10px;" id="div90" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
                <div style="min-width: 278px; min-height: 278px; border: 2px; padding: 10px;" id="div100" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
                <div style="min-width: 278px; min-height: 278px; border: 2px; padding: 10px;" id="div110" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
                <div style="min-width: 278px; min-height: 278px; border: 2px; padding: 10px;" id="div120" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
                <div style="min-width: 278px; min-height: 278px; border: 2px; padding: 10px;" id="div130" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
                <div style="min-width: 278px; min-height: 278px; border: 2px; padding: 10px;" id="div140" ondrop="drop(event)" ondragover="allowDrop(event)"></div>               
            </div>
        </div>
    </div>

    <!-- Hardwired Wdigets -->

    <div style="width: 100%; height: 100%; max-width: 278px; max-height: 278px; border-width: 1px;" id="drag1" draggable="true" ondragstart="drag(event)" class="w-full aspect-square drag rounded-lg container p-2 bg-gray-500 border-solid; border-gray-400" onclick="widgetClick()">
    <h1>Temperature</h1>
    <div style="margin-left: -20px; margin-top: 65px;" class="flex justify-center items-center">
        <i style="font-size: 100px;" class="bi bi-thermometer-half"></i>
        <h1>29 graden</h1>
        </div>
    </div>
    
    <div style="width: 100%; height: 100%; max-width: 278px; max-height: 278px; border-width: 1px;" id="drag2" draggable="true" ondragstart="drag(event)" class="w-full aspect-auto drag rounded-lg container p-2 bg-amber-600 border-solid; border-amber-500" onclick="widgetClick()">
    <h1>Clock</h1>
    <div style="margin-top: 75px;" class="flex justify-center items-center">
         <div id="MyClockDisplay" class="clock" onload="showTime()"></div>
        </div>
    </div>


    <div style="display: none; width: calc(100% - 300px);" id="hideatstart2" class="absolute right-0 top-0 text-white hideatstart2 h-screen flex items-center">
        <div style="color: white !important; width: 100%; height: 100%;" class="bg-zinc-950 p-5">
            
        </div>
    </div>
</div>


 
    
@endsection