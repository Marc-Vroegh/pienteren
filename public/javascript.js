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
const editModeText = document.getElementById('editmodetxt');

function toggleWidgetBar() {
    const isOpen = !widgetBar.classList.contains('hidden');
    widgetBar.classList.toggle('hidden');
    if (isOpen) {
        dashboard.style.height = 'calc(100%)';
        subMenuText.innerHTML = 'Show widgetbar';
    } else { 
        dashboard.style.height = 'calc(100% - 250px)';
        subMenuText.innerHTML = 'Close widgetbar';
    }
}


function toggleEditmode() {
    const widgetEditButtons = document.querySelectorAll('.widget-menu');
    widgetEditButtons.forEach(button => {
        button.classList.toggle('hidden');
    });
    const isOpen = !widgetEditButtons[0].classList.contains('hidden'); 
    if (isOpen) {
        editModeText.innerHTML = 'Disable Edit Mode'; 
    } else {
        editModeText.innerHTML = 'Switch to Edit Mode'; 
    }
}


function widgetbarSideMenu() {
    toggleWidgetBar();
}

function editmodeSideMenu(){
    toggleEditmode();
}

function ShowPermissionsUser(){
    document.getElementById("pop-up-container-new").style.display = 'block';
    document.getElementById("pop-up-styler-new").style.display = 'flex';
}


function homeReload() {
    //reloading page
    location.replace(location.href);
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