<?php
namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $title = 'Messages';
        $messages = Message::all();
        $unreadMessages = Message::whereNull('read_at')->get();
        $unreadCount = $unreadMessages->count();
        //  dd($unreadCount);
        return view('admin.messages', compact('messages','title','unreadMessages', 'unreadCount'));
    }

    public function show($id)
    {
        $title = 'Show Message';
        $message = Message::findOrFail($id);

        if (is_null($message->read_at)) {
            $message->read_at = now();
            $message->save();
        }
        $messages = Message::all();
        $unreadMessages = Message::whereNull('read_at')->get();
        $unreadCount = $unreadMessages->count();

        return view('admin.showMessage', compact('message','title', 'messages', 'unreadMessages', 'unreadCount'));

    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        Message::create($validatedData);

        return redirect()->back()->with('success', 'Your message was sent successfully!');
    }

    public function destroy($id)
    {
        $message = Message::findOrFail($id);
        $message->delete();

        return redirect()->route('messages.index')->with('success', 'Message deleted successfully!');
    }
}