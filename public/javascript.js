const widgetBar = document.getElementById("widget_container");
const  dashboard = document.getElementById('dashboard');
const subMenu = document.getElementById('submenu');
const subMenuText = document.getElementById('submenutxt');


//WHen the user clicks on ''show widgetbar" show it.
subMenu.addEventListener('click', function() {
    widgetBar.style.display = 'block';
    dashboard.style.height = "calc(100% - 250px)";
    //Set the state to true, when the user opens the the widgetbar..
    widgetBar.setAttribute('opened', 'true');
    //Set the text to hide, when its opened.
    subMenuText.innerHTML = 'Close widgetbar';
    
});

//When the user clicks on the sidebar it will closae the
widgetBar.addEventListener('click', function() {
        widgetBar.style.display = 'none';
        dashboard.style.height = 'calc(100%)';
        //When the user closes the sidebar, it sets the state to false.
        widgetBar.setAttribute('opened', 'false')
        //Set the text to hide, when its opened.
        subMenuText.innerHTML = 'Show widgetbar';
});





//function for sleep of the code

function sleep(milliseconds) {
    var start = new Date().getTime();
    for (var i = 0; i < 1e7; i++) {
        if ((new Date().getTime() - start) > milliseconds) {
            break;
        }
    }
}

//on click of the widget show black container

function widgetClick(id) {
    alert(id);
    document.getElementById("pop-up-container").style.display = 'flex';
    var myDiv = document.getElementById(id);
    var divClone = myDiv.cloneNode(true);
    document.getElementById("pop-up-inner-container").appendChild(divClone);
}

//allow drop of the widget to the container

function allowDrop(ev) {
    ev.preventDefault();
}

//on drag of the widget set data

function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
    //document.getElementById("widget_container").style.display = 'block';
    //document.getElementById("dashboard").style.height = "calc(100% - 300px)";
}

//When drop append child to container

function drop(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    var crsf = ""
    //alert(data);
    //alert(ev.target.id);
    if (!document.getElementById(ev.target.id).contains(document.getElementById('drag'))) {
        ev.target.appendChild(document.getElementById(data));

        var data2 = {
            target: ev.target.id,
            widget: data
        }
            
        $.ajaxSetup({
            headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        $.ajax({
            url: "/changeWidget",
            type: "POST",
            cache: false,
            data: data2,
            success: function(response) {
                //alert(response);
            }
        });

        //document.getElementById("widget_container").style.display = 'none';
    }
}

    //show time for the widget clock

    function showTime() {
        var date = new Date();
        var h = date.getHours(); // 0 - 23
        var m = date.getMinutes(); // 0 - 59
        var s = date.getSeconds(); // 0 - 59

        h = (h < 10) ? "0" + h : h;
        m = (m < 10) ? "0" + m : m;
        s = (s < 10) ? "0" + s : s;

        var time = h + ":" + m + ":" + s;
        document.getElementById("MyClockDisplay").innerText = time;
        document.getElementById("MyClockDisplay").textContent = time;

        setTimeout(showTime, 1000);
    }

    showTime();
