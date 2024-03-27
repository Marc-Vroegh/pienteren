<?php 
  $imageURL = './images/images.png';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  @vite('resources/css/app.css')
  @vite('resources/css/dashboard.css')
  @vite('resources/js/sidebar.js')
  <script src="https://code.jquery.com/jquery-latest.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css"/>

</head>

{{-- Sidebar section --}}
@section('sidebar')
<body style="background-image: url(<?php echo $imageURL;?>);">
  <div id="sidebar" class="sidebar fixed top-0 bottom-0 lg:left-0 p-2 w-[200px] overflow-y-auto text-center bg-black opacity-90 border-solid; border-r-1 border-gray-600 lg:w-1/6">
    <div class="text-gray-100 text-xl">
        <div class="p-2.5 mt-1 flex justify-between">
            <h1 id="sidebarText" class="font-bold text-gray-200 text-[30px]">Dashboard</h1>
            <button class="text-white" id="menuCollapse" collapsed='false'>
                <i class="bi bi-list text-xl"></i>
            </button>
        </div>
        <div class="my-2 bg-gray-600 h-[1px]"></div>
    </div> 

    <!-- Menu Items -->
    <div class="mt-3">
        <!-- Home -->
        <div class="sidebar-menu-item p-2.5 flex items-center rounded-md  duration-300 cursor-pointer hover:bg-blue-600 text-white" onclick="homeReload()" >
            <i class="bi bi-house-door-fill"></i>
            <span class="sidebar-menu-item-text text-[15px] ml-4 text-gray-200 font-bold">Home</span>
        </div>

        {{-- Settings --}}
        <div class="sidebar-menu-item p-2.5 flex items-center rounded-md duration-300 cursor-pointer hover:bg-blue-600 text-white" onclick="toggleSubMenu()" id="settingsButton">
          <i class="bi bi-gear-fill"></i>
          <span class="sidebar-menu-item-text text-[15px] ml-4 text-gray-200 font-bold">Settings</span>
          <span class="text-sm ml-4">
            <i class="bi bi-chevron-down" id="chevron-icon"></i>
          </span>
        </div>
        
        <!-- Submenu -->
        <div class="hidden  text-sm mt-2 w-4/5 mx-auto text-gray-200 font-bold" id="submenu" opened="false">
          <span>
            <i class="bi bi-collection"></i>
          </span>
            <span class="text-[15px] ml-4 text-gray-200" id='submenutxt'>Show widgetbar</span>
        </div>

        <!-- Logout -->
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="sidebar-menu-item p-2.5 flex items-center rounded-md duration-300 cursor-pointer hover:bg-blue-600 text-white">
                <i class="bi bi-box-arrow-right"></i>
                <span class="sidebar-menu-item-text ml-4 text-[15px] text-gray-200 font-bold">{{ __('Logout') }}</span>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
        </a>
    </div>
</div>
@show
<div style="" class="container p-5">
    @yield('content')
</div>
</body>
</html>