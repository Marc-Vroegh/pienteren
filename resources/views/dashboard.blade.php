@extends('layouts.app')

@section('sidebar')
    @parent
@endsection

@section('content')
  
<div class="dashboard-container scrollbar-hide overflow-scroll">

    <!-- Dashboard -->
    <x-widget-display :customWidgets="$customWidgets" />

    <!-- Widgetbar -->
    <div id="widget_container" class="widget_container fixed bottom-0 bg-gray-300 bg-opacity-75 py-4 shadow-md overflow-hidden hidden">
        <div class="px-4 overflow-y-auto max-h-64"> 
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
</div>
@endsection