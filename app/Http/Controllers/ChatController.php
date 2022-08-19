<?php

namespace App\Http\Controllers;

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

    public static function show(Room $room)
    {
        $room_id = $room->id;
        return view('chat.chat', compact('room_id'));
    }

    public function create()
    {
        return view('chat.create');
    }

    public function store(Request $request)
    {
        Room::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'description' => $request->description
        ]);
        return redirect()->route('chat.index')
        ->with('message', 'ルームを作成しました。');
    }

    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->route('chat.index');
    }

    public static function pushMessage(Request $request, Room $room)
    {
        $message = Message::create([
            'user_id' => Auth::id(),
            'room_id' => $room->id,
            'message' => $request->text
        ])->load('user');

        event(new PushMessage($message));
    }

    public static function getMessages(Room $room)
    {
        $messages = $room->messages()->with('user')->orderBy('id', 'desc')->get();
        return $messages;
    }

}
