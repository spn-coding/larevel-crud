<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Room extends Model
{
    use HasFactory;

    /**
     * Get all rooms
     */
    public function getAllRooms()
    {
        return DB::table('rooms')
        ->where('del_flag', 0)
        ->orderBy('id', 'desc')
        ->paginate(9);
    }

    /**
     * Add a new room
     */
    public function addRoom(Request $request)
    {
        DB::table('rooms')->insert([
            'room_name' => $request->room_name,
            'room_status' => $request->room_status,
            'number' => $request->number,
            'room_price' => $request->room_price,
        ]);
    }


    /**
     * Update a room
     */
    public function updateRoom(Request $request, string $id)
    {
        DB::table('rooms')->where('id', $id)->update([
            'room_name' => $request->room_name,
            'room_status' => $request->room_status,
            'number' => $request->number,
            'room_price' => $request->room_price,
        ]);
    }

    /**
     * Delete a room
     */
    public function deleteRoom(string $id)
    {
        DB::table('rooms')->where('id', $id)->update([
            'del_flag' => 1,
        ]);
    }

    /**
     * Get a room by id
     */
    public function getRoomById(string $id)
    {
        return DB::table('rooms')
        ->where('id', $id)
        ->first();
    }
}