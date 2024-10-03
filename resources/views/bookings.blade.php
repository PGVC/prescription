@extends('layout')

@section('content')
<div class="container-fluid py-4 px-3">
    
    <!-- Filters Section -->
    <div class="row mb-4">
        <div class="col-md-3 mb-3">
            <select class="form-select bg-secondary text-white border-danger" aria-label="Select Date">
                <option selected>Select Date</option>
                
            </select>
        </div>
        <div class="col-md-3 mb-3">
            <select class="form-select bg-secondary text-white border-danger" aria-label="Select Time">
                <option selected>Select Time</option>
            </select>
        </div>
        <div class="col-md-3 mb-3">
            <select class="form-select bg-secondary text-white border-danger" style="width: auto" aria-label="Time Range">
                <option selected>AM</option>
                <option>PM</option>    
            </select>
        </div>
        <div class="col-md-3 mb-3 text-md-end">
            <button class="btn btn-outline-danger btn-block" data-bs-toggle="modal" data-bs-target="#addBookingModal">+ Add Booking</button>
        </div>
    </div>

    <!-- Table Section -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="bg-secondary">
                <tr>
                    <th scope="col">Patient Name</th>
                    <th scope="col">Contact No</th>
                    <th scope="col">Patient Age</th>
                    <th scope="col">Symptoms</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @for ($i = 1; $i <= 10; $i++)
                <tr style="cursor: pointer;" onclick="window.location.href='/viewbooking';">
                    <td>John Doe {{ $i }}</td>
                    <td> +9412345678</td>
                    <td>35</td>
                    <td>Symptoms</td>
                    <td>
                        <select class="form-select form-select-sm bg-secondary text-white border-danger" style="width: auto; height: 37px;" onchange="handleAction(event, {{ $i }})" onclick="event.stopPropagation();">
                            <option disabled selected>Actions</option> <!-- Non-selectable label -->
                            <option value="edit">Edit</option>
                            <option value="delete">Delete</option>
                        </select>
                        
                        <script>
                            function handleAction(event) {
                                const action = event.target.value;
                                
                                if (action === 'edit') {
                                    // Redirect to the editbooking page
                                    window.location.href = '/editbooking'; // Update with the correct path if needed
                                } else if (action === 'delete') {
                                    const confirmation = confirm("Are you sure you want to delete this Booking?");
                                    if (confirmation) {
                                        // Proceed with delete action (e.g., call a function to delete or submit a form)
                                        alert("Item deleted."); // Replace this with actual delete logic
                                    } else {
                                        // Reset the select box back to the default option
                                        event.target.selectedIndex = 0; // Reset to "Actions"
                                    }
                                }
                            }
                        </script>
                        
                        
                </td>
                </tr>
                @endfor
            </tbody>
        </table>
    </div>
</div>


<!-- Modal for Adding Booking -->

<div class="modal fade" id="addBookingModal" tabindex="-1" aria-labelledby="addBookingModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #d9534f;">
                <h5 class="modal-title" style="color: white" id="addBookingModalLabel">Add Booking</h5>
            </div>
            <div class="modal-body">
                <form method="GET" action="/bookings/save" class="p-3 border rounded">

                
                    <div class="form-row mb-3">
                        <div class="col">
                            <label for="contactnum">Patient Name:*</label>
                            <input type="text" id="name" class="form-control" name="contact_num" required>
                        </div>
                        <div class="col">
                            <label for="contactnum">Contact Number:*</label>
                            <input type="text" id="contactnum" class="form-control" name="contact_num" required>
                        </div>
                        <div class="col">
                            <label for="contactnum">Age:*</label>
                            <input type="text" id="Age" class="form-control" name="contact_num" required>
                        </div>
                        <div class="col">
                            <label for="bookingdate">Date:*</label>
                            <input type="date" id="bookingdate" class="form-control" name="booking_date" required>
                        </div>
                        <div class="col">
                            <label for="time">Time:*</label>
                            <input type="time" id="time" class="form-control" name="booking_time" required>
                        </div>
                    </div>
                
                    <div class="form-row mb-3">
                        <div class="col">
                            <label for="Symptoms">Symptoms:</label>
                            <input type="text" id="Symptoms" class="form-control" name="Symptoms">
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

@endsection

<style>
    .container-fluid {
        background-color: #b4afaf;
    }
</style>

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
@endsection
