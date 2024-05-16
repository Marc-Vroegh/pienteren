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

    <div id="widget_container" class="widget_container fixed bottom-0 bg-gray-300 bg-opacity-75 py-4 shadow-md overflow-hidden hidden">
        <div class="px-4 overflow-y-auto max-h-64"> 
            <div class="grid gap-2 justify-items-center grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
                @foreach($widgets as $widget)
                @php
                    $widgetId = 'widget_' . $widget->id; // Generate a unique widget ID using the widget's ID
                @endphp
            
                {{--  variables of the component --}}
                @component('components.widget', [
                    'title' => $widget->title,
                    'icon' => $widget->icon,
                    'value' => $widget->value,
                    'unit' => $widget->unit,
                    'widgetId' => $widgetId
                ])
                @endcomponent
            @endforeach
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
                    <div class="p-6 text-black">
                                <div style="width: 100%; height: 340px;" id="pop-up-inner-container" class="h-screen flex justify-center ">
                      
                            </div>

                    <div id="pop-up-inner-container-change" class="z-50 bg-neutral-900 p-5 rounded-xl">
                        <h1>Aanpassingen</h1>
                        
                        <div class="pt-3">
                            <div class="grid grid-cols-3 gap-3">
                                <div>
                                    <label for="box" class="block mb-2 text-sm font-medium text-gray-900 text-white">Kies bron</label>
                                    <select id="box" class="form-select bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="Select">Select</option>
                                        @for ($i = 1; $i <= 5; $i++)
                                            <option value="box{{ $i }}">{{ "Box" . $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                        
                                <div>
                                    <label for="color-input" class="block mb-2 text-sm font-medium text-gray-900 text-white">Kies kleur</label>
                                    <input type="color" id="color-input" class="h-10 w-full block bg-white cursor-pointer rounded-lg disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-700 dark:border-gray-700">
                                </div>
                                                            
                                <div>
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 text-white">Kies naam</label>
                                    <input type="text" id="name" class="form-input h-10 w-full block bg-white cursor-pointer rounded-lg disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-700 dark:border-gray-700" 
                                    maxlength="30" placeholder="Choose name (required)" required>
                                </div>
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








</div>


@endsection