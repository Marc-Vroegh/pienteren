@props(['customWidgets'])
<meta name="csrf-token" content="{{ csrf_token() }}">
<div id="dashboard" class="p-3 overflow-scroll absolute scrollbar-hide h-full">
    <div class="flex flex-wrap">
       <!-- Loop through amount of divs -->
        @for ($i = 1; $i <= 14; $i++)
            <div class="box" id="div{{ $i }}" ondrop="drop(event)" ondragover="allowDrop(event)">
              {{-- WIDGET WILL GET ADDED HERE --}}
            </div>
        @endfor
    </div>
</div>

<script>
    var customWidgets = @json($customWidgets);
    customWidgets.forEach(function(widget) {
    var divId = 'div' + widget.position;
    var divElement = document.getElementById(divId);

    if (divElement) {
        var textColorClass = isDarkColor(widget.color) ? 'text-white' : 'text-black';

        var widgetHtml = `
            <div class="widget bg-white rounded shadow-md w-48 h-48 sm:w-56 sm:h-56 md:w-64 md:h-64 p-4 hover:bg-gray-100 hover:shadow-lg hover:scale-105 cursor-pointer transition duration-300 ease-in-out flex flex-col ${textColorClass}" 
                 style="background-color: ${widget.color};" 
                 draggable="true" 
                 ondragstart="drag(event)" 
                 id="widget${widget.id}">
                <h2 class="text-lg font-bold text-center" data-editable="title">${widget.name}</h2>
                <hr class="my-2 w-full">
                <div class="flex flex-1 items-center justify-center">
                    <div class="flex items-center">
                        <div class="text-6xl mr-4">
                            <i class="bi ${widget.icon}" style="font-size: 6rem;"></i>
                        </div>
                        <div class="flex flex-col items-center">
                            <p class="text-2xl">${widget.value}</p>
                            <p class="text-lg">${widget.unit}</p>
                        </div>
                    </div>
                </div>
            </div>`;
        divElement.innerHTML = widgetHtml;
    }
});

function isDarkColor(color) {
    let rgb = hexToRgb(color);
    let luminance = (0.2126 * rgb.r + 0.7152 * rgb.g + 0.0722 * rgb.b) / 255;
    return luminance <= 0.5;
}

function hexToRgb(hex) {
    let bigint = parseInt(hex.substring(1), 16);
    let r = (bigint >> 16) & 255;
    let g = (bigint >> 8) & 255;
    let b = bigint & 255;
    return { r: r, g: g, b: b };
}


    //Function that lets user drop an element
    function allowDrop(event) {
        event.preventDefault();
    }

    //Function that lets user drag an element
    function drag(event) {
        event.dataTransfer.setData("text", event.target.id);
    }

    //Function that lets user drop the widget into their new location
    function drop(event) {
        event.preventDefault();
        //get widget who is dragged
        let data = event.dataTransfer.getData("text");
        let widget = document.getElementById(data);
        
        //get target check if there is box and if there is widget in place
        if (event.target.classList.contains('box') && !event.target.querySelector('.widget')) {
            //Append it to the new box, then replace the id with new position then push this position to the database.
            event.target.appendChild(widget);
            let newPosition = event.target.id.replace('div', '');
            let widgetId = widget.id.replace('widget', '');
            updateWidgetPosition(widgetId, newPosition);
        }
    }

    //Functionality of updating (ref: customwidget controller)
    function updateWidgetPosition(widgetId, newPosition) {
        fetch('/update-widget-position', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                widget_id: widgetId,
                position: newPosition
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                console.log('Widget position updated successfully');
            } else {
                console.error('Failed to update widget position');
            }
        })
        .catch(error => console.error('Error:', error));
    }
</script>