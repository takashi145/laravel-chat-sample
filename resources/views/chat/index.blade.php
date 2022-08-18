<x-app-layout>
    <div class="py-8">
        <div class="mx-auto px-3">
            <div class="overflow-hidden sm:rounded-lg">
                <div class="p-6">
                    <section class="text-gray-600 body-font">
                        <div class="container px-3 mx-auto">
                            <div class="flex flex-wrap -m-4">
                                @foreach($rooms as $room)
                                <a href="{{ route('chat.show', ['room' => $room]) }}" class="p-4 md:w-1/2 lg:w-1/3">
                                    <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden shadow-lg">
                                        <div class="p-6">
                                            <h1 class="title-font text-2xl font-medium text-gray-900 mb-3">{{ $room->name }}</h1>
                                            <div class="px-3">
                                                <span class="text-gray-800 inline-flex items-center leading-none text-sm">
                                                    {{ $room->description }}
                                                </span>
                                            </div>
                                            @if(Auth::id() === $room->user_id)
                                            <form action="{{ route('chat.delete', ['room' => $room]) }}" method="post" class="text-right mt-3">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="text-red-400 hover:text-red-500">削除</button>
                                            </form>
                                            @endif
                                        </div>
                                    </div>
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <div class="fixed bottom-0 right-0 m-8">
        <a href="{{ route('chat.create') }}" class="text-white bg-indigo-400 hover:bg-indigo-500 p-3 rounded">チャットルームの作成</a>
    </div>
</x-app-layout>
