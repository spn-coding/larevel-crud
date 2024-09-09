<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Message extends Model
{
    use HasFactory;

    /**
     * Get all messages
     */
    public function getAllMessages()
    {
        return DB::table('messages')
        ->where('del_flag', 0)
        ->orderBy('id', 'desc')
        ->paginate(7);
    }

    /**
     * Get a message by id
     */
    public function getMessageById(string $id)
    {
        return DB::table('messages')->where('id', $id)->where('del_flag', 0)->first();
    }

    /**
     * Add a message
     */
    public function addMessage(Request $request)
    {
        DB::table('messages')->insert([
            'message' => $request->message,
            'time' => $request->time,
            'type' => $request->type,
            'del_flag' => 0,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }

    /**
     * Update a message
     */
    public function updateMessage(Request $request, string $id)
    {
        DB::table('messages')->where('id', $id)->update([
            'message' => $request->message,
            'time' => $request->time,
            'type' => $request->type,
        ]); 
    }


    /**
     * Delete a message
     */
    public function deleteMessage(string $id)
    {
        DB::table('messages')->where('id', $id)->update([
            'del_flag' => 1
        ]);
    }
}
