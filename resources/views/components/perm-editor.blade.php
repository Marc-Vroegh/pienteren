<meta name="csrf-token" content="{{ csrf_token() }}">
<div id="pop-up-container-new" class="hidden fixed inset-0 w-full h-screen bg-black bg-opacity-40 z-50">
    <div id="pop-up-styler-new" class="hidden w-full h-screen flex items-center justify-center">
        <div class="bg-neutral-700 bg-opacity-95 rounded-2xl p-5 w-[680px] h-[620px] overflow-y-auto">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-lg text-white">Permissions</h1>
                <button class="text-gray-400 hover:text-gray-600 focus:outline-none" onclick="window.location.reload()">
                    <i class="bi bi-x text-2xl"></i>
                </button>
            </div>
            @foreach ($perm as $perms)
            <form action="{{ route('widgetPermissionsController.store') }}" method="POST">
                @csrf
                <input type="hidden" id="fname" value="<?php echo $perms['email'] ?>" name="email"><br>
                {{$perms['email']}}
                @php
                $fields = ['temp', 'lvh', 'ppm', 'db', 'lumen'];
                $fields2 = ['temperatuur', 'luchtvochtigheid', 'Koolstofdioxide', 'Geluidsterkte', 'Lichtsterkte'];
                @endphp
                @for ($i = 0; $i < count($fields); $i++)
                <button type="submit" name="{{$fields[$i]}}" value="{{ $perms[$fields[$i]] == 1 ? 0 : 1 }}" class="btn btn-primary">@if ($perms[$fields[$i]] == 1) Verwijder {{$fields2[$i]}} @else Voeg {{$fields2[$i]}} Toe @endif</button>
                @endfor    
            </form>
            @endforeach
        </div>
    </div>
</div>