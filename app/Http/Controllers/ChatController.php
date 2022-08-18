<?php

namespace App\Http\Controllers;

use App\Events\ChatPusher;
use App\Events\PushMessage;
use App\Models\Message;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        return view('chat.index', compact('rooms'));
    }

    public static function join(Room $room)
    {
        $room_id = $room->id;
        $messages = $room->messages;
        return view('chat.chat', compact('room_id', 'messages'));
    }

    public function create()
    {
        return view('chat.create');
    }

    public function store(Request $request)
    {
        Room::create($request);
        return redirect()->route('chat.index')
        ->with('message', 'ルームを作成しました。');
    }

    public function update(Request $request, Room $room)
    {
        return redirect()->route('chat.index')
        ->with('message', 'ルームを更新しました。');
    }

    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->route('chat.index')
        ->with('alert', 'ルームを削除しました。');
    }

    public static function push_message(Request $request, Room $room)
    {
        $message = Message::create([
            'user_id' => Auth::id(),
            'room_id' => $room->id,
            'message' => $request->text
        ]);

        event(new PushMessage($message));
    }

    public static function getMessages()
    {
        $messages = Message::with('user')->get();
        return $messages;
    }

}
