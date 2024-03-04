<?php
  date_default_timezone_set('Europe/Amsterdam');
  $time2 = date('H');
  $time3 = date('H:i');
  $time = (int) $time2;
  
  if ($time >= 6 && $time <= 12) {
    $imageURL = './images/morning.png';
    $day = 'Goedemorgen';
  }
  if ($time >= 12 && $time <= 17) {
    $imageURL = './images/afternoon.png';
    $day = 'Goedemiddag';
  }
  if ($time >= 17 && $time <= 24) {
    $imageURL = './images/evening.png';
    $day = 'Goedeavond';
  }
  if ($time >= 24 && $time <= 6) {
    $imageURL = './images/night.png';
    $day = 'Goedenacht';
  }
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @vite('resources/css/app.css')
        <script src="https://code.jquery.com/jquery-latest.min.js"></script>
        <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css"
        />
        <style>
        body { background-image: url(<?php echo $imageURL;?>); }
        </style>
    </head>
    @section('sidebar')
    <body class="bg-gray-900">

    <div style="border-right-width: 1px;" class="sidebar fixed top-0 bottom-0 lg:left-0 p-2 w-[300px] overflow-y-auto text-center bg-black opacity-85 border-solid; border-r-1 border-gray-600">
      <div class="text-gray-100 text-xl">
        <div class="p-2.5 mt-1 flex items-center">
          <h1 class="font-bold text-gray-200 text-[30px] ml-3">Dashboard</h1>
        </div>
        <div class="my-2 bg-gray-600 h-[1px]"></div>
      </div> 

      <div
        class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
        <i class="bi bi-house-door-fill"></i>
        <span class="text-[15px] ml-4 text-gray-200 font-bold">Home</span>
      </div>
     
      <div class="my-4 bg-gray-600 h-[1px]"></div>
      <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white"
        onclick="dropdown()">

        <i class="bi bi-gear-fill"></i>
        <div class="flex justify-between w-full items-center">
          <span class="text-[15px] ml-4 text-gray-200 font-bold">Settings</span>
          <span class="text-sm rotate-180" id="arrow">
            <i class="bi bi-chevron-down"></i>
          </span>
        </div>
      </div>

      <div class="text-left text-sm mt-2 w-4/5 mx-auto text-gray-200 font-bold" id="submenu">
        <h1 id="widget" class="cursor-pointer p-2 hover:bg-blue-600 rounded-md mt-1 widget">
          Show widgetbar
        </h1>
      </div>
      <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
        <i class="bi bi-box-arrow-in-right"></i>
        <span class="text-[15px] ml-4 text-gray-200 font-bold">Logout</span>
      </div>
    </div>
@show
<div style="" class="container p-5">
    @yield('content')
</div>
</body>
</html>
<script>
  $(document).on("click",".widget", function () {
   document.getElementById("hideatstart").style.display = 'block';
  });
</script>

<script type="text/javascript">
      function sleep(milliseconds) {
        var start = new Date().getTime();
        for (var i = 0; i < 1e7; i++) {
          if ((new Date().getTime() - start) > milliseconds){
            break;
          }
        }
      }

      function allowDrop(ev) {
        ev.preventDefault();
      }

      function drag(ev) {
        ev.dataTransfer.setData("text", ev.target.id);
        document.getElementById("hideatstart").style.display = 'block';
      }

      function drop(ev) {
        ev.preventDefault();
        var data = ev.dataTransfer.getData("text");
        //alert(data);
        //alert(ev.target.id);
        if(!document.getElementById(ev.target.id).contains(document.getElementById('drag'))) {
          ev.target.appendChild(document.getElementById(data));
          document.getElementById("hideatstart").style.display = 'none';
        }
      }

      function hide() {
      }


      function dropdown() {
        document.querySelector("#submenu").classList.toggle("hidden");
        document.querySelector("#arrow").classList.toggle("rotate-0");
      }
      dropdown();

      function openSidebar() {
        document.querySelector(".sidebar").classList.toggle("hidden");
      }
</script>
