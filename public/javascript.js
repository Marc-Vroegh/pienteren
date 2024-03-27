//onclick widgetbar button show widgetbar

function widgetbarClick() {
    document.getElementById("hideatstart").style.display = 'block';
    document.getElementById("changeHeight").style.height = "calc(100% - 300px)";
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

function widgetClick() {
    document.getElementById("hideatstart2").style.display = 'flex';
    document.getElementById("hideatstart2").style.alignItems = 'center';
}

//allow drop of the widget to the container

function allowDrop(ev) {
    ev.preventDefault();
}

//on drag of the widget set data

function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
    //document.getElementById("hideatstart").style.display = 'block';
    //document.getElementById("changeHeight").style.height = "calc(100% - 300px)";
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

        document.getElementById("hideatstart").style.display = 'none';
    }
}

    ///need to fix this function

    //show time for the widget clock

    //  function showTime() {
            //var date = new Date();
        //  var h = date.getHours(); // 0 - 23
            //var m = date.getMinutes(); // 0 - 59
        // var s = date.getSeconds(); // 0 - 59

        // h = (h < 10) ? "0" + h : h;
        // m = (m < 10) ? "0" + m : m;
        // s = (s < 10) ? "0" + s : s;

        // var time = h + ":" + m + ":" + s;
        // document.getElementById("MyClockDisplay").innerText = 9;
        // document.getElementById("MyClockDisplay").textContent = 9;
    //
        // setTimeout(showTime, 1000);

    //  }

    // showTime();
