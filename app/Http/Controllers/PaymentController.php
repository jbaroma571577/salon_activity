<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Appointment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    
    public function index()
    {
        $payments = Payment::with('appointment.service')->latest()->get();

        return view('payments.index', compact('payments'));
    }

    public function create()
    {
        $appointments = Appointment::with('service')->get();

        return view('payments.create', compact('appointments'));
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'appointment_id' => 'required|exists:appointments,id',
            'amount' => 'required|numeric|min:1',
            'status' => 'required|string',
        ]);

        Payment::create([
            'appointment_id' => $request->appointment_id,
            'amount' => $request->amount,
            'status' => $request->status,
        ]);

        return redirect()->route('payments.index')
            ->with('success', 'Payment recorded successfully');
    }
}
