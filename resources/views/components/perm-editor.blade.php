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
                <?php if ($perms['temp'] == 1) { ?>Verwijder Temp<?php } else { ?> Voeg Temp Toe <?php } ?>
                <input type="submit" name="temp" value="<?php echo $value; ?>" />

                <?php if ($perms['lvh'] == 1) { $value = 0; } else { $value = 1; } ?>
                <?php if ($perms['lvh'] == 1) { ?>Verwijder Luchtvochtigheid<?php } else { ?> Voeg Luchtvochtigheid Toe <?php } ?>
                <input type="submit" name="lvh" value="<?php echo $value; ?>" />

                <?php if ($perms['ppm'] == 1) { $value = 0; } else { $value = 1; } ?>
                <?php if ($perms['ppm'] == 1) { ?>Verwijder Koolstofdioxide<?php } else { ?> Voeg Koolstofdioxide Toe <?php } ?>
                <input type="submit" name="ppm" value="<?php echo $value; ?>" />

                <?php if ($perms['db'] == 1) { $value = 0; } else { $value = 1; } ?>
                <?php if ($perms['db'] == 1) { ?>Verwijder Decibel<?php } else { ?> Voeg Decibel Toe <?php } ?>
                <input type="submit" name="db" value="<?php echo $value; ?>" />

                <?php if ($perms['lumen'] == 1) { $value = 0; } else { $value = 1; } ?>
                <?php if ($perms['lumen'] == 1) { ?>Verwijder Lumen<?php } else { ?> Voeg Lumen Toe <?php } ?>
                <input type="submit" name="lumen" value="<?php echo $value; ?>" />
                
            </form>
            <?php } ?>
        </div>
    </div>
</div>