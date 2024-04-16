//

function changeColor(value) {
    document.getElementById("ClonedDiv").style.backgroundColor = value;
    newvalue = LightenDarkenColor(value, -20);
    document.getElementById("ClonedDiv").style.borderColor = newvalue;
}

function changeText(value) {
    $('#ClonedDiv').find('h1')[0].innerHTML = value;
}

function LightenDarkenColor(col,amt) {
    var usePound = false;
    if ( col[0] == "#" ) {
        col = col.slice(1);
        usePound = true;
    }

    var num = parseInt(col,16);

    var r = (num >> 16) + amt;

    if ( r > 255 ) r = 255;
    else if  (r < 0) r = 0;

    var b = ((num >> 8) & 0x00FF) + amt;

    if ( b > 255 ) b = 255;
    else if  (b < 0) b = 0;
    
    var g = (num & 0x0000FF) + amt;

    if ( g > 255 ) g = 255;
    else if  ( g < 0 ) g = 0;

    return (usePound?"#":"") + (g | (b << 8) | (r << 16)).toString(16);
}

//onclick widgetbar button show widgetbar

function widgetbarClick() {
    document.getElementById("widget_container").style.display = 'block';
    document.getElementById("dashboard").style.height = "calc(100% - 250px)";
}

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
   // document.getElementById("black-container").style.display = 'flex';
    //document.getElementById("black-container").style.alignItems = 'center';
    document.getElementById("pop-up-container").style.display = 'flex';
    document.body.style.backgroundColor = "gray";
    var myDiv = document.getElementById(id);
    var divClone = myDiv.cloneNode(true);
    divClone.id = "ClonedDiv";

    var input = document.createElement("input");

    input.setAttribute("type", "hidden");

    input.setAttribute("id", "changeDIV");

    input.setAttribute("value", id);

    //append to form element that you want .
    divClone.appendChild(input);
    //divClone.addEventListener('drag', drag);
    //var path = divClone.H1[0].value;
    //alert(document.getElementById("changeH1")[0].value);
    //var x = document.querySelector("#ClonedDiv").querySelector("#changeH1");
    //alert(path);
    document.getElementById("pop-up-inner-container").appendChild(divClone);
    //alert(divClone.find('h1')[0].innerHTML);
}

//allow drop of the widget to the container

function allowDrop(ev) {
    ev.preventDefault();
}

//on drag of the widget set data

function drag(ev) {
    if ((document.getElementById("pop-up-container").style.display == 'flex') == true) {
    var div = document.getElementById('changeDIV').value;
    var color = document.getElementById('color-input').value;
    var name = document.getElementById('name').value;
    var box = document.getElementById('box').value;

    //alert(div);
    //alert(color);
   // alert(name);
    //alert(box);

    var data2 = {
        div: div,
        color: color,
        name: name,
        box: box
    }
        
    $.ajaxSetup({
        headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
    $.ajax({
        url: "/customWidget",
        type: "POST",
        cache: false,
        data: data2,
        success: function(response) {
            //alert(response);
            location.replace(location.href);
        }
    });
    }

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
