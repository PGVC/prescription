@extends('layout')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            Patient Details
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <p><strong>Patient Name:</strong> John Doe</p>
                </div>
                <div class="col-md-3">
                    <p><strong>NIC:</strong> 70824567V</p>
                </div>
                <div class="col-md-3">
                    <p><strong>Age:</strong> 54</p>
                </div>
                <div class="col-md-3">
                    <p><strong>Weight (Kg):</strong> 60</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <p><strong>Contact No:</strong> +94123456789</p>
                </div>
                <div class="col-md-3">
                    <p><strong>Address:</strong> 123 Main St, City</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Medical History:</strong> Hypertension, Diabetes</p>
                </div>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-end">
            <a href="{{ route('patients') }}" class="btn btn-secondary">Patients List</button>
            <a href="{{ route('editpatient') }}" class="btn btn-danger ms-2">Edit Patient</a>
        </div>
        
    </div>
</div>
@endsection
