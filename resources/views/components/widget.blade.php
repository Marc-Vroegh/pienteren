<div class="widget bg-white rounded shadow-md w-48 h-36 sm:w-56 sm:h-40 md:w-64 md:h-44 p-4 hover:bg-gray-100 hover:shadow-lg hover:scale-105 cursor-pointer transition duration-300 ease-in-out">
    <h2 class="text-lg font-bold">{{ $title }}</h2>
    <hr class="my-2">
    <div class="flex items-center">
        <div class="mr-4 flex-shrink-0"> <!-- Added flex-shrink-0 to prevent icon from shrinking -->
            <i class="bi bi-cloud-fill text-blue-500 text-6xl"></i> <!-- Adjusted icon size -->
        </div>
        <div class="flex flex-col justify-center ml-4"> <!-- Adjusted margin -->
            <p class="text-xl">{{ $value }}</p> <!-- Adjusted value font size -->
            <p class="text-lg text-gray-500">{{ $unit }}</p>
        </div>
    </div>
</div>
