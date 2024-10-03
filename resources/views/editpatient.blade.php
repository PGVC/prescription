@extends('layout')

@section('content')
<div class="container d-flex justify-content-center align-items-center min-vh-80">
    <div class="card shadow-lg" style="width: 80%; max-width: 800px;">
        <div class="card-header text-white" style="background-color: #e63e3e;">
            <h5 class="mb-0">Edit Patient Details</h5>
        </div>
        <div class="card-body">
            <form>
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label for="name" class="form-label fw-bold">Patient Name:</label>
                        <input type="text" class="form-control" id="name" value="John Doe" required>
                    </div>
                    <div class="col-md-6">
                        <label for="nic" class="form-label fw-bold">NIC:</label>
                        <input type="text" class="form-control" id="nic" value="70824567V" required>
                    </div>
                </div>
                <div class="row g-3 mb-3">
                    <div class="col-md-4">
                        <label for="age" class="form-label fw-bold">Age:</label>
                        <input type="number" class="form-control" id="age" value="54" required>
                    </div>
                    <div class="col-md-4">
                        <label for="weight" class="form-label fw-bold">Weight (Kg):</label>
                        <input type="number" class="form-control" id="weight" value="60" required>
                    </div>
                    <div class="col-md-4">
                        <label for="contact_no" class="form-label fw-bold">Contact No:</label>
                        <input type="text" class="form-control" id="contact_no" value="+94123456789" required>
                    </div>
                </div>
                <div class="row g-3 mb-3">
                    <div class="col-md-12">
                        <label for="address" class="form-label fw-bold">Address:</label>
                        <input type="text" class="form-control" id="address" value="123 Main St, City" required>
                    </div>
                </div>
                <div class="row g-3 mb-3">
                    <div class="col-md-12">
                        <label for="medical_history" class="form-label fw-bold">Medical History:</label>
                        <textarea class="form-control" id="medical_history" rows="3" required>Hypertension, Diabetes</textarea>
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
