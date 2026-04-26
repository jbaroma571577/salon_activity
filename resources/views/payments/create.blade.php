@extends('layouts.admin')

@section('title', 'Add Payment')

@section('content')

<div class="data-card">

    <h2 style="margin-bottom: 20px;">Add Payment</h2>

    <form method="POST" action="{{ route('payments.store') }}"
          style="display:flex; flex-direction:column; gap:15px;">

        @csrf

        <!-- SELECT CUSTOMER / APPOINTMENT -->
        <div>
            <label style="font-weight:600;">Select Customer Appointment</label><br><br>

            <select name="appointment_id" required
                style="width:100%; padding:12px; border:1px solid #ddd; border-radius:8px;">
                
                <option value="">-- Select Appointment --</option>

                @foreach($appointments as $appointment)
                    <option value="{{ $appointment->id }}">
                        {{ $appointment->customer_name }}
                        - {{ $appointment->appointment_date }}
                    </option>
                @endforeach

            </select>
        </div>

        <!-- AMOUNT -->
        <div>
            <label style="font-weight:600;">Amount</label><br><br>

            <input
                type="number"
                name="amount"
                placeholder="Enter Amount"
                required
                style="width:100%; padding:12px; border:1px solid #ddd; border-radius:8px;"
            >
        </div>

        <!-- STATUS -->
        <div>
            <label style="font-weight:600;">Payment Status</label><br><br>

            <select
                name="status"
                required
                style="width:100%; padding:12px; border:1px solid #ddd; border-radius:8px;"
            >
                <option value="">-- Select Status --</option>
                <option value="Paid">Paid</option>
                <option value="Unpaid">Unpaid</option>
            </select>
        </div>

        <!-- BUTTON -->
        <button type="submit"
            class="btn-add"
            style="width:200px;">
            Save Payment
        </button>

    </form>

</div>

@endsection