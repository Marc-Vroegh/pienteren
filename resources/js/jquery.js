//retrieving widget data from database and appending child based on the data to the widget container
 
//setting up ajax with a token so it works
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
        //getting response from php controller retrieve widget
        var obj = response;
        //counting the length from data received
        var keyCount = Object.keys(obj['return']).length;
        //getting custom widget key
        var iCustom = 0;
        if(keyCount > 1) {
            for (let i = 0; i < keyCount; i++) {
                //checking whatever the return returns a custom widget
                if(obj['return'][i]['widget'].includes("custom") == true) {
                    var ClonedDiv = "customDrag" + iCustom;
                    //adding customDrag id to the custom widgets
                    var container = "div" + (iCustom + 5);
                    //container where the widget goes to if not set
                    var myDiv = document.getElementById(obj['return2'][iCustom]['toCloneDiv']);
                    //getting element by id that needs to be cloned
                    var divClone = myDiv.cloneNode(true);
                    //cloning the div
                    divClone.id = ClonedDiv;
                    //naming the div id from the cloned div CustomDrag(0)
                    for (let q = 0; q < keyCount; q++) {
                        if(divClone.id == obj['return'][q]['widget']) {
                            //if customDrag0 is the same as Custom drag 0 from dataWidget append child on same key container
                            //alert('setted');
                            document.getElementById(obj['return'][q]['container']).appendChild(divClone);
                        }
                    }
                    //changing background color from new element from color in database 
                    document.getElementById(divClone.id).style.backgroundColor = obj['return2'][iCustom]['color'];
                    //newColor = LightenDarkenColor(obj['return2'][g]['color'], -20);
                    //changing border color from new element from color in database 
                    document.getElementById(divClone.id).style.borderColor = obj['return2'][iCustom]['color'];
                    //changing h1 name from new element from h1 name in database 
                    $('#' + divClone.id).find('h1')[0].innerHTML = obj['return2'][iCustom]['name'];
                    iCustom++;
                } else {
                    //else append child widget to right container (hardwired widgets)
                    document.getElementById(obj['return'][i]['container']).appendChild(document.getElementById(obj['return'][i]['widget']));
                }
            } 
        } else {
            // if no elements in database
            //for new users an instruction
            alert('Hello, welcome to the dashboard.');
            alert('To remove this message, please first remove all the widgets from the WidgetBar, this can be found under the Settings.');
            alert('Afterwards the WidgetBar can be closed by clicking on it.');
            alert('You can arrange the widgets how you want.');
            alert('Clicking on widget causes a Widget Styler to appear, you can use this to style your own Widgets or to add more of the same.');
            alert('Try it.');
            //show widgetbar for new users
            document.getElementById("widget_container").style.display = 'block';
            document.getElementById("dashboard").style.height = "calc(100% - 250px)";
            for (let i = 1; i < 60; i++) {
                //adding widgets to widgetbar    
                var container = "div" + (i + 99);
                var widget = "drag" + i;
                document.getElementById(container).appendChild(document.getElementById(widget));
            }
        }
    }
});

$(document).on("click",".widget_container", function () {
    //on click widgetbar hide widgetbar
   document.getElementById("widget_container").style.display = 'none';
   //changing height again to match the current widgetbar state
   document.getElementById("dashboard").style.height = "calc(100%)";
});



   