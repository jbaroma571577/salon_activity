@extends('layouts.admin')

@section('title', 'Edit Service')

@section('content')

<div class="data-card">

    <h2 style="margin-bottom: 20px;">Edit Service</h2>

    <form action="{{ route('services.update', $service->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div style="margin-bottom:15px;">
            <label>Service Name</label><br>
            <input 
                type="text" 
                name="service_name"
                value="{{ $service->service_name }}"
                required
                style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;"
            >
        </div>

        <div style="margin-bottom:15px;">
            <label>Price</label><br>
            <input 
                type="number" 
                name="price"
                value="{{ $service->price }}"
                required
                style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;"
            >
        </div>

        <div style="margin-bottom:15px;">
            <label>Duration</label><br>
            <input 
                type="text" 
                name="duration"
                value="{{ $service->duration }}"
                required
                style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;"
            >
        </div>

        <div style="margin-bottom:20px;">
            <label>Description</label><br>
            <textarea 
                name="description"
                rows="4"
                style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;"
            >{{ $service->description }}</textarea>
        </div>

        <button type="submit" class="btn-add">
            Update Service
        </button>

    </form>

</div>

@endsection