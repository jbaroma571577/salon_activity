<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Payment;
use App\Models\Service;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
       
        $servicesCount = Service::count();
        $appointmentsCount = Appointment::count();
        
        
        $totalRevenue = Payment::where('status', 'Paid')->sum('amount');

       
        return view('dashboard.dashboard', [
            'services' => $servicesCount,
            'appointments' => $appointmentsCount,
            'payments' => $totalRevenue
        ]);
    }
}