@extends('layouts.app')

@section('sidebar')
    @parent
@endsection

@section('content')
  
<div class="changeMarginLeft2 hidescroll">


    <!-- Dashboard -->
    <div style="overflow: scroll;" id="changeHeight" class="absolute top-4 hidescroll">
        <div class="flex flex-wrap">
            <!-- Loop through amount of divs -->
            <?php for ($i = 1; $i <= 14; $i++) { ?>
                <div class="box" id="div<?php echo $i; ?>" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
            <?php } ?>
        </div>
    </div>
    
    <!-- Widgetbar -->
    <div id="hideatstart" class="widget-container absolute bottom-0 start-0 text-white hideatstart">
        <div class="widget-content changeMarginLeft hidescroll bg-gray-300 p-5 rounded-t-2xl border-solid border-gray-400 border-2 opacity-90 overflow-scroll">
            <div class="flex flex-wrap">
                <?php for ($i = 10; $i <= 140; $i += 10) { ?>
                    <div class="box" id="div<?php echo $i; ?>" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
                <?php } ?>
            </div>
        </div>
    </div>
    

    <!-- Hardwired Widgets -->

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

    <!-- Black container for widget -->

    <div style="display: none; width: calc(100% - 300px);" id="hideatstart2" class="absolute right-0 top-0 text-white hideatstart2 h-screen flex items-center">
        <div style="color: white !important; width: 100%; height: 100%;" class="bg-zinc-950 p-5">
            
        </div>
    </div>
</div>

</div>


@endsection