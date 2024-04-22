@extends('layouts.app')

@section('sidebar')
    @parent
@endsection

@section('content')
  
<div class="dashboard-container scrollbar-hide overflow-scroll">

    <!-- Dashboard -->
    <div id="dashboard" class="p-3 overflow-scroll absolute scrollbar-hide h-full">
        <div class="flex flex-wrap">
            <!-- Loop through amount of divs -->
            <?php for ($i = 1; $i <= 14; $i++) { ?>
                <div class="box" id="div<?php echo $i; ?>" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
            <?php } ?>
        </div>
    </div>
    
    <!-- Widgetbar -->
    <div id="widget_container" class="widget_container absolute bottom-0 start-0 text-white overflow-scroll scrollbar-hide" opened="false">
        <div class="widget-content bg-gray-300 scrollbar-hide p-5 rounded-t-2xl border-solid border-gray-400 border-2 opacity-90">
            <div class="flex flex-wrap">
                <!-- Loop through amount of divs -->
                <?php for ($i = 100; $i <= 140; $i += 1) { ?>
                    <div class="box" id="div<?php echo $i; ?>" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
                <?php } ?>
            </div>
        </div>
    </div>

    <!-- Black container for widget -->

    <div id="black-container" class="hidden w-[calc(100%-240px)] absolute right-0 top-0 text-white black-container h-screen flex items-center">
        <div style="color: white !important; width: 100%; height: 100%;" class="bg-neutral-700 p-5">
            
        </div>
    </div>

     <!-- pop up container for widget holder -->

     <div id="pop-up-container-widget" class="hidden absolute end-0 top-0 text-white black-container z-50 flex items-center h-screen justify-center scrollbar-hide">
        <div style="color: white !important; width: 230px; height: 266px;;" class="pt-5 pb-5 pr-3 pl-5 bg-gray-300 rounded-l-2xl border-solid border-gray-400 border-2 opacity-90 scrollbar-hide">
            <div id="customDiv" ondragover="allowDrop(event)"></div> 
        </div>
    </div>


    <!-- pop-up container for widget styling -->
    <div id="pop-up-container" class="hidden right-0 top-0 w-full h-screen absolute bg-black bg-opacity-40 scrollbar-hide">
        <div id="pop-up-styler" class="hidden w-full absolute right-0 top-0 text-white black-container h-screen flex items-center scrollbar-hide">
            <div style="color: white !important; width: 680px; height: 580px; margin-left: auto; margin-right: auto;" class="scrollbar-hide overflow-scroll bg-opacity-95 rounded-2xl bg-neutral-700 p-5">

            <div class="flex justify-between items-center"> 
    <h1 class="text-lg">Widget Styler</h1>
    <button class="text-gray-400 hover:text-gray-600 focus:outline-none" onclick="window.location.reload()">
        <i class="bi bi-x text-2xl"></i>
    </button>
</div>
                    <div class="p-6">
                        <div style="width: 100%; height: 340px;" id="pop-up-inner-container" class="h-screen flex justify-center pop-up-inner-container">
                    </div>  

                    <div id="pop-up-inner-container-change" class="z-50 bg-neutral-900 p-5 rounded-xl pop-up-inner-container-change">
                        <h1>Aanpassingen</h1>

                        <div class="pt-3">
                            <div class="grid grid-cols-3 gap-3">
                                <div>
                                    <label for="box" class="block mb-2 text-sm font-medium text-gray-900 text-white">Kies bron</label>
                                        <select id="box" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" onchange="changeColor(this.value)">
                                            <option selected>Box1</option>
                                            <option value="box2">Box2</option>
                                            <option value="box3">Box3</option>
                                            <option value="box4">Box4</option>
                                            <option value="box5">Box5</option>
                                        </select>
                                </div>

                                <div><label for="hs-color-input" class="block text-sm font-medium mb-2 dark:text-white">Kies kleur</label>
                                    <input type="color" class=" h-10 w-full block bg-white cursor-pointer rounded-lg disabled:opacity-50 dis
                                    abled:pointer-events-none dark:bg-gray-700 dark:border-gray-700" id="color-input" value="#2563eb" title="Choose your color" onchange="changeColor(this.value)">
                                </div>
                                    
                                <div><label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 text-white">Kies naam</label>
                                    <input type="text" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:bo
                                    rder-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" maxlength="30" placeholder="Choose name (required)" onchange="changeText(this.value)" required/></div></div>
                                </div>

                            </div> 
                       </div>
                    </div>
            </div>
        </div>
    </div>


    <di id="black-container" class="hidden w-[calc(100%-240px)] absolute right-0 top-0 text-white black-container h-screen flex items-center">
        <div style="color: white !important; width: 100%; height: 100%;" class="bg-neutral-700 p-5">
            
        </div>
    </div>







    <!-- Hardwired Widgets (To be deprecated soon because of livewire) -->
 
    <div style="width: 100%; height: 100%; max-width: 278px; max-height: 278px; border-width: 1px;" id="drag1" draggable="true" ondragstart="drag(event)" class="w-full aspect-auto drag rounded-lg container p-2 bg-gray-500 border-solid; border-gray-400" onclick="widgetClick(this.id)">
    <h1>Temperature</h1>
    <div style="margin-left: -20px; margin-top: 30px;" class="flex justify-center items-center">
        <i style="font-size: 100px;" class="bi bi-thermometer-half"></i>
        <h1><?php if(isset($return[0])) { echo $return[0]->temp; } ?> graden</h1>
        </div>
    </div>

    <div style="width: 100%; height: 100%; max-width: 278px; max-height: 278px; border-width: 1px;" id="drag3" draggable="true" ondragstart="drag(event)" class="w-full aspect-auto drag rounded-lg container p-2 bg-cyan-700 border-solid; border-cyan-600" onclick="widgetClick(this.id)">
    <h1>Luchtvochtigheid</h1>
    <div style="margin-top: 30px;" class="flex justify-center items-center">
        <i style="font-size: 100px;" class="bi bi-cloud-rain"></i>
        <h1 style="margin-left: 10px;"><?php if(isset($return[0])) { echo $return[0]->lvh; } ?> %</h1>
        </div>
    </div>
    
    <div style="width: 100%; height: 100%; max-width: 278px; max-height: 278px; border-width: 1px;" id="drag2" draggable="true" ondragstart="drag(event)" class="w-full aspect-auto drag rounded-lg container p-2 bg-amber-600 border-solid; border-amber-500">
        <h1>Clock</h1>
        <div style="margin-top: 70px;" class="flex justify-center items-center">
           <div id="MyClockDisplay" class="clock" onload="showTime()"></div>
        </div>
    </div>

</div>


@endsection