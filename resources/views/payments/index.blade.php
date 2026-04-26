@extends('layouts.admin')

@section('title', 'Payment History')

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
        padding: 16px 20px;
        vertical-align: middle;
        border-bottom: 1px solid #f3f4f6;
        color: #374151;
    }

    .custom-table tbody tr:hover {
        background-color: #fbfcfd;
    }

    /* Status Badge Styling */
    .status-badge {
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
    }

    .status-paid { background: #d1fae5; color: #065f46; }
    .status-pending { background: #fef3c7; color: #92400e; }
    .status-failed { background: #fee2e2; color: #991b1b; }

    .btn-add {
        background: #1f2937;
        color: white;
        padding: 10px 20px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 600;
        display: inline-block;
    }
</style>

<div class="data-card">
    <div style="display:flex; justify-content:space-between; align-items:center;">
        <div>
            <h2 style="margin:0; font-size: 1.5rem; color: #111827;">Payment History</h2>
            <p style="margin:5px 0 0; color: #6b7280; font-size: 0.9rem;">Review and manage all customer transactions.</p>
        </div>
        <a href="{{ route('payments.create') }}" class="btn-add">+ Add Payment</a>
    </div>

    @if(session('success'))
        <div style="margin: 20px 0; background:#d1fae5; color:#065f46; padding:12px; border-radius:8px; border-left: 5px solid #10b981;">
            {{ session('success') }}
        </div>
    @endif

    <table class="custom-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Customer</th>
                <th>Service</th>
                <th>Amount</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($payments as $payment)
            <tr>
                <td style="color: #9ca3af; font-size: 0.85rem;">#{{ $payment->id }}</td>
                <td style="font-weight: 500;">
                    {{ optional($payment->appointment)->customer_name ?? 'N/A' }}
                </td>
                <td>
                    <span style="color: #6b7280;">
                        {{ optional(optional($payment->appointment)->service)->service_name ?? 'No Service' }}
                    </span>
                </td>
                <td style="font-weight: 700; color: #111827;">
                    ₱{{ number_format($payment->amount, 2) }}
                </td>
                <td>
                    @php
                        $statusClass = 'status-pending';
                        if(strtolower($payment->status) == 'paid') $statusClass = 'status-paid';
                        if(strtolower($payment->status) == 'failed') $statusClass = 'status-failed';
                    @endphp
                    <span class="status-badge {{ $statusClass }}">
                        {{ $payment->status }}
                    </span>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" style="text-align:center; padding: 40px; color: #9ca3af;">
                    No payment records found.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection