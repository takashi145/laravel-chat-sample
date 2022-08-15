<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        return view('chat.index', compact('rooms'));
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

    public function join_room()
    {
        return redirect()->route('chat.index')
        ->with('message', 'ルームに参加しました。');
    }

    public function leave_room()
    {
        return redirect()->route('chat.index')
        ->with('message', 'ルームを退会しました。');
    }

}
