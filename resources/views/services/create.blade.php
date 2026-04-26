@extends('layouts.master')

@section('title', 'Add Service')

@section('content')

<h2 style="color:#4d4728;">Add Service</h2>

<form method="POST" action="{{ route('services.store') }}"
      style="display:flex; flex-direction:column; gap:10px;">

    @csrf

    <input type="text" name="service_name" placeholder="Service Name"
        style="padding:10px; border:1px solid #ddd; border-radius:8px;">

    <input type="number" name="price" placeholder="Price"
        style="padding:10px; border:1px solid #ddd; border-radius:8px;">

    <input type="text" name="duration" placeholder="Duration"
        style="padding:10px; border:1px solid #ddd; border-radius:8px;">

    <button type="submit"
        style="background:#ff3e4d; color:white; padding:10px; border:none; border-radius:8px;">
        Save Service
    </button>

</form>

@endsection