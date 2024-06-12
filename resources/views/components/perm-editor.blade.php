<body class="bg-gray-100">
  <div id="pop-up-container-new" class="hidden fixed inset-0 w-full h-screen bg-black bg-opacity-40 z-50">
    <div id="pop-up-styler-new" class="hidden w-full h-screen flex items-center justify-center">
      <div class="scrollbar-hide bg-neutral-700 bg-opacity-95 rounded-2xl p-5 w-[680px] h-[620px] overflow-y-auto">
        <div class="flex justify-between items-center mb-4">
          <h1 class="text-lg text-white">Dashboard Manager</h1>
          <button class="text-gray-400 hover:text-gray-600 focus:outline-none" onclick="window.location.reload()">
            <i class="bi bi-x text-2xl"></i>
          </button>
        </div>
        <div class="m-3">
          <div style="background-image: url('/images/images.png'); background-size: cover; background-position: center;" class="relative p-5 rounded-lg bg-hero">
            <div class="absolute inset-0 bg-black opacity-20 rounded-lg"></div>
            <div class="relative z-10">
              <div class="mb-3">
                <h1 class="text-white font-extrabold text-lg mb-2">Add Dashboard</h1>
              </div>
              <form action="{{ route('databaseController.store') }}" method="POST" class="input-button">
                @csrf
                <div id="input-container" class="text-center">
                  <input id="toggle-input" type="text" class="w-full bg-opacity-90 bg-white rounded-lg focus:outline-none px-1 py-1" placeholder="Enter in a name for the new dashboard..." name="name" maxlength="20" oninput="input()"/>
                </div>
                <button type="submit" id="perm-button" class="hidden bg-blue-500 hover:bg-blue-700 mr-0.5 text-xs p-1.5 text-white font-bold rounded-lg focus:outline-none">
                  Add
                </button>
              </form>
            </div>
          </div>
        </div>
        <div class="flex flex-wrap justify-stretch">
          @foreach ($perm[1] as $dashboard)
            <div class="relative viewport-custom m-3 p-3 rounded-lg bg-neutral-800 w-[296px]">
              <div id="overlay-transparent-{{ $dashboard->id }}" class="absolute bottom-0 m-3 ml-5 mr-5 rounded-t-lg left-0 right-0 h-[32px] bg-opacity-30 bg-black"></div>
              <h3 class="text-white">{{ $dashboard->name }}</h3>
              <div class="scrollbar-hide overflow-scroll h-full max-h-48" onscroll="handleScroll({{ $dashboard->id }})">
                @foreach ($perm[2] as $permission)
                  @if ($permission->dashboard_id == $dashboard->id)
                    @foreach ($perm[0] as $userDetails)
                      @if ($userDetails->id == $permission->user_id && $userDetails->id !== 1)
                        <div class="bg-neutral-700 m-2 p-2 rounded-lg">
                          <h3 class="text-white">{{ $userDetails->email }}</h3>
                          <form action="{{ route('widgetPermissionsController.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $permission->user_id }}" />
                            <input type="hidden" name="dashboard_id" value="{{ $dashboard->id }}" />

                            @php
                              $viewChecked = $permission->view == 1 ? 'checked' : '';
                              $editChecked = $permission->edit == 1 ? 'checked' : '';
                            @endphp

                            <div class="flex items-center space-x-3">
                              <h3 class="text-white text-sm flex items-center">
                                View
                                <input type="checkbox" class="w-6 h-5 ml-2" name="view" value="checked" {{ $viewChecked }}/>
                              </h3>
                              <h3 class="text-white text-sm flex items-center">
                                Edit
                                <input type="checkbox" class="w-6 h-5 ml-2" name="edit" value="checked" {{ $editChecked }}/>
                              </h3>
                              <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white text-sm font-bold py-1 px-4 rounded-lg focus:outline-none">
                                Change
                              </button>
                            </div>
                          </form>
                        </div>
                      @endif
                    @endforeach
                  @endif
                @endforeach
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>

  <script>
    function handleScroll(dashboardId) {
      var overlay = document.getElementById('overlay-transparent-' + dashboardId);
      var scrollableDiv = overlay.parentElement.querySelector('.overflow-scroll');
      if (scrollableDiv.scrollTop === 0) {
        overlay.style.display = 'block';
      } else {
        overlay.style.display = 'none';
      }
    }
  </script>
</body>