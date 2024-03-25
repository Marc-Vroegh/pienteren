<?php
  //date_default_timezone_set('Europe/Amsterdam');
  //$time2 = date('H');
  //$time3 = date('H:i');
  //$time = (int) $time2;
  
  //if ($time >= 6 && $time <= 12) {
  //  $imageURL = './images/morning.png';
    //$day = 'Goedemorgen';
  //}
 // if ($time >= 12 && $time <= 17) {
  //  $imageURL = './images/afternoon.png';
  //  $day = 'Goedemiddag';
  //}
  //if ($time >= 17 && $time <= 24) {
    //$imageURL = './images/evening.png';
   // $day = 'Goedeavond';
  //}
 // if ($time >= 24 && $time <= 6) {
  //  $imageURL = './images/night.png';
  //  $day = 'Goedenacht';
 // }
 //$imageURL = './images/evening.png';
 $imageURL = './images/images.png';
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
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
    <style>
      .clock {
       font-size: 40px;
      }

    </style>
    @section('sidebar')
    <body style="background-size: cover; background-attachment: fixed;" class="bg-gray-900">

    <div style="border-right-width: 1px;" id="sidebar" class="sidebar fixed top-0 bottom-0 lg:left-0 p-2 w-[300px] overflow-y-auto text-center bg-black opacity-90 border-solid; border-r-1 border-gray-600">
      <div class="text-gray-100 text-xl">
        <div class="p-2.5 mt-1 flex items-center">
          <h1 id="sidebarText" class="font-bold text-gray-200 text-[30px] ml-3">Dashboard</h1>
        </div>
        <div class="my-2 bg-gray-600 h-[1px]"></div>
      </div> 
      
      <div
        class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white" onclick="homeReload()">
        <i id="sidebarIcon" class="bi bi-house-door-fill"></i>
        <span id="sidebarText1" class="text-[15px] ml-4 text-gray-200 font-bold">Home</span>
      </div>
     
      <div class="my-4 bg-gray-600 h-[1px]"></div>
      <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white"
        onclick="dropdown()">

        <i id="sidebarIcon1" class="bi bi-gear-fill"></i>
        <div class="flex justify-between w-full items-center">
          <span id="sidebarText2" class="text-[15px] ml-4 text-gray-200 font-bold">Settings</span>
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
      
      {{-- Logout functionality --}}
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <div
                    class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
                    <i id="sidebarIcon2" class="bi bi-box-arrow-right"></i>
                    <span id="sidebarText3" class="ml-4 text-[15px] text-gray-200 font-bold">{{ __('Logout') }}</span>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </a>


      <button onclick="CollapseMenu()" class="fixed left-30 bottom-1 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">
      <span class="text-sm rotate-0" id="arrowSidebar2">
            <i id="arrowSidebar" class="bi bi-arrow-left"></i>
      </span>
      </button>
    </div>
@show
<div style="" class="container p-5">
    @yield('content')
</div>
</body>
</html>
<script>
  $( document ).ready(function() {
      $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          })
      $.ajax
      ({
         url: "/retrieveWidget",
         type : "GET",
         dataType: 'json',
        success: function(response)
        {
          var keyCount  = Object.keys(response).length;
          var obj = response;
          for (let i = 0; i < keyCount; i++) {
            document.getElementById(obj[i]['container']).appendChild(document.getElementById(obj[i]['widget']));
          }
        }
      });
    });
  $(document).on("click",".widget", function () {
      document.getElementById("hideatstart").style.display = 'block';
      document.getElementById("changeHeight").style.height = "calc(100% - 300px)";
  });
  $(document).on("click",".hideatstart", function () {
   document.getElementById("hideatstart").style.display = 'none';
   document.getElementById("changeHeight").style.height = "100%";
  });
</script>

<script type="text/javascript">
      function showTime(){
      var date = new Date();
      var h = date.getHours(); // 0 - 23
      var m = date.getMinutes(); // 0 - 59
      var s = date.getSeconds(); // 0 - 59
      
      h = (h < 10) ? "0" + h : h;
      m = (m < 10) ? "0" + m : m;
      s = (s < 10) ? "0" + s : s;
      
      var time = h + ":" + m + ":" + s;
      document.getElementById("MyClockDisplay").innerText = time;
      document.getElementById("MyClockDisplay").textContent = time;
      
      setTimeout(showTime, 1000);
      
  }

  showTime();
      function sleep(milliseconds) {
        var start = new Date().getTime();
        for (var i = 0; i < 1e7; i++) {
          if ((new Date().getTime() - start) > milliseconds){
            break;
          }
        }
      }

      function widgetClick() {
        document.getElementById("hideatstart2").style.display = 'flex';
        document.getElementById("hideatstart2").style.alignItems = 'center';
      }

      function allowDrop(ev) {
        ev.preventDefault();
      }

      function CollapseMenu() {
        var width = document.getElementById("changeHeight").style.marginLeft;
        if(width == "300px") {
          document.getElementById("sidebar").style.width = "55px";
          document.getElementById("sidebarIcon").style.marginLeft = "-5px";
          document.getElementById("sidebarIcon1").style.marginLeft = "-5px";
          document.getElementById("sidebarIcon2").style.marginLeft = "-5px";
          document.getElementById("sidebarText").style.display = "none";
          document.getElementById("sidebarText1").style.display = "none";
          document.getElementById("sidebarText2").style.display = "none";
          document.getElementById("sidebarText3").style.display = "none";
          document.getElementById("changeHeight").style.marginLeft = "55px";
          document.getElementById("arrowSidebar").classList.toggle("bi-arrow-right");
        }
        if(width == "55px") {
          document.getElementById("sidebar").style.width = "300px";
          document.getElementById("sidebarIcon").style.marginLeft = "0px";
          document.getElementById("sidebarIcon1").style.marginLeft = "0px";
          document.getElementById("sidebarIcon2").style.marginLeft = "0px";
          document.getElementById("sidebarText").style.display = "block";
          document.getElementById("sidebarText1").style.display = "block";
          document.getElementById("sidebarText2").style.display = "block";
          document.getElementById("sidebarText3").style.display = "block";
          document.getElementById("changeHeight").style.marginLeft = "300px";
          document.getElementById("arrowSidebar").classList.toggle("bi-arrow-right");
        }
      }

      function drag(ev) {
        ev.dataTransfer.setData("text", ev.target.id);
        //document.getElementById("hideatstart").style.display = 'block';
        //document.getElementById("changeHeight").style.height = "calc(100% - 300px)";
      }

      function drop(ev) {
        ev.preventDefault();
        var data = ev.dataTransfer.getData("text");
        var crsf = ""
        //alert(data);
        //alert(ev.target.id);
        if(!document.getElementById(ev.target.id).contains(document.getElementById('drag'))) {
          ev.target.appendChild(document.getElementById(data));

          var data2 = {
            target: ev.target.id,
            widget: data
          }

          $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          })
          $.ajax
          ({
            url: "/changeWidget",
            type : "POST",
            cache : false,
            data : data2,
            success: function(response)
            {
              //alert(response);
            }
          });

          //document.getElementById("hideatstart").style.display = 'none';
          //document.getElementById("changeHeight").style.height = "100%";
        }
      }

      function homeReload() {
        window.location.reload() 
      }


      function dropdown() {
        document.querySelector("#submenu").classList.toggle("hidden");
        document.querySelector("#arrow").classList.toggle("rotate-180");
      }
      dropdown();

      function openSidebar() {
        document.querySelector(".sidebar").classList.toggle("hidden");
      }
</script>
