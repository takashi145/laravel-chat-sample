<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div x-data="chat" x-init="getMessages()" @postMessage.window="getMessages()" class="border">
                        <ul>
                            <template x-for="message in messages">
                                <div class="border-b-2 m-2">
                                    ユーザー：<span x-text="message.user.name"></span>
                                    <div x-text="message.message" class="my-1 mx-8 bg-gray-100 rounded p-3"></div>
                                </div>
                            </template>
                        </ul>
                        
                        <div class="my-3 text-center">
                            <input type="text" x-model="text" class="border">
                            <button x-on:click="postMessage()" class="push_message text-white bg-indigo-400 hover:bg-indigo-500 py-2 px-3 rounded">送信</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const room_id = '{{ $room_id }}';

        const chat = () => {
            return {
                messages: [],
                text: '',

                postMessage() {
                    axios.post('/chat/'+room_id+'/push', {'text': this.text})
                        .then((res) => {
                            this.text = "";
                        })
                },

                getMessages() {
                    axios.get('/chat/'+room_id+'/get_messages')
                        .then((res) => {
                            this.messages = res.data;
                        })
                },
            }
        }
    </script>
</x-app-layout>