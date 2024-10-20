@extends('layout')

@section('title', 'Dashboard')

@section('content')

    <div class="dashboard-content py-4 px-3">
    
        <div class="row text-center">
            <!-- Card 1 -->
            <div class="col-md-4 mb-3">
                <div class="card border-danger bg-secondary text-center border-3 rounded-pill">
                    <div class="card-body">
                        <h3 class="text-white">Today Bookings</h3>
                        <h1 class="text-danger">25</h1>
                    </div>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="col-md-4 mb-3">
                <div class="card border-danger bg-secondary text-center border-3 rounded-pill">
                    <div class="card-body">
                        <h3 class="text-white">Available</h3>
                        <h1 class="text-danger">05</h1>
                    </div>
                </div>
            </div>
            <!-- Card 3 -->
            <div class="col-md-4 mb-3">
                <div class="card border-danger bg-secondary text-center border-3 rounded-pill">
                    <div class="card-body">
                        <h3 class="text-white">Pending Bookings</h3>
                        <h1 class="text-danger">07</h1>
                    </div>
                </div>
            </div>
        </div>
        <br>
        
        <!-- Filters -->
        <div class="row mb-4">
            <div class="col-md-6 mb-3">
                <select class="form-select bg-secondary text-white border-danger" aria-label="Select Date">
                    <option selected>Select Date</option>
                    <!-- Options for dates -->
                </select>
            </div>
            <div class="col-md-3 mb-3">
                <div class="d-flex align-items-center">
                    <!-- First select for time -->
                    <select class="form-select bg-secondary text-white border-danger me-2" style="width: auto;" aria-label="Select Time">
                        <option selected>Select Time</option>
                        <!-- Options for times -->
                    </select>
                    <!-- Second select for AM/PM -->
                    <select class="form-select bg-secondary text-white border-danger" style="width: auto;" aria-label="Time Range">
                        <option selected>AM</option>
                        <option>PM</option>
                    </select>
                </div>
            </div>            
            <div class="col-md-3 mb-3">
                <button class="btn btn-outline-danger btn-block" data-bs-toggle="modal" data-bs-target="#addBookingModal">+ Add Booking</button>
                <button class="btn btn-outline-danger btn-block" data-bs-toggle="modal" data-bs-target="#addPatientModal">+ Add Patient</button>
            </div>
        </div>

        <!-- Table -->
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="bg-secondary">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Patient Name</th>
                        <th scope="col">Patient Age</th>
                        <th scope="col">Symptoms</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>John Doe</td>
                        <td>35</td>
                        <td>Flu</td>
                    </tr>
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
                    <form method="POST" action="{{ route('bookings.store')}}" class="p-3 border rounded">
                        @csrf
                        <div class="form-row mb-3">
                            <div class="col">
                                <label for="name">Patient Name:*</label>
                                <input type="text" id="name" class="form-control" name="patientname" required>
                            </div>
                            <div class="col">
                                <label for="contactnum">Contact Number:*</label>
                                <input type="tel" id="contactnum" class="form-control" name="contact_num" required>
                            </div>
                            <div class="col">
                                <label for="Age">Age:*</label>
                                <input type="text" id="Age" class="form-control" name="age" required>
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
                                <label for="disease">Symptoms:</label>
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

<style>
    .dashboard-content {
        background-color: #b4afaf;
    }

    .card {
        border: 2px solid #be0707;
        background-color: #696868;
        color: #fafafa;
    }
</style>
