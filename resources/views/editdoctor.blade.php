@extends('layout')

@section('content')
<div class="container d-flex justify-content-center align-items-center min-vh-80">
    <div class="card shadow-lg" style="width: 80%; max-width: 800px;">
        <div class="card-header text-white" style="background-color: #e63e3e;">
            <h5 class="mb-0">Edit Doctor Details</h5>
        </div>
        <div class="card-body">
            <!-- Assuming the form posts to a route like update_doctor -->
            <form action="{{ route('save_doctor_update',$doctor->user->id) }}" method="POST">
                @csrf
                @method('PUT') <!-- Method spoofing for PUT request -->

                <!-- Doctor Name and NIC -->
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label for="doctor_name" class="form-label fw-bold">Doctor Name:</label>
                        <input type="text" class="form-control" id="doctor_name" name="doctor_name" value="{{ $doctor->user->name }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="nic" class="form-label fw-bold">NIC:</label>
                        <input type="text" class="form-control" id="nic" name="nic" value="{{ $doctor->nic }}" required>
                    </div>
                </div>
                <div class="row g-3 mb-3">
                    <div class="col-md-4">
                        <label for="address" class="form-label fw-bold">Address:</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{ $doctor->address }}" required>
                    </div>
                    <div class="col-md-4">
                        <label for="phone" class="form-label fw-bold">Contact No:</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ $doctor->phone }}" required>
                    </div>
                    <div class="col-md-4">
                        <label for="email" class="form-label fw-bold">Email:</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{ $doctor->user->email }}" required>
                    </div>
                </div>
                <div class="row g-3 mb-3">
                    <div class="col-md-4">
                        <label for="work-place" class="form-label fw-bold">Work Place:</label>
                        <input type="text" class="form-control" id="work-place" name="work_place" value="{{ $doctor->work_place }}" required>
                    </div>
                    <div class="col-md-4">
                        <label for="specialization" class="form-label fw-bold">Specialization:</label>
                        <input type="text" class="form-control" id="specialization" name="specialization" value="{{ $doctor->specialization }}" required>
                    </div>
                    <div class="col-md-4">
                        <label for="experience" class="form-label fw-bold">Experience:</label>
                        <input type="text" class="form-control" id="experience" name="experience" value="{{ $doctor->experience }}" required>
                    </div>
                    <div class="col-md-4">
                        <label for="highest_edu" class="form-label fw-bold">Highest Education:</label>
                        <input type="text" class="form-control" id="highest_edu" name="highest_edu" value="{{ $doctor->highest_edu }}" required>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="text-end">
                    <a href="{{ route('dashboard') }}" class="btn btn-secondary me-2">Cancel</a>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
