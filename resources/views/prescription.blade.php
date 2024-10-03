@extends('layout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="background-color: #797575; border-radius: 10px;">
                <div class="card-body">
                    <!-- Prescription Form -->
                    <div class="d-flex justify-content-between mb-3">
                        <!-- Select Patient -->
                        <div class="input-group me-2" style="width: 200px;">
                            <span class="input-group-text border-danger" style="background-color: #d1d1d1;">
                                <i class="bi bi-search"></i> 
                            </span>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="search" class="form-control bg-secondary text-white border-danger" 
                                           id="patientSearch" placeholder="Search Patient" 
                                           aria-label="Search Patient" style="border-radius: 0; width: 200px;">
                                </div>
                            </div>
                        </div>
                        <div class="input-group" style="width: 200px;">
                            <span class="input-group-text border-danger" style="background-color: #d1d1d1;">
                                <i class="bi bi-person-check-fill"></i>
                            </span>
                            <input type="text" class="form-control bg-secondary text-white border-danger" id="selectedPatient" readonly style="border-radius: 0;" placeholder="Selected Patient">
                        </div>
                        <!-- Select Disease -->
                        <div class="input-group ms-2" style="width: 200px;">
                            <span class="input-group-text border-danger" style="background-color: #d1d1d1;">
                                <i class="bi bi-virus"></i> 
                            </span>
                            <select class="form-select bg-secondary text-white border-danger" aria-label="Select Disease" style="border-radius: 0;">
                                <option selected>Select Disease</option>
                                <option value="Disease 1">Disease 1</option>
                                <option value="Disease 2">Disease 2</option>
                            </select>
                            <button class="btn btn-secondary border-danger" type="button" style="border-radius: 0;">+</button>
                        </div>
                    </div>
                    <!-- Prescription Table -->
                    <table class="table table-bordered text-center" style="border-color: #d1d1d1;">
                        <thead class="bg-secondary">
                            <tr>
                                <th>Drug Name</th>
                                <th>Strength</th>
                                <th>Dosage</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-white">
                            <tr>
                                <td>Drug 1</td>
                                <td>5 mg</td>
                                <td>bd 3day</td>
                                <td><button class="btn btn-danger" style="border-radius: 0;" onclick="confirmDelete()">
                                    Delete
                                </button>
                                
                                <script>
                                    function confirmDelete() {
                                        const confirmation = confirm("Are you sure you want to delete this?");
                                        if (confirmation) {
                                            alert("Item deleted.");
                                        }
                                    }
                                </script>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    <button class="btn btn-secondary" style="border-radius: 0;" data-bs-toggle="modal" data-bs-target="#addPrescriptionModal">+</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- Additional Note -->
                    <div class="form-group">
                        <label for="additionalNote" style="color: #d9534f;">Additional Note:</label>
                        <textarea class="form-control" id="additionalNote" rows="3" style="border-radius: 0; border-color: #d1d1d1;"></textarea>
                    </div>
                    <div class="text-end mt-3">
                        <button class="btn btn-danger" style="background-color: #d9534f; border-radius: 0;">Print</button>
                    </div>
                </div>
            </div>
        </div>
    </div>



<!-- Add Prescription Modal -->
<div class="modal fade" id="addPrescriptionModal" tabindex="-1" aria-labelledby="addPrescriptionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #d9534f;">
                <h5 class="modal-title" id="addPrescriptionModalLabel" style="color: white;">Add Prescription</h5>
            </div>
            <div class="modal-body">
                <!-- The content for addprescribe.blade.php will be simulated here -->
                <div id="prescribeFormContent">
                    <form method="GET" action="/bookings/save" class="p-3 border rounded">
                        <div class="form-row mb-3">
                            <div class="col">
                                <label for="drugname">Drug Name:*</label>
                                <input type="text" id="drugname" class="form-control" name="drug_name" required>
                            </div>
                            <div class="col">
                                <label for="strength">Strength:*</label>
                                <input type="text" id="strength" class="form-control" name="strength" required>
                            </div>
                            <div class="col">
                                <label for="dosage">Dosage:*</label>
                                <input type="text" id="dosage" class="form-control" name="dosage" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn" style="background-color: #d9534f; color:white">Book</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<!--jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!--Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

<!-- JavaScript to update the selected patient field -->
<script>
    document.getElementById('patientSelect').addEventListener('change', function() {
        document.getElementById('selectedPatient').value = this.value;
    });
</script>
@endsection
