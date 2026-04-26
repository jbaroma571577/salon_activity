<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Service;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::with('service')->get();
        return view('appointments.index', compact('appointments'));
    }

    public function create()
    {
        $services = Service::all();
        return view('appointments.create', compact('services'));
    }

  public function store(Request $request)
{
    $request->validate([
        'service_id' => 'required',
        'customer_name' => 'required',
        'contact' => 'required',
        'appointment_date' => 'required',
        'appointment_time' => 'required',
        'price' => 'required'
    ]);

    Appointment::create([
        'service_id' => $request->service_id,
        'customer_name' => $request->customer_name,
        'contact' => $request->contact,
        'appointment_date' => $request->appointment_date,
        'appointment_time' => $request->appointment_time,
        'price' => $request->price
    ]);

    return redirect()->route('appointments.index')
        ->with('success', 'Appointment created successfully');
}
}