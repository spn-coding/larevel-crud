<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Mail;
use App\Mail\CreateUnreadMessageEmail;  

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messageModel = new Message();
        $messages = $messageModel->getAllMessages();
        return view('Message.message', ['messages' => $messages]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Message.add_message');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'message' => 'required|string|max:255',
            'time' => 'required',
            'type' => 'required'
        ]);

        $message = [
            'name' => 'Tun Tun',
            'message' => 'Message created successfully',
            'company' => 'Asia Taw Win'
        ];

        $messageModel = new Message();
        $messageModel->addMessage($request);
        Mail::to('sawphyonaing.dev@gmail.com')->send(new CreateUnreadMessageEmail($message));
        return redirect("/message");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $messageModel = new Message();
        $message = $messageModel->getMessageById($id);
        // dd($message);
        return view('Message.edit_message', ['message' => $message]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'message' => 'required|string|max:255',
            'time' => 'required',
            'type' => 'required'
        ]);

        $messageModel = new Message();
        $messageModel->updateMessage($request, $id);
        return redirect("/message");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $messageModel = new Message();
        $messageModel->deleteMessage($id);
        return redirect("/message");
    }
}
