document.addEventListener("DOMContentLoaded", function () {
    // Elements
    var hamburgerIcon = document.querySelector('.bi-list');
    const sidebar = document.getElementById('sidebar');
    const sidebarText = document.getElementById('sidebarText');
    const submenu = document.getElementById('submenu');
    const chevronIcon = document.getElementById('chevron-icon');
    const widgetSubtext = document.getElementById('submenutxt');
    const settingsDiv = document.getElementById('settingsButton');

    // Function to handle click on hamburger icon and toggle sidebar visibility
    function handleHamburgerClick() {
        // Function to toggle sidebar visibility and style
        function toggleSidebar() {
            let menuItems = document.querySelectorAll('.sidebar-menu-item-text');

            widget_container.classList.toggle('widget-content');
            outer_container.classList.toggle('dashboard-container');

            // Toggle small class to make sidebar smaller
            sidebar.classList.toggle('small');
            // Toggle classes to hide which shouldn't be displayed when collapsed
            sidebarText.classList.toggle('hidden');
            widgetSubtext.classList.toggle('hidden');
            settingsDiv.classList.toggle('hidden');

            // Make sure the submenu stays closed when user closes it and vice versa
            if (submenu.getAttribute('opened') == 'false') {
                submenu.classList.toggle('hidden');
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

    function toggleSubMenu() {
        submenu.classList.toggle('hidden');
        chevronIcon.classList.toggle('bi-chevron-up');
        chevronIcon.classList.toggle('bi-chevron-down');
        if (submenu.getAttribute('opened') == 'false') {
            submenu.setAttribute('opened', 'true');
        } else if (submenu.getAttribute('opened') == 'true') {
            submenu.setAttribute('opened', 'false');
        }
    }
    // Click event for submenu
    settingsDiv.addEventListener('click', toggleSubMenu);
});
