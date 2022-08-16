<x-app-layout>
    <div class="py-8">
        <div class="mx-auto px-3">
            <div class="overflow-hidden sm:rounded-lg">
                <div class="p-6">
                    <section class="text-gray-600 body-font">
                        <div class="container px-3 mx-auto">
                            <div class="flex flex-wrap -m-4">
                                @foreach($rooms as $room)
                                <div class="p-4 md:w-1/2 lg:w-1/3">
                                    <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden shadow-lg">
                                        <img class="lg:h-48 md:h-36 w-full object-cover object-center" src="https://dummyimage.com/720x400" alt="blog">
                                        <div class="p-6">
                                            <h1 class="title-font text-lg font-medium text-gray-900 mb-3">{{ $room->name }}</h1>
                                            <div class="flex items-center flex-wrap ">
                                                <span class="text-gray-400 mr-3 inline-flex items-center lg:ml-auto md:ml-0 ml-auto leading-none text-sm pr-3 py-1 border-r-2 border-gray-200">
                                                    
                                                </span>
                                                <span class="text-gray-400 inline-flex items-center leading-none text-sm">
                                                    
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
