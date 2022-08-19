<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div x-data="chat" x-init="getMessages()" @postMessage.window="pushMessage($event.detail)" class="border">
                        <div class="my-3 text-center px-12">
                            <textarea x-model="text" class="w-full lg:w-1/2"></textarea><br>
                            <button x-on:click="add()" class="push_message text-white bg-indigo-400 hover:bg-indigo-500 py-2 px-3 rounded">送信</button>
                        </div>
                        <ul>
                            <template x-for="message in messages">
                                <div class="border-b-2 m-2">
                                    <span x-show="auth_id == message.user.id" class="p-1 text-sm text-green-400">
                                        自分
                                    </span>
                                    ユーザー：<span x-text="message.user.name"></span>
                                    <div x-text="message.message" style="white-space: pre-wrap;" class="my-1 mx-8 bg-gray-100 rounded p-3"></div>
                                </div>
                            </template>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        
        const chat = () => {
            return {
                messages: [],
                text: '',
                room_id: '{{ $room_id }}',
                auth_id: '{{ Auth::id() }}',
                
                add() {
                    axios.post('/chat/'+this.room_id+'/push_message', {'text': this.text})
                        .then((res) => {
                            this.text = "";
                        })
                },

                getMessages() {
                    axios.get('/chat/'+this.room_id+'/get_messages')
                        .then((res) => {
                            this.messages = res.data;
                        })
                },

                pushMessage(message) {
                    this.messages.unshift(message);
                }
            }
        }
    </script>
</x-app-layout>