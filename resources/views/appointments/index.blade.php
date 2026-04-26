@extends('layouts.admin')

@section('title', 'Appointments')

@section('content')

<style>
    .data-card {
        background: white;
        padding: 2rem;
        border-radius: 12px;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    }

    .custom-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        margin-top: 1.5rem;
    }

    .custom-table thead th {
        background-color: #f9fafb;
        padding: 12px 20px;
        color: #6b7280;
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        font-weight: 700;
        border-bottom: 2px solid #f3f4f6;
        text-align: left;
    }

    .custom-table tbody td {
        padding: 16px 20px; /* Solution sa dikit-dikit */
        vertical-align: middle;
        border-bottom: 1px solid #f3f4f6;
        color: #374151;
        font-size: 0.9rem;
    }

    .custom-table tbody tr:hover {
        background-color: #fbfcfd;
    }

    .btn-primary {
        background: #1f2937;
        color: white;
        padding: 10px 20px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 600;
        display: inline-block;
        font-size: 0.875rem;
    }

    .date-badge {
        background: #eff6ff;
        color: #1e40af;
        padding: 4px 10px;
        border-radius: 6px;
        font-weight: 500;
        font-size: 0.85rem;
    }

    .time-badge {
        background: #fdf2f8;
        color: #9d174d;
        padding: 4px 10px;
        border-radius: 6px;
        font-weight: 500;
        font-size: 0.85rem;
    }
</style>

<div class="data-card">
    <div style="display:flex; justify-content:space-between; align-items:center;">
        <div>
            <h2 style="margin:0; font-size: 1.5rem; color: #4d4728;">Appointments</h2>
            <p style="margin:5px 0 0; color: #6b7280; font-size: 0.9rem;">Schedule and monitor client bookings.</p>
        </div>
        <a href="{{ route('appointments.create') }}" class="btn-primary">
            + Create Appointment
        </a>
    </div>

    @if(session('success'))
        <div style="margin: 20px 0; background:#d1fae5; color:#065f46; padding:12px; border-radius:8px; border-left: 5px solid #10b981;">
            {{ session('success') }}
        </div>
    @endif

    <div style="overflow-x: auto;">
        <table class="custom-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Customer</th>
                    <th>Service</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                @forelse($appointments as $appointment)
                <tr>
                    <td style="color: #9ca3af; font-size: 0.8rem;">#{{ $appointment->id }}</td>
                    <td style="font-weight: 600; color: #111827;">{{ $appointment->customer_name }}</td>
                    <td>
                        <span style="color: #4b5563;">
                            {{ optional($appointment->service)->service_name ?? 'No Service' }}
                        </span>
                    </td>
                    <td>
                        <span class="date-badge">{{ $appointment->appointment_date }}</span>
                    </td>
                    <td>
                        <span class="time-badge">{{ $appointment->appointment_time }}</span>
                    </td>
                    <td style="font-weight: 700; color: #111827;">
                        ₱{{ number_format($appointment->price, 2) }}
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" style="text-align:center; padding: 40px; color: #9ca3af;">
                        No appointments found today.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection