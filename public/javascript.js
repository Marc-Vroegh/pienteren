const widgetBar = document.getElementById("widget_container");
const dashboard = document.getElementById('dashboard');
const subMenu = document.getElementById('submenu');
const subMenuText = document.getElementById('submenutxt');
const popUpContainer = document.getElementById('pop-up-container');
const popUpContainerWidget = document.getElementById('pop-up-container-widget');
const popUpStyler = document.getElementById('pop-up-styler');
const popUpInnerContainer = document.getElementById('pop-up-inner-container');
const myClockDisplay = document.getElementById("MyClockDisplay");
const customDiv = document.getElementById('customDiv');



function toggleWidgetBar() {
    const isOpen = !widgetBar.classList.contains('hidden');
    widgetBar.classList.toggle('hidden');
    console.log(isOpen)
    if (isOpen) {
        dashboard.style.height = 'calc(100%)';
        subMenuText.innerHTML = 'Show widgetbar';
    } else { 
        dashboard.style.height = 'calc(100% - 250px)';
        subMenuText.innerHTML = 'Close widgetbar';
    }
}


function widgetbarSideMenu() {
    toggleWidgetBar();
}
widgetBar.addEventListener('click', toggleWidgetBar);












document.body.onload = function() {openHolderCustomWidget()};

function openHolderCustomWidget() {
    //if custom div contains element that starts with customDrag
    if (customDiv.contains(document.getElementById(getElementsByIdStartsWith("customDiv", "div", "customDrag")[0].id)) && (popUpContainerWidget.style.display == 'flex') == false) {
        //if true show pop up container
        popUpContainerWidget.style.display = 'flex';
    }
}

function getElementsByIdStartsWith(container, selectorTag, prefix) {
    var items = [];
    var myPosts = document.getElementById(container).getElementsByTagName(selectorTag);
    for (var i = 0; i < myPosts.length; i++) {
        //omitting undefined null check for brevity
        if (myPosts[i].id.lastIndexOf(prefix, 0) === 0) {
            items.push(myPosts[i]);
        }
    }
    return items;
}

function homeReload() {
    //reloading page
    location.replace(location.href);
}

function changeColor(value) {
    //setting cloned div background color in styler
    document.getElementById("ClonedDiv").style.backgroundColor = value;
    //calculate border color
    newvalue = LightenDarkenColor(value, -20);
    //setting cloned div border color in styler
    document.getElementById("ClonedDiv").style.borderColor = newvalue;
}

function changeText(value) {
    //changing text in cloned div in styler
    var clonedDiv = document.getElementById('ClonedDiv'); 
    // Get the element with id "ClonedDiv"
    var h1Elements = clonedDiv.getElementsByTagName('h1'); 
    // Get all <h1> elements within "ClonedDiv"
    if (h1Elements.length > 0) { 
        // Check if there are any <h1> elements found
        h1Elements[0].innerHTML = value;
    }
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


//function for sleep of the code

function sleep(milliseconds) {
    //function for sleep of the code
    var start = new Date().getTime();
    for (var i = 0; i < 1e7; i++) {
        if ((new Date().getTime() - start) > milliseconds) {
            break;
        }
    }
}

//on click of the widget show black container

function widgetClick(id) {
    //checking if the pop up container isn't set to flex, which meens its on the foreground and if there hasn't been clicked on a custom widget
    if ((popUpContainer.style.display == 'flex') == false && (popUpContainerWidget.style.display == 'flex') == false && id.includes("custom") == false) {
        //set pop-up-container to flex
        popUpContainer.style.display = 'flex';
        //set pop-up-styler to flex
        popUpStyler.style.display = 'flex';
        //getting element that needs to be cloned
        var myDiv = document.getElementById(id);
        //cloning element
        var divClone = myDiv.cloneNode(true);
        //changing name of cloned element
        divClone.id = "ClonedDiv";
        //creating element input
        var input = document.createElement("input");
        //set attribute to that element hidden
        input.setAttribute("type", "hidden");
        //set id to changeDIV
        input.setAttribute("id", "changeDIV");
        //set value to clicked id
        input.setAttribute("value", id);
        //append input child to cloned element
        divClone.appendChild(input);
        //append everything to pop up container
        popUpInnerContainer.appendChild(divClone);
    } else {
        //by pressing on widget when widget styler is active call addcustomwidget function
        addCustomWidget();
    }
}

function addCustomWidget() {
    if ((popUpContainer.style.display == 'flex') == true) {
        //retrieving all set values in widget styler
        var div = document.getElementById('changeDIV').value;
        var color = document.getElementById('color-input').value;
        var name = document.getElementById('name').value;
        var box = document.getElementById('box').value;

        //setting them for jquery
        var data2 = {
            div: div,
            color: color,
            name: name,
            box: box
        }
          
        //make sure that ajax works by setting a token
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        $.ajax({
            //go to php controller to upload this data to database
            url: "/customWidget",
            type: "POST",
            cache: false,
            data: data2,
            success: function(response) {
                //by succes response reloading page
                //alert(response);
                location.replace(location.href);
            }
        });
    } 
}

function allowDrop(ev) {
    //allow drop of the widget to the container
    ev.preventDefault();
}

function drag(ev) {
    //on drag of the widget set data
    ev.dataTransfer.setData("text", ev.target.id);
}

//When drop append child to container

function drop(ev) {
    ev.preventDefault();
    //setting data transfer
    var data = ev.dataTransfer.getData("text");
    var crsf = ""

    //if id contains drag
    if (!document.getElementById(ev.target.id).contains(document.getElementById('drag'))) {
        //retrieving target container and append widget
        ev.target.appendChild(document.getElementById(data));

        //setting up data for ajax
        var data2 = {
            target: ev.target.id,
            widget: data
        }
          
        //making sure ajax can work by setting a token
        $.ajaxSetup({
            headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        //sending data to database by going to php controller
        $.ajax({
            url: "/changeWidget",
            type: "POST",
            cache: false,
            data: data2,
            success: function(response) {
                //getting succes reponse
                //alert(response);
                //if widget dropped make sure pop up container for widget is hidden
                popUpContainerWidget.style.display = 'none';
            }
        });

        //document.getElementById("widget_container").style.display = 'none';
    }
    //if ((document.getElementById('customDiv').contains(document.getElementById(getElementsByIdStartsWith("customDiv", "div", "customDrag")[0].id))) == false) {
    //}
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
        myClockDisplay.innerText = time;
        myClockDisplay.textContent = time;

        setTimeout(showTime, 1000);
    }

    showTime();
