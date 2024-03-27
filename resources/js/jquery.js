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
        for (let i = 0; i < keyCount; i++) {
            document.getElementById(obj[i]['container']).appendChild(document.getElementById(obj[i]['widget']));
        }
    }
});

//on click widgetbar hide widgetbar

$(document).on("click",".hideatstart", function () {
   document.getElementById("hideatstart").style.display = 'none';
   document.getElementById("changeHeight").style.height = "100%";
});



   