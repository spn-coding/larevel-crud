<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use Illuminate\Support\Facades\Mail;
use App\Mail\CreateAppointmentEmail;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appointmentModel = new Appointment();
        $appointments = $appointmentModel->getAllAppointments();
        return view('Appointment.appointment', ['appointments' => $appointments]);
        // echo "index";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Appointment.add_appointment');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'doctor_name' => 'required|string|max:255',
            'room_no' => 'required|string|max:10',
            'date' => 'required|date',
            'time' => 'required',
        ]);

        $message = [
            'name' => 'Mg Mg',
            'message' => 'Appointment created successfully',
            'company' => 'Asia Taw Win'
        ];

        $appointmentModel = new Appointment();
        $appointmentModel->addAppointment($request);
        Mail::to('sawphyonaing.dev@gmail.com')->send(new CreateAppointmentEmail($message));
        return redirect("/appointment");
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
        $appointmentModel = new Appointment();
        $appointment = $appointmentModel->getAppointmentById($id);
        return view('Appointment.edit_appointment', ['appointment' => $appointment]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'doctor_name' => 'required|string|max:255',
            'room_no' => 'required|string|max:10',
            'date' => 'required|date',
            'time' => 'required',
        ]);

        $appointmentModel = new Appointment();
        $appointmentModel->updateAppointment($request, $id);
        return redirect("/appointment");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $appointmentModel = new Appointment();
        $appointmentModel->deleteAppointment($id);
        return redirect("/appointment");
    }
}
