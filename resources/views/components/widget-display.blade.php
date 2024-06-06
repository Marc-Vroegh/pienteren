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

<div id="element" data-edit="{{ Session::get('edit') }}" data-user="{{ auth()->id() }}" >
    <!-- Inhoud van het element -->
</div>


<script>
    var customWidgets = @json($customWidgets);
    var value = 0;



    customWidgets[0].forEach(function(widget) {
            var divId = 'div' + widget.position;
            var divElement = document.getElementById(divId);
            if (divElement) {
                var textColorClass = isDarkColor(widget.color) ? 'text-white' : 'text-black';

                    //
                    //
                    //this might need to change at a later date, with php database relations, or when the dashboard functionality is getting implemented
                    //
                    //

                customWidgets[2].forEach(function(defaultWidget) {
                    if(customWidgets[1] !== null) {
                       var valueType = [customWidgets[1].temp, customWidgets[1].lvh, customWidgets[1].ppm, customWidgets[1].db, customWidgets[1].lumen];
                    } else {
                        valueType = 1;
                    }
                    const unitType = ["graden", "procent", "ppm", "dB", "lumen"];
                    
                    if(widget.default_widget_id == defaultWidget.id) {
                        for (let i = 0; i < unitType.length; i++) {
                            if(defaultWidget.unit == unitType[i]) {
                                if (valueType == 1) {
                                        value = "Offline";
                                        unit = "Of geen data beschikbaar";

                                    } else {
                                        value = valueType[i];
                                        unit = unitType[i];
                                    }
                            }
                        }    
                    }
                });

                var element = document.getElementById('element');
                var editValue = element.getAttribute('data-edit');
                var userValue = element.getAttribute('data-user');
                
                // Haal de waarde van data-edit-attribuut op

                var draggableValue = (editValue == 1 || userValue == 1) ? 'true' : 'false';

                var widgetHtml = `
                    <div class="widget bg-white rounded shadow-md w-48 h-48 sm:w-56 sm:h-56 md:w-64 md:h-64 p-4 hover:bg-gray-100 flex flex-col ${textColorClass}" 
                        style="background-color: ${widget.color}; position: relative;" 
                        draggable="${draggableValue}" 
                        ondragstart="drag(event)" 
                        id="widget${widget.id}">
                        <h2 class="text-lg font-bold text-left" data-editable="title">${widget.name}</h2>
                        <div class="flex flex-1 items-center justify-center">
                            <div class="flex items-center">
                                <div class="text-6xl mr-4">
                                    <i class="bi ${widget.icon}" style="font-size: 6rem;"></i>
                                </div>
                                <div class="flex flex-col items-center">
                                    <p class="text-2xl">${value}</p> 
                                    <p class="text-lg">${unit}</p>
                                </div>
                            </div>
                        </div>
                        <div id="edit-widget" class="widget-menu absolute bottom-0 left-0 right-0 p-1 bg-gray-800 text-white flex justify-around items-center hidden">
                            <i class="bi bi-pencil-square cursor-pointer text-sm" onclick="editWidget(${widget.id})"></i>
                            <i class="bi bi-trash cursor-pointer text-sm" onclick="deleteWidget(${widget.id})"></i>
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
    //update position
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

function editWidget(widgetId) {
    // Add your edit functionality here
    console.log('Edit widget', widgetId);
}

function deleteWidget(widgetId) {
    if (confirm('Are you sure you want to remove this widget?')) {
        fetch('/delete-widget', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                widget_id: widgetId
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                var widgetElement = document.getElementById('widget' + widgetId);
                if (widgetElement) {
                    widgetElement.parentElement.removeChild(widgetElement);
                    console.log('Widget deleted successfully');
                }
            } else {
                console.error('Failed to delete widget');
            }
        })
        .catch(error => console.error('Error:', error));
    } else {
        console.log('Widget deletion canceled');
    }
}
</script>