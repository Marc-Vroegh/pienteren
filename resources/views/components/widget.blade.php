<div class="widget bg-white rounded shadow-md w-48 h-48 sm:w-56 sm:h-56 md:w-64 md:h-64 p-4 hover:bg-gray-100 hover:shadow-lg hover:scale-105 cursor-pointer transition duration-300 ease-in-out flex flex-col" onclick="handleWidgetClick(this)" data-widget-id="{{ $widgetId }}">
    <h2 class="text-lg font-bold text-center">{{ $title }}</h2>
    <hr class="my-2 w-full">
    <div class="flex flex-1 items-center justify-center">
        <div class="flex items-center">
            <div class="text-6xl mr-4"> <!-- Increase the icon size to text-6xl -->
                <i class="bi {{ $icon }}" style="font-size: 6rem;"></i> <!-- Ensure the icon size -->
            </div>
            <div class="flex flex-col items-center">
                <p class="text-2xl">{{ $value }}</p>
                <p class="text-lg text-gray-500">{{ $unit }}</p>
            </div>
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
