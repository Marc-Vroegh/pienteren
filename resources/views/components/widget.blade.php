<div class="widget bg-white rounded shadow-md w-48 h-36 sm:w-56 sm:h-40 md:w-64 md:h-44 p-4 hover:bg-gray-100 hover:shadow-lg hover:scale-105 cursor-pointer transition duration-300 ease-in-out" onclick="handleWidgetClick(this)" data-widget-id="{{ $widgetId }}">
    <h2 class="text-lg font-bold">{{ $title }}</h2>
    <hr class="my-2">
    <div class="flex items-center">
        <div class="mr-4 flex-shrink-0"> 
            <img src="{{ $icon }}" alt="{{ $title }}" class="w-12 h-12"> 
        </div>
        <div class="flex flex-col justify-center ml-4"> 
            <p class="text-xl">{{ $value }}</p> 
            <p class="text-lg text-gray-500">{{ $unit }}</p>
        </div>
    </div>
</div>

<script>
    //Variables needed
    function handleWidgetClick(widget) {
        // Retrieve the widget ID from the data attribute
        var widgetId = widget.getAttribute('data-widget-id');
        console.log("Widget clicked: " + widgetId);
        popUpContainer.classList.toggle('hidden');
        popUpStyler.classList.toggle('hidden');

    
    }
</script>
