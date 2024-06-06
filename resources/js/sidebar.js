document.addEventListener("DOMContentLoaded", function () {
    // Elements
    const hamburgerIcon = document.querySelector('.bi-list');
    const sidebar = document.getElementById('sidebar');
    const sidebarText = document.getElementById('sidebarText');
    const widgetbarButton = document.getElementById('widgetbar_button');
    const editmodeButton = document.getElementById('editmode_button');
    const dashboardButton = document.getElementById('dashboard_button');
    const chevronIcon = document.getElementById('chevron-icon');
    const widgetSubtext = document.getElementById('widgetbar_buttontxt');
    const settingsDiv = document.getElementById('settingsButton');

    // Function to handle click on hamburger icon and toggle sidebar visibility
    function handleHamburgerClick() {
        //A function to toggle multiple visibility on elements.
        function toggleVisibility(...elements) {
            //Loop through all the elements
            elements.forEach(element => {
                if (element) {
                    //If it's element toggle
                    element.classList.toggle('hidden');
                }
            });
        }
        // Function to toggle sidebar visibility and style
        function toggleSidebar() {
            let menuItems = document.querySelectorAll('.sidebar-menu-item-text');
            console.log(menuItems);
            widget_container.classList.toggle('widget-content');
            outer_container.classList.toggle('dashboard-container');

            // Toggle small class to make sidebar smaller
            sidebar.classList.toggle('small');
            // Toggle classes to hide which shouldn't be displayed when collapsed
            toggleVisibility(sidebarText, widgetSubtext, settingsDiv)

            // Make sure the widgetbarButton stays closed when user closes it and vice versa
            if (widgetbarButton.getAttribute('opened') == 'false') {
                widgetbarButton.classList.toggle('hidden');
            }
            // Toggle hidden class for menu item texts
            menuItems.forEach(function (menuItem) {
                menuItem.classList.toggle('hidden');
            });
        }

        toggleSidebar(); // Toggle sidebar visibility and style when hamburger icon is clicked
    }

    if (hamburgerIcon) {
        hamburgerIcon.addEventListener('click', handleHamburgerClick);
    }

    function toggleWidgetBarButton() {
        widgetbarButton.classList.toggle('hidden');
        chevronIcon.classList.toggle('bi-chevron-up');
        chevronIcon.classList.toggle('bi-chevron-down');
        if (widgetbarButton.getAttribute('opened') == 'false') {
            widgetbarButton.setAttribute('opened', 'true');
        } else if (widgetbarButton.getAttribute('opened') == 'true') {
            widgetbarButton.setAttribute('opened', 'false');
        }
    }
    // Click event for widgetBarButton
    settingsDiv.addEventListener('click', toggleWidgetBarButton);

    function toggleEditModeButton() {
        editmodeButton.classList.toggle('hidden');
        if (editmodeButton.getAttribute('opened') == 'false') {
            editmodeButton.setAttribute('opened', 'true');
        } else if (editmodeButton.getAttribute('opened') == 'true') {
            editmodeButton.setAttribute('opened', 'false');
        }
    }
    // Click event for editmodeButton
    settingsDiv.addEventListener('click', toggleEditModeButton);

    function toggleDashboardButton() {
        dashboardButton.classList.toggle('hidden');
        if (dashboardButton.getAttribute('opened') == 'false') {
            dashboardButton.setAttribute('opened', 'true');
        } else if (dashboardButton.getAttribute('opened') == 'true') {
            dashboardButton.setAttribute('opened', 'false');
        }
    }
    // Click event for editmodeButton
    settingsDiv.addEventListener('click', toggleDashboardButton);
});
