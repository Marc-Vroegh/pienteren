<meta name="csrf-token" content="{{ csrf_token() }}">
  <style>
    .bg-transparent-unfocused {
      background-color: transparent;
    }
  </style>
</head>
<body class="bg-gray-100">
  <div id="pop-up-container-new" class="hidden fixed inset-0 w-full h-screen bg-black bg-opacity-40 z-50">
    <div id="pop-up-styler-new" class="hidden w-full h-screen flex items-center justify-center">
      <div class="bg-neutral-700 bg-opacity-95 rounded-2xl p-5 w-[680px] h-[620px] overflow-y-auto">
        <div class="flex justify-between items-center mb-4">
          <h1 class="text-lg text-white">Dashboard Manager</h1>
          <button class="text-gray-400 hover:text-gray-600 focus:outline-none" onclick="window.location.reload()">
            <i class="bi bi-x text-2xl"></i>
          </button>
        </div>
        <body class="bg-gray-100 flex items-center justify-center min-h-screen">
        <div class="m-5">
            <div style="background-image: url('/images/images.png'); background-size: cover; background-position: center;" class="relative p-5 rounded-lg bg-hero">
            <div class="absolute inset-0 bg-black opacity-20 rounded-lg"></div>
            <div class="relative z-10">
                <div class="mb-3">
                <h1 class="text-white font-extrabold text-lg mb-2">Add Dashboard</h1>
                </div>
                <form action="{{ route('databaseController.store') }}" method="POST">
                @csrf
                <div id="input-container" class="text-center">
                    <input id="toggle-input" type="text" class="w-full border border-gray-300 rounded-lg bg-transparent-unfocused focus:bg-gray-200 focus:outline-none px-1 py-1" name="name"/>
                </div>
                <button type="submit" class="hidden bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg focus:outline-none">
                    Add Dashboard
                </button>
                </form>
            </div>
            </div>
        </div>
        <div class="flex flex-wrap justify-stretch">
          @foreach ($perm[1] as $dashboard)
            <div class="m-5 p-3 rounded-lg bg-neutral-800 w-[280px]">
              <h3 class="text-white">{{ $dashboard->name }}</h3>
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
                              <input type="checkbox" class="w-5 h-5 ml-2" name="view" value="checked" {{ $viewChecked }}/>
                            </h3>
                            <h3 class="text-white text-sm flex items-center">
                              Edit
                              <input type="checkbox" class="w-5 h-5 ml-2" name="edit" value="checked" {{ $editChecked }}/>
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
          @endforeach
        </div>
      </div>
    </div>
  </div>
</body>
</html>
