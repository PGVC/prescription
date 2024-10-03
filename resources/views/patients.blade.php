@extends('layout')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

@section('content')
<div class="container-fluid py-4 px-3">
    <div class="row mb-3">
        <div class="col-md-4">
            <!-- Replaced dropdown with HTML select -->
            <div class="col-md-4">
                <div class="form-group">
                    <select class="form-select form-select-sm bg-secondary text-white border-danger" style="width: 200px; height: 37px;">
                        <option selected>10 Patient</option>
                        <option>30 Patient</option>
                        <option>50 Patient</option>
                        <option>All Patients</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-md-8 d-flex justify-content-end">
            <div class="input-group me-3" style="width: 250px; height: 37px;">
                <span class="input-group-text bg-secondary text-white border-danger rounded-0">
                    <i class="fas fa-search"></i>
                </span>
                <input type="text" class="form-control bg-secondary text-white border-danger rounded-1" placeholder="Search patient..." aria-label="Search patient">
            </div>            
            <div class="col-md-3 mb-3 text-md-end">
                <button class="btn btn-outline-danger btn-block" data-bs-toggle="modal" data-bs-target="#addPatientModal">+ Add Patient</button>
            </div>
        </div>
    </div>

    <!-- Table Section -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="bg-secondary">
                <tr>
                    <th>PID</th>
                    <th>Patient Name</th>
                    <th>NIC</th>
                    <th>Patient Age</th>
                    <th>Contact No</th>
                    <th>Weight (Kg)</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @for ($i = 1; $i <= 10; $i++)
                <tr style="cursor: pointer;" onclick="window.location.href='/viewpatient';">
                        <td>{{ $i }}</td>
                        <td>Patient Name</td>
                        <td>70824567V</td>
                        <td>54</td>
                        <td>+94123456789</td>
                        <td>60</td>
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
            </div>
            <div class="modal-body">
                <form method="GET" action="/patients/save" class="p-3 border rounded">
                    <div class="col">
                        <label for="patientId">Patient ID:</label>
                        <input type="text" id="patientId" class="form-control" name="patient_id" placeholder="Leave empty to autogenerate">
                    </div>
                    <div class="col">
                        <label for="patientName">Patient Name:*</label>
                        <input type="text" id="patientName" class="form-control" name="patient_name" required>
                    </div>
                    <div class="col">
                        <label for="nic">NIC:</label>
                        <input type="text" id="nic" class="form-control" name="nic">
                    </div>
                    <div class="col">
                        <label for="age">Age:*</label>
                        <input type="tel" id="age" class="form-control" name="age" required>
                    </div>
                    <div class="col">
                        <label for="mobile">Contact No:*</label>
                        <input type="tel" id="mobile" class="form-control" name="mobile" required>
                    </div>
                    <div class="col">
                        <label for="weight">Weight:</label>
                        <input type="tel" id="weight" class="form-control" name="weight">
                    </div>
                    <div class="col">
                        <label for="email">Email:</label>
                        <input type="email" id="email" class="form-control" name="email">
                    </div>
                    <br>
                    <div class="form-group">
                        <button type="submit" class="btn" style="background-color: #d9534f; color: white;">Save</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
