@extends('layout')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<style>
    .modal-close{
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

    <!-- Table Section -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="bg-secondary">
                <tr>
                    <th>DID</th>
                    <th>Doctor Name</th>
                    <th>NIC</th>
                    <th>Doctor Age</th>
                    <th>Contact No</th>
                    <th>Bussiness Location</th>
                    <th>Location ID</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @for ($i = 1; $i <= 10; $i++)
                    <tr style="cursor: pointer;" onclick="window.location.href='/viewpatient';">
                    <td>{{ $i }}</td>
                    <td>Doctor Name</td>
                    <td>70824567V</td>
                    <td>54</td>
                    <td>+94123456789</td>
                    <td>Anuradhapura</td>
                    <td>A001</td>
                    <td></td>
                    <td>
                        <select class="form-select form-select-sm bg-secondary text-white border-danger" style="width: auto; height: 37px;" onchange="handleAction(event, {{ $i }})" onclick="event.stopPropagation();">
                            <option disabled selected>Actions</option> <!-- Non-selectable label -->
                            <option value="edit">Edit</option>
                            <option value="delete">Delete</option>
                        </select>
                    </td>
                    </tr>
                    @endfor
            </tbody>
        </table>
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
                        <input type="text" id="nic" class="form-control" name="nic" placeholder="NIC" required>
                    </div>
                    <div class="col mb-3">
                        <label for="address">Address: <span class="text-danger bg-transparent">*</span></label>
                        <input type="text" id="address" class="form-control" name="address" placeholder="address" required>
                    </div>
                    <div class="col mb-3">
                        <label for="phone">Contact No: <span class="text-danger bg-transparent">*</span></label>
                        <input type="tel" id="phone" class="form-control" name="phone" placeholder="07XXXXXXXX" required>
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