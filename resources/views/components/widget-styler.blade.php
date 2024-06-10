<div id="pop-up-container" class="hidden fixed inset-0 w-full h-screen bg-black bg-opacity-40 z-50">
    <div id="pop-up-styler" class="hidden w-full h-screen flex items-center justify-center">
        <div class="bg-neutral-700 bg-opacity-95 rounded-2xl p-5 w-[600px] h-[550px] overflow-y-auto">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-lg text-white">Widget Styler</h1>
                <button class="text-gray-400 hover:text-gray-600 focus:outline-none" onclick="window.location.reload()">
                    <i class="bi bi-x text-2xl"></i>
                </button>
            </div>
            <div style="margin-top: -30px;" class="text-black">
                <div id="pop-up-inner-container" class="z-10 flex flex-col justify-center items-center h-[340px] overflow-auto">
                    <!-- Your dynamically added content will go here -->
                </div>
            </div>
            <div class="ml-2 mr-2">
                <form id="form-click" action="{{ route('customWidgets.store') }}" method="POST">
                    @csrf
                    <input type="hidden" id="default_widget_id" name="default_widget_id">
                    <div id="pop-up-inner-container-change" class="bg-neutral-900 p-5 rounded-xl mt-4">
                        <div class="grid grid-cols-3 gap-3">
                            <div>
                                <label for="box" class="block mb-2 text-sm font-medium text-white">Kies bron</label>
                                <select id="box" name="box" class="form-select bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="Select">Select</option>
                                    @for ($i = 1; $i <= 5; $i++)
                                        <option value="{{ $i }}">{{ "Box" . $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div>
                                <label for="color-input" class="block mb-2 text-sm font-medium text-white">Kies kleur</label>
                                <input type="color" id="color-input" name="color" class="h-10 w-full bg-white cursor-pointer rounded-lg dark:bg-gray-700 dark:border-gray-700">
                            </div>
                            <div>
                                <label for="name" class="block mb-2 text-sm font-medium text-white">Kies naam</label>
                                <input type="text" id="name" name="name" class="form-input h-10 w-full bg-white cursor-pointer rounded-lg dark:bg-gray-700 dark:border-gray-700" maxlength="30" placeholder="Choose name (required)" required>
                            </div>
                            <div class="flex justify-center items-center h-fit">
                                <button style="margin-top: 45px;" type="submit" class="z-20 bg-black bg-opacity-20 hover:bg-opacity-50 text-white font-bold py-1 px-2 rounded-sm focus:outline-none absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                                    Create Widget
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>