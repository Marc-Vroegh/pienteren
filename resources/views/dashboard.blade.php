@extends('layouts.app')

@section('sidebar')
    @parent
@endsection

@section('content')

  
<div class="dashboard-container scrollbar-hide overflow-scroll">

    <!-- Dashboard -->
    <x-widget-display :customWidgets="$customWidgets" />
    <x-perm-editor :perm="$perm" />

    <!-- Widgetbar -->
    <div id="widget_container" class="widget_container fixed bottom-0 bg-gray-300 bg-opacity-75 py-4 shadow-md overflow-hidden hidden">
        <div class="scrollbar-hide px-4 overflow-y-auto max-h-64"> 
            <div class="grid gap-2 justify-items-center grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
            @foreach($widgets as $widget)
        @php
            $widgetId = 'widget_' . $widget->id; // unique widget ID
            $formattedValue = ($widget->unit == 'time') ? date('H:i', $widget->value) : $widget->value;
        @endphp

        {{--  variables of the component --}}
        @component('components.widget', [
            'title' => $widget->title,
            'icon' => $widget->icon,
            'value' => $formattedValue,  // Pass formatted or original value
            'unit' => $widget->unit,
            'widgetId' => $widgetId
        ])
        @endcomponent
    @endforeach
            </div>
        </div>
    </div>

    {{-- pop up styler --}}
    <x-widget-styler />

    <div class="fixed bottom-0 left-0 h-8 whitespace-nowrap w-full flex justify-center scrollbar-hide">
        <div class="scrollbar-hide w-fit max-w-2xl bg-black from-black bg-opacity-80 border-1 border-x-1 border-t-1 border-black p-1 rounded-lg inline-block flex overflow-scroll">
            @foreach ($defaultRights as $defaultRight)
                @php
                    $isActive = (auth()->id() == 1 || $defaultRight->view == 1) && $defaultRight->dashboard_id == request()->get('id');
                @endphp
                <form action="/home" method="GET" class="mr-2">
                    <input type="hidden" name="id" value="{{ $defaultRight->dashboard_id }}">
                    <button type="submit" 
                            class="btn btn-sm btn-primary text-gray-200 
                                   @if($isActive) text-blue-500 shadow-md @else text-gray-200 @endif">
                        Dashboard {{ $defaultRight->dashboard_id }}
                    </button>
                </form>
            @endforeach
        </div>
    </div>
    
    
    
    
</div>
@endsection