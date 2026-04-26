@extends('layouts.master')

@section('title', 'Create Appointment')

@section('content')

<h2 style="color:#4d4728;">Create Appointment</h2>

<form method="POST" action="{{ route('appointments.store') }}"
      style="display:flex; flex-direction:column; gap:10px;">

    @csrf

    <input type="text" name="customer_name" placeholder="Customer Name"
        style="padding:10px; border:1px solid #ddd; border-radius:8px;">

    <input type="text" name="contact" placeholder="Contact"
        style="padding:10px; border:1px solid #ddd; border-radius:8px;">

    <select name="service_id"
        style="padding:10px; border:1px solid #ddd; border-radius:8px;">

        @foreach($services as $service)
            <option value="{{ $service->id }}">
                {{ $service->service_name }}
            </option>
        @endforeach

    </select>

    <input type="date" name="appointment_date"
        style="padding:10px; border:1px solid #ddd; border-radius:8px;">

    <input type="time" name="appointment_time"
        style="padding:10px; border:1px solid #ddd; border-radius:8px;">

    <input type="number" name="price" placeholder="Price"
        style="padding:10px; border:1px solid #ddd; border-radius:8px;">

    <button type="submit"
        style="background:#ff3e4d; color:white; padding:10px; border:none; border-radius:8px;">
        Save Appointment
    </button>

</form>

@endsection