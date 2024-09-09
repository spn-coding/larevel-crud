<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Appointment extends Model
{
    use HasFactory;

    /**
     * Get all appointments
     * 
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllAppointments()
    {
        return DB::table('appointments')
        ->where('del_flag', 0)
        ->orderBy('id', 'desc')
        ->paginate(9);
    }

    /**
     * Get appointment by id
     * 
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAppointmentById(int $id)
    {
        return DB::table('appointments')
        ->where('id', $id)
        ->first();
    }

    /**
     * Add a new appointment
     * 
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function addAppointment(Request $request)
    {
        DB::table('appointments')->insert([
            'doctor_name' => $request->doctor_name,
            'room_no' => $request->room_no,
            'date' => $request->date,
            'time' => $request->time
        ]);
    }

    /**
     * Update an appointment
     * 
     * @param \Illuminate\Http\Request $request
     * @param string $id
     * @return void
     */
    public function updateAppointment(Request $request, string $id)
    {
        DB::table('appointments')->where('id', $id)->update([
            'doctor_name' => $request->doctor_name,
            'room_no' => $request->room_no,
            'date' => $request->date,
            'time' => $request->time
        ]);
    }


    /**
     * Delete an appointment
     * 
     * @param string $id
     * @return void
     */
    public function deleteAppointment(string $id)
    {
        DB::table('appointments')->where('id', $id)->update([
            'del_flag' => 1
        ]);
    }


}
