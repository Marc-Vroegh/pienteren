//retrieving widget data from database and appending child based on the data to the widget container

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
})
$.ajax({
    url: "/retrieveWidget",
    type: "GET",
    dataType: 'json',
    success: function(response) {
        var keyCount = Object.keys(response).length;
        var obj = response;
        if(keyCount > 0) {
            for (let i = 0; i < keyCount; i++) {
                document.getElementById(obj[i]['container']).appendChild(document.getElementById(obj[i]['widget']));
            } 
        } else {
            for (let i = 1; i < 80; i++) {
                //alert('Hello, welcome to the dashboard, you can arrange the items how you want, try it');        
                var container = "div" + (i + 99);
                var widget = "drag" + i;
                document.getElementById(container).appendChild(document.getElementById(widget));
            }
        }
    }
});

//on click widgetbar hide widgetbar

$(document).on("click",".widget_container", function () {
   document.getElementById("widget_container").style.display = 'none';
   document.getElementById("dashboard").style.height = "calc(100% - 50px)";
});



   