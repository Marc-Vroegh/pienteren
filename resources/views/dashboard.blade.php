@extends('layouts.app')

@section('sidebar')
    @parent
@endsection

@section('content')
  
<div class="dashboard-container hidescroll overflow-scroll">

    <!-- Dashboard -->
    <div id="dashboard" class="p-3 overflow-scroll absolute hidescroll h-full">
        <div class="flex flex-wrap">
            <!-- Loop through amount of divs -->
            <?php for ($i = 1; $i <= 14; $i++) { ?>
                <div class="box" id="div<?php echo $i; ?>" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
            <?php } ?>
        </div>
    </div>
    
    <!-- Widgetbar -->
    <div id="widget_container" class="widget_container absolute bottom-0 start-0 text-white overflow-scroll">
        <div class="widget-content bg-gray-300 p-5 rounded-t-2xl border-solid border-gray-400 border-2 opacity-90">
            <div class="flex flex-wrap">
                <!-- Loop through amount of divs -->
                <?php for ($i = 100; $i <= 140; $i += 1) { ?>
                    <div class="box" id="div<?php echo $i; ?>" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
                <?php } ?>
            </div>
        </div>
    </div>

    <!-- Black container for widget -->

    <di id="black-container" class="hidden w-[calc(100%-240px)] absolute right-0 top-0 text-white black-container h-screen flex items-center">
        <div style="color: white !important; width: 100%; height: 100%;" class="bg-neutral-700 p-5">
            
        </div>
    </div>







    <!-- Hardwired Widgets (To be deprecated soon because of livewire) -->
 
    <div style="width: 100%; height: 100%; max-width: 278px; max-height: 278px; border-width: 1px;" id="drag1" draggable="true" ondragstart="drag(event)" class="w-full aspect-auto drag rounded-lg container p-2 bg-gray-500 border-solid; border-gray-400" onclick="widgetClick()">
    <h1>Temperature</h1>
    <div style="margin-left: -20px; margin-top: 30px;" class="flex justify-center items-center">
        <i style="font-size: 100px;" class="bi bi-thermometer-half"></i>
        <h1><?php if(isset($return[0])) { echo $return[0]->temp; } ?> graden</h1>
        </div>
    </div>

    <div style="width: 100%; height: 100%; max-width: 278px; max-height: 278px; border-width: 1px;" id="drag3" draggable="true" ondragstart="drag(event)" class="w-full aspect-auto drag rounded-lg container p-2 bg-cyan-700 border-solid; border-cyan-600" onclick="widgetClick()">
    <h1>Luchtvochtigheid</h1>
    <div style="margin-top: 30px;" class="flex justify-center items-center">
        <i style="font-size: 100px;" class="bi bi-cloud-rain"></i>
        <h1 style="margin-left: 10px;"><?php if(isset($return[0])) { echo $return[0]->lvh; } ?> %</h1>
        </div>
    </div>
    
    <div style="width: 100%; height: 100%; max-width: 278px; max-height: 278px; border-width: 1px;" id="drag2" draggable="true" ondragstart="drag(event)" class="w-full aspect-auto drag rounded-lg container p-2 bg-amber-600 border-solid; border-amber-500" onclick="widgetClick()">
        <h1>Clock</h1>
        <div style="margin-top: 70px;" class="flex justify-center items-center">
           <div id="MyClockDisplay" class="clock" onload="showTime()"></div>
        </div>
    </div>

</div>

</div>


@endsection