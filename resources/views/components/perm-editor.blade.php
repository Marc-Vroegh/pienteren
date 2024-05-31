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
            <?PHP //print_r(json_encode($perm)); 
            foreach ($perm as $perms) { ?>
            <form action="{{ route('widgetPermissionsController.store') }}" method="POST">
                @csrf
                <input type="hidden" id="fname" value="<?php echo $perms['email'] ?>" name="email"><br>

                <?php echo $perms['email'] ?><?php if ($perms['temp'] == 1) { $value = 0; } else { $value = 1; } ?>
                
                <?php if ($perms['temp'] == 1) { $value = 0; } else { $value = 1; } ?>
                <button type="submit" name="temp" value="{{ $value }}" class="btn btn-primary"><?php if ($perms['temp'] == 1) { ?>Verwijder Temperatuur<?php } else { ?> Voeg Temperatuur Toe <?php } ?></button>

                <?php if ($perms['lvh'] == 1) { $value = 0; } else { $value = 1; } ?>
                <button type="submit" name="lvh" value="{{ $value }}" class="btn btn-primary"><?php if ($perms['lvh'] == 1) { ?>Verwijder Luchtvochtigheid<?php } else { ?> Voeg Luchtvochtigheid Toe <?php } ?></button>

                <?php if ($perms['ppm'] == 1) { $value = 0; } else { $value = 1; } ?>
                <button type="submit" name="ppm" value="{{ $value }}" class="btn btn-primary"><?php if ($perms['ppm'] == 1) { ?>Verwijder Koolstofdioxide<?php } else { ?> Voeg Koolstofdioxide Toe <?php } ?></button>

                <?php if ($perms['db'] == 1) { $value = 0; } else { $value = 1; } ?>
                <button type="submit" name="db" value="{{ $value }}" class="btn btn-primary"><?php if ($perms['db'] == 1) { ?>Verwijder Geluidsterkte<?php } else { ?> Voeg Geluidsterkte Toe <?php } ?></button>

                <?php if ($perms['lumen'] == 1) { $value = 0; } else { $value = 1; } ?>
                <button type="submit" name="lumen" value="{{ $value }}" class="btn btn-primary"><?php if ($perms['lumen'] == 1) { ?>Verwijder Lichtsterkte<?php } else { ?> Voeg Lichtsterkte Toe <?php } ?></button>
                
            </form>
            <?php } ?>
        </div>
    </div>
</div>