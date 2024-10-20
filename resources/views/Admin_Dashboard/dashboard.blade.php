@extends('layout')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<style>
    .modal-close {
        filter: invert(1);
    }
</style>
@section('content')
<div class="container-fluid py-4 px-3">
    <div class="row mb-3">
        <div class="col-md-4">
            <!-- Replaced dropdown with HTML select -->
            <div class="col-md-4">
                <div class="form-group">
                    <select class="form-select form-select-sm bg-secondary text-white border-danger" style="width: 200px; height: 37px;">
                        <option selected>10 doctors</option>
                        <option>30 doctors</option>
                        <option>50 doctors</option>
                        <option>All doctors</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-md-8 d-flex justify-content-end">
            <div class="input-group me-3" style="width: 250px; height: 37px;">
                <span class="input-group-text bg-secondary text-white border-danger rounded-0">
                    <i class="fas fa-search"></i>
                </span>
                <input type="text" class="form-control bg-secondary text-white border-danger rounded-1" placeholder="Search patient..." aria-label="Search doctor">
            </div>
            <div class="col-md-3 mb-3 text-md-end">
                <button class="btn btn-outline-danger btn-block" data-bs-toggle="modal" data-bs-target="#addPatientModal">+ Add doctor</button>
            </div>
        </div>
    </div>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <!-- Table Section -->
    <div class="table-responsive">
        <!-- Pagination Links (if needed at the top) -->
        <div class="d-flex justify-content-end mb-2">
            {{ $doctors->links('pagination::bootstrap-5') }}
        </div>

        <!-- Check if doctors collection is empty -->
        @if($doctors->isEmpty())
        <label class="d-flex justify-content-center">Doctors not found.</label>
        @else
        <table class="table table-bordered table-striped">
            <thead class="bg-secondary">
                <tr>
                    <th>DID</th>
                    <th>Doctor Name</th>
                    <th>NIC</th>
                    <th>Address</th>
                    <th>Contact No</th>
                    <th>Email</th>
                    <th>Work Place</th>
                    <th>Specialization</th>
                    <th>Experience</th>
                    <th>Highest Education</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($doctors as $doctor)
                <tr>
                    <td>{{ $doctor->id }}</td>
                    <td>{{ $doctor->user->name ?? 'N/A' }}</td> <!-- Safely accessing user name -->
                    <td>{{ $doctor->nic }}</td>
                    <td>{{ $doctor->address }}</td>
                    <td>{{ $doctor->phone }}</td>
                    <td>{{ $doctor->user->email ?? 'N/A' }}</td> <!-- Safely accessing user email -->
                    <td>{{ $doctor->work_place }}</td>
                    <td>{{ $doctor->specialization }}</td>
                    <td>{{ $doctor->experience }}</td>
                    <td>{{ $doctor->highest_edu }}</td>
                    <td>
                        <!-- Action buttons -->
                        <a href="{{ route('update_doctor', $doctor->user->id) }}" class="btn"><i class="fas fa-edit text-primary"></i></a>
                        <form action="{{ route('delete_doctor', $doctor->user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn"><i class="fas fa-trash text-danger"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif

        <!-- Pagination Links (at the bottom) -->
        <div class="d-flex justify-content-end mt-2">
            {{ $doctors->links('pagination::bootstrap-5') }}
        </div>
    </div>

</div>

<!-- Modal for Adding Patient -->
<div class="modal fade" id="addPatientModal" tabindex="-1" aria-labelledby="addPatientModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #d9534f;">
                <h5 class="modal-title" id="addPatientModalLabel" style="color: white">Add Patient</h5>
                <button type="button" class="btn btn-close modal-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('add_doctor')}}" class="p-3 border rounded">
                    @csrf
                    <div class="col mb-3">
                        <label for="doctorName">Doctor Name: <span class="text-danger bg-transparent">*</span></label>
                        <input type="text" id="doctorName" class="form-control" name="doctor_name" placeholder="name" required>
                    </div>
                    <div class="col mb-3">
                        <label for="nic">NIC: <span class="text-danger bg-transparent">*</span></label>
                        <input type="text" id="nic" class="form-control" name="nic" placeholder="NIC" maxlength="12" required>
                    </div>
                    <div class="col mb-3">
                        <label for="address">Address: <span class="text-danger bg-transparent">*</span></label>
                        <input type="text" id="address" class="form-control" name="address" placeholder="address" required>
                    </div>
                    <div class="col mb-3">
                        <label for="phone">Contact No: <span class="text-danger bg-transparent">*</span></label>
                        <input type="tel" id="phone" class="form-control" name="phone" placeholder="07XXXXXXXX" maxlength="12" required>
                    </div>
                    <div class="col mb-3">
                        <label for="email">Email: <span class="text-danger bg-transparent">*</span></label>
                        <input type="email" id="email" class="form-control" name="email" placeholder="example@gmail.com" required>
                    </div>
                    <div class="col mb-3">
                        <label for="work_place">Work Place: <span class="text-secondary">(If work hospital enter hospital name)</span></label>
                        <input type="text" id="work_place" class="form-control" name="work_place" placeholder="hospital name">
                    </div>
                    <div class="col mb-3">
                        <label for="specialization">Specialization: <span class="text-secondary">(If specializ add field)</span></label>
                        <input type="text" id="specialization" class="form-control" name="specialization" placeholder="dental, baby ect...">
                    </div>
                    <div class="col mb-3">
                        <label for="experience">Experience: <span class="text-danger bg-transparent">*</span></label>
                        <input type="text" id="experience" class="form-control" name="experience" placeholder="number of experience years (1 yesrs, 2yesrs ...)" required>
                    </div>
                    <div class="col mb-3">
                        <label for="highest_edu">Highest Education: <span class="text-danger bg-transparent">*</span></label>
                        <input type="text" id="highest_edu" class="form-control" name="highest_edu" placeholder="highest education level (Bsc, MBA ...)" required>
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-success">Save</button>
                        <button type="rest" class="btn btn-warning">Clear</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

<!-- Styles And JS links -->
<style>
    .container-fluid {
        background-color: #b4afaf;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    function redirectToViewPatient(patientId) {
        window.location.href = '/viewpatient/' + patientId;
    }

    function handleAction(event, patientId) {
        const action = event.target.value;

        if (action === 'delete') {
            const confirmation = confirm("Are you sure you want to delete this Paient?");
            if (confirmation) {
                alert("Item deleted."); // Replace with actual delete logic
            } else {
                event.target.selectedIndex = 0; // Reset to "Actions"
            }
        } else if (action === 'edit') {
            window.location.href = '/editpatient/' + patientId; // Redirect to the edit page for the selected patient
        }
    }
</script>