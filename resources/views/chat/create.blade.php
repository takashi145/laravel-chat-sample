<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('chat.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="name">チャットルーム名</label>
                            <input type="text" name="name" id="name" class="">
                        </div>
                        <div>
                            <label for="description">ルームの詳細</label>
                            <textarea name="description" id="description" class=""></textarea>
                        </div>
                        <div>
                            <button type="submit" class="text-white bg-indigo-400 hover:bg-indigo-500 py-2 px-3 rounded">作成</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
