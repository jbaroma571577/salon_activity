@extends('layouts.admin')

@section('title', 'Dashboard Overview')

@section('content')

<style>
    /* Professional Layout para sa Dashboard */
    .dashboard-container {
        padding: 20px;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        margin-top: 20px;
    }

    .stat-card {
        background: white;
        padding: 25px;
        border-radius: 12px;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        border-left: 6px solid #4d4728; /* Consistent color sa imong theme */
        transition: transform 0.2s;
    }

    .stat-card:hover {
        transform: translateY(-5px);
    }

    .stat-label {
        color: #64748b;
        font-size: 0.85rem;
        text-transform: uppercase;
        font-weight: 700;
        letter-spacing: 0.05em;
        margin: 0;
    }

    .stat-value {
        font-size: 2.2rem;
        font-weight: 800;
        color: #1e293b;
        margin: 10px 0 0;
        display: block;
    }

    .welcome-msg {
        margin-bottom: 30px;
    }
</style>

<div class="dashboard-container">
    <div class="welcome-msg">
        <h2 style="margin:0; color: #1e293b;">Hi mga walang bitaw!</h2>
        <p style="color: #64748b;"></p>
    </div>

    <div class="stats-grid">
        <div class="stat-card">
            <p class="stat-label">Total Services</p>
            <span class="stat-value">{{ $services }}</span>
        </div>

        <div class="stat-card" style="border-left-color: #2563eb;">
            <p class="stat-label">Appointments</p>
            <span class="stat-value">{{ $appointments }}</span>
        </div>

        <div class="stat-card" style="border-left-color: #10b981;">
            <p class="stat-label">Total Revenue</p>
            <span class="stat-value">₱{{ number_format($payments, 2) }}</span>
        </div>
    </div>
</div>

@endsection