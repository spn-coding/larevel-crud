<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Message;
use App\Models\Drugstore;
use App\Models\Appointment;

class DashboardController extends Controller
{
    public function index()
    {   
        $roomModel = new Room();
        $messageModel = new Message();
        $drugstoreModel = new Drugstore();
        $appointmentModel = new Appointment();
        $rooms = $roomModel->getAllRooms();
        $messages = $messageModel->getAllMessages();
        $drugstores = $drugstoreModel->getAllDrugstores();
        $appointments = $appointmentModel->getAllAppointments();
        return view('dashboard', compact('rooms', 'messages', 'drugstores', 'appointments'));
    }
}
