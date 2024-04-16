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

        //var keyCount = Object.keys(obj['return'][0]).length;
        var obj = response;
        var keyCount = Object.keys(obj['return']).length;
        //alert(keyCount2)
        if(keyCount > 1) {
            for (let i = 0; i < Object.keys(obj['return']).length; i++) {
                //alert(obj['return'][i]['widget']);
                if(obj['return'][i]['widget'].includes("custom") == true) {
                   //alert('no');
                } else {
                    //alert('hello');
                    document.getElementById(obj['return'][i]['container']).appendChild(document.getElementById(obj['return'][i]['widget']));
                }
            } 
            for (let g = 0; g < 70; g++) {
                //alert(obj['return2'][g]['color']);
                //alert(obj['return2'][g]['toCloneDiv']);

                var ClonedDiv = "customDrag" + g;

                var container = "div" + (g + 5);

                //alert(obj['return2'][g]['toCloneDiv']);


                // document.getElementById("black-container").style.display = 'flex';
                //document.getElementById("black-container").style.alignItems = 'center';
                var myDiv = document.getElementById(obj['return2'][g]['toCloneDiv']);
                var divClone = myDiv.cloneNode(true);

                //if(obj['return2'][g]['clonedDiv'] == "empty") {
                   // divClone.id = ClonedDiv;
                //} else {
                 //   divClone.id = obj['return2'][g]['clonedDiv']
               // }
               divClone.id = ClonedDiv;

               var keyCount2 = Object.keys(obj['return']).length;

               
                for (let q = 0; q < keyCount2; q++) {
                    //alert('hello');
                    //alert('divclone id' + divClone.id)
                    //alert(obj['return'][q]['widget']);
                    if(divClone.id == obj['return'][q]['widget']) {
                        //alert('setted');
                        document.getElementById(obj['return'][q]['container']).appendChild(divClone);
                    }
                } 


                document.getElementById(divClone.id).style.backgroundColor = obj['return2'][g]['color'];
                //newColor = LightenDarkenColor(obj['return2'][g]['color'], -20);
                document.getElementById(divClone.id).style.borderColor = obj['return2'][g]['color'];

                $('#' + divClone.id).find('h1')[0].innerHTML = obj['return2'][g]['name'];



                //append to form element that you want .
                //divClone.appendChild(input);
                //divClone.addEventListener('drag', drag);
                //var path = divClone.H1[0].value;
                //alert(document.getElementById("changeH1")[0].value);
                //var x = document.querySelector("#ClonedDiv").querySelector("#changeH1");
                //alert(path);



                //document.getElementById(obj['return2'][i]['container']).appendChild(document.getElementById(obj['return2'][i]['widget']));
            } 
        } else {
            for (let i = 1; i < 80; i++) {
                if(i == 1) {
                    alert('Hello, welcome to the dashboard.');
                    alert('To remove this message, please first remove all the widgets from the WidgetBar, this can be found under the Settings.');
                    alert('Afterwards the WidgetBar can be closed by clicking on it.');
                    alert('You can arrange the widgets how you want.');
                    alert('Clicking on widget causes a Widget Styler to appear, you can use this to style your own Widgets or to add more of the same.');
                    alert('Try it.');
                    document.getElementById("widget_container").style.display = 'block';
                    document.getElementById("dashboard").style.height = "calc(100% - 250px)";
                }     
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
   document.getElementById("dashboard").style.height = "calc(100%)";
});



   