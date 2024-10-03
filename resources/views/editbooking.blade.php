@extends('layout')

@section('content')
<div class="container d-flex justify-content-center align-items-center min-vh-80">
    <div class="card shadow-lg" style="width: 80%; max-width: 800px;">
        <div class="card-header text-white" style="background-color: #e63e3e;">
            <h5 class="mb-0">Edit Booking Details</h5>
        </div>
        <div class="card-body">
            <form>
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label for="name" class="form-label fw-bold">Patient Name:</label>
                        <input type="text" class="form-control" id="name" value="John Doe" readonly>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="contact_no" class="form-label fw-bold">Contact No:</label>
                    <input type="text" class="form-control" id="contact_no" value="+94123456789" readonly>
                </div>
                <div class="row g-3 mb-3">
                    <div class="col-md-4">
                        <label for="age" class="form-label fw-bold">Age:</label>
                        <input type="number" class="form-control" id="age" value="54" readonly>
                    </div>
                </div>
                <div class="row g-3 mb-3">
                </div>
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label for="date" class="form-label fw-bold">Date:</label>
                        <input type="date" class="form-control" id="date" required>
                    </div>
                    <div class="col-md-6">
                        <label for="time" class="form-label fw-bold">Time:</label>
                        <input type="time" class="form-control" id="time" required>
                    </div>
                </div>
                <div class="row g-3 mb-3">
                    <div class="col-md-12">
                        <label for="Symptoms" class="form-label fw-bold">Symptoms:</label>
                        <input type="text" class="form-control" id="Symptoms" value="Hypertension, Diabetes" required>
                    </div>
                </div>
                <div class="text-end">
                    <button type="button" class="btn btn-secondary me-2">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
