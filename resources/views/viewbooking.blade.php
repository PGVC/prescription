@extends('layout')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            Booking Details
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <p><strong>Patient Name:</strong> John Doe</p>
                </div>
                <div class="col-md-3">
                    <p><strong>Contact No:</strong> +94123456789</p>
                </div>
                <div class="col-md-3">
                    <p><strong>Age:</strong> 44</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <p><strong>Date:</strong> ../../....</p>
                </div>
                <div class="col-md-3">
                    <p><strong>Time:</strong> ..-.. AM/PM</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Symptoms:</strong> Flu</p>
                </div>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-end">
            <a href="{{ route('bookings') }}" class="btn btn-secondary">Bokkings List</button>
            <a href="{{ route('editbooking') }}" class="btn btn-danger ms-2">Edit Booking</a>
        </div>
        
    </div>
</div>
@endsection
