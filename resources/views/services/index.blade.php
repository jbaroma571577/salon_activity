@extends('layouts.admin')

@section('title', 'Services')

@section('content')

<style>
    /* Custom Styling para sa Professional Look */
    .data-card {
        background: white;
        padding: 2rem;
        border-radius: 12px;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
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
        padding: 16px 20px; /* Mao ni ang nag-ayo sa dikit-dikit */
        vertical-align: middle;
        border-bottom: 1px solid #f3f4f6;
        color: #374151;
        font-size: 0.95rem;
    }

    .custom-table tbody tr:hover {
        background-color: #fbfcfd;
        transition: background-color 0.2s;
    }

    .btn-add {
        background: #1f2937;
        color: white;
        padding: 10px 20px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 600;
        transition: 0.3s;
    }

    .btn-add:hover {
        background: #374151;
    }

    .action-container {
        display: flex;
        gap: 12px; /* Spacing sa tunga sa Edit ug Delete */
        align-items: center;
    }

    .badge-price {
        font-weight: 700;
        color: #111827;
    }

    .badge-duration {
        background: #f3f4f6;
        padding: 4px 10px;
        border-radius: 20px;
        font-size: 0.85rem;
        color: #4b5563;
    }
</style>

<div class="data-card">

    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:10px;">
        <div>
            <h2 style="margin:0; font-size: 1.5rem; color: #111827;">Services</h2>
            <p style="margin:5px 0 0; color: #6b7280; font-size: 0.9rem;">Manage your salon service offerings.</p>
        </div>

        <a href="{{ route('services.create') }}" class="btn-add">
            + Add New Service
        </a>
    </div>

    @if(session('success'))
        <div style="background:#d1fae5; color:#065f46; padding:15px; border-radius:8px; margin: 20px 0; border-left: 5px solid #10b981;">
            <strong>Success!</strong> {{ session('success') }}
        </div>
    @endif

    <table class="custom-table">
        <thead>
            <tr>
                <th>Service Name</th>
                <th>Price</th>
                <th>Duration</th>
                <th style="text-align: center;">Actions</th>
            </tr>
        </thead>

        <tbody>
            @forelse($services as $service)
                <tr>
                    <td style="font-weight: 500; text-transform: capitalize;">
                        {{ $service->service_name }}
                    </td>
                    <td class="badge-price">
                        ₱{{ number_format($service->price, 2) }}
                    </td>
                    <td>
                        <span class="badge-duration">{{ $service->duration }}</span>
                    </td>

                    <td>
                        <div class="action-container" style="justify-content: center;">
                            <a href="{{ route('services.edit', $service->id) }}"
                               style="background:#2563eb; color:white; padding:8px 16px; border-radius:6px; text-decoration:none; font-size:13px; font-weight: 600;">
                                Edit
                            </a>

                            <form action="{{ route('services.destroy', $service->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Sigurado ka i-delete ni nga service?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    style="background:#dc2626; color:white; border:none; padding:8px 16px; border-radius:6px; cursor:pointer; font-size:13px; font-weight: 600;">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" style="text-align:center; padding: 40px; color: #9ca3af;">
                        <div style="font-size: 3rem; margin-bottom: 10px;">📂</div>
                        No services found in the database.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection