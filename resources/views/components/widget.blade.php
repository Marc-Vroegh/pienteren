    <div class="widget bg-white rounded shadow-md w-48 h-48 sm:w-56 sm:h-56 md:w-64 md:h-64 p-4 hover:bg-gray-100 hover:shadow-lg hover:scale-105 cursor-pointer transition duration-300 ease-in-out flex flex-col" onclick="handleWidgetClick(this)" data-widget-id="{{ $widgetId }}">
        <h2 class="text-lg font-bold text-left" data-editable="title">{{ $title }}</h2>
        <div class="flex flex-1 items-center justify-center">
            <div class="flex items-center">
                <div class="text-6xl mr-4">
                    <i class="bi {{ $icon }}" style="font-size: 6rem;"></i> 
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
    //Tempo storage of cloned widget
    let defaultWidget;
    
    function handleWidgetClick(widget) {
        defaultWidget = widget.cloneNode(true);

        //Set the value of widgetId in invisibile input
        const widgetId = widget.getAttribute('data-widget-id');
        const widgetNumber = widgetId.split('_')[1];
        console.log(widgetNumber);
        document.getElementById('default_widget_id').value = widgetNumber;

        //Show widgetstyler
        popUpContainer.classList.remove('hidden');
        popUpStyler.classList.toggle('hidden');

        const form = document.getElementById('form-click');

        defaultWidget.addEventListener('click', function () {
            form.submit();
        });

        //Remove the onclick and classes from the cloned widget
        defaultWidget.removeAttribute('onclick');
        defaultWidget.classList.remove('hover:bg-gray-100', 'hover:shadow-lg', 'hover:scale-105', 'cursor-pointer', 'transition', 'duration-300', 'ease-in-out');

        //Call function to make it show 
        showWidgetInPopUp(defaultWidget);

        document.getElementById('name').addEventListener('input', function(event) {
        const name = event.target.value;
        updateWidgetName(defaultWidget, name);
    });

        document.getElementById('color-input').addEventListener('input', function(event) {
        const color = event.target.value;
        updateWidgetColor(defaultWidget, color);
        });
    }

    //adding the widget parameter to the container
    function showWidgetInPopUp(widget) {
        popUpInnerContainer.innerHTML = '';
        popUpInnerContainer.appendChild(widget);
    }

    //Update background color
    function updateWidgetColor(widget, color) {
        const backgroundElement = widget;
        backgroundElement.style.backgroundColor = color;
    }

    //Update the name
    function updateWidgetName(widget, name) {
        const titleElement = widget.querySelector('[data-editable="title"]');
        titleElement.textContent = name;
    }



</script>
