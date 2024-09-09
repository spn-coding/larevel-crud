<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use Illuminate\Support\Facades\Mail;
use App\Mail\CreateRoomEmail;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roomModel = new Room();
        $rooms = $roomModel->getAllRooms();
        return view('Room.room', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Room.add_room');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'room_name' => 'required|string|max:255',
            'room_status' => 'required',
            'number' => 'required|integer|max:100',
            'room_price' => 'required|integer|max:10000000'
        ]);

        $roomModel = new Room();
        $roomModel->addRoom($request);
        $message = [
            'name' => 'Saw Phyo Naing',
            'message' => 'Room created successfully',
            'company' => 'Asia Taw Win'
        ];
        Mail::to('sawphyonaing.dev@gmail.com')->send(new CreateRoomEmail($message));
        return redirect('/room');
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
        $roomModel = new Room();
        $room = $roomModel->getRoomById($id);
        // dd($room);
        return view('Room.edit_room', ['room' => $room]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'room_name' => 'required|string|max:255',
            'room_status' => 'required',
            'number' => 'required|integer|max:100',
            'room_price' => 'required|integer|max:10000000'
        ]);

        $roomModel = new Room();
        $roomModel->updateRoom($request, $id);
        return redirect('/room');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $roomModel = new Room();
        $roomModel->deleteRoom($id);
        return redirect('/room');
    }

}
