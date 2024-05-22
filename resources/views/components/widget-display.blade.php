@props(['customWidgets'])

<div id="dashboard" class="p-3 overflow-scroll absolute scrollbar-hide h-full">
    <div class="flex flex-wrap">
        <!-- Loop through custom widgets -->
        @foreach ($customWidgets as $customWidget)
            <div class="box" id="div{{ $customWidget->position }}" ondrop="drop(event)" ondragover="allowDrop(event)">
                <div class="widget bg-white rounded shadow-md w-48 h-48 sm:w-56 sm:h-56 md:w-64 md:h-64 p-4 hover:bg-gray-100 hover:shadow-lg hover:scale-105 cursor-pointer transition duration-300 ease-in-out flex flex-col"  
                     style="background-color: {{ $customWidget->color }};" 
                     draggable="true" 
                     ondragstart="drag(event)" 
                     id="widget{{ $customWidget->id }}">
                    <h2 class="text-lg font-bold text-center " data-editable="title">{{ $customWidget->name }}</h2>
                    <hr class="my-2 w-full">
                    <div class="flex flex-1 items-center justify-center">
                        <div class="flex items-center">
                            <div class="text-6xl mr-4">
                                <i class="bi {{ $customWidget->icon }}" style="font-size: 6rem;"></i>
                            </div>
                            <div class="flex flex-col items-center">
                                <p class="text-2xl">{{ $customWidget->value }}</p>
                                <p class="text-lg text-gray-500">{{ $customWidget->unit }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

{{-- JS --}}
