
    $(document).ready(function() {
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
                    document.getElementById(obj[i]['container']).appendChild(document
                        .getElementById(obj[i]['widget']));
                }
            }
        });
    });
    $(document).on("click", ".widget", function() {
        document.getElementById("hideatstart").style.display = 'flex';
        document.getElementById("hideatstart").style.alignItems = 'center';
    });
    $(document).on("click", ".hideatstart", function() {
        document.getElementById("hideatstart").style.display = 'none';
    });

  $(document).on("click",".widget", function () {
      document.getElementById("hideatstart").style.display = 'block';
      document.getElementById("changeHeight").style.height = "calc(100% - 300px)";
  });
  $(document).on("click",".hideatstart", function () {
   document.getElementById("hideatstart").style.display = 'none';
   document.getElementById("changeHeight").style.height = "100%";
  });

  //  function showTime() {
        //var date = new Date();
      //  var h = date.getHours(); // 0 - 23
        //var m = date.getMinutes(); // 0 - 59
       // var s = date.getSeconds(); // 0 - 59

       // h = (h < 10) ? "0" + h : h;
       // m = (m < 10) ? "0" + m : m;
       // s = (s < 10) ? "0" + s : s;

       // var time = h + ":" + m + ":" + s;
       // document.getElementById("MyClockDisplay").innerText = 9;
       // document.getElementById("MyClockDisplay").textContent = 9;
//
       // setTimeout(showTime, 1000);

  //  }

   // showTime();
   function widgetbarClick() {
    document.getElementById("hideatstart").style.display = 'block';
    document.getElementById("changeHeight").style.height = "calc(100% - 300px)";
    }

    function sleep(milliseconds) {
        var start = new Date().getTime();
        for (var i = 0; i < 1e7; i++) {
            if ((new Date().getTime() - start) > milliseconds) {
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
        if (!document.getElementById(ev.target.id).contains(document.getElementById('drag'))) {
            ev.target.appendChild(document.getElementById(data));

            var data2 = {
                target: ev.target.id,
                widget: data
            }

          //document.getElementById("hideatstart").style.display = 'none';
          //document.getElementById("changeHeight").style.height = "100%";
          
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            $.ajax({
                url: "/changeWidget",
                type: "POST",
                cache: false,
                data: data2,
                success: function(response) {
                    //alert(response);
                }
            });

            document.getElementById("hideatstart").style.display = 'none';
        }
    }

    function homeReload() {
        window.location.reload()
    }


    function dropdown() {
        document.querySelector("#submenu").classList.toggle("hidden");
        document.querySelector("#arrow").classList.toggle("rotate-180");
      }

    function openSidebar() {
        document.querySelector(".sidebar").classList.toggle("hidden");
    }