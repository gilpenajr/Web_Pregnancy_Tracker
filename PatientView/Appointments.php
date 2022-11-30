<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="patientStyle.css">
    <link rel="stylesheet" href="/style.css">
</head>
<body>

    <!-- NavBar Start -->
    <nav class="navbar navbar-expand-lg px-4" id="custom-navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="patientPortalHome.php">Welcome, {firstName}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item px-3">
                        <a class="nav-link" href="patientPortalHome.php">Home</a>
                    </li>
                    <li class="nav-item px-3">
                        <a class="nav-link" href="pregnancies.php">Pregnancy</a>
                    </li>
                    <li class="nav-item px-3">
                        <a class="nav-link" href="appointments.php">Appointments</a>
                    </li>
                    <li class="nav-item px-3">
                        <a class="nav-link" href="medications.php">Medications</a>
                    </li>
                </ul>
            </div>
            <button type="button" class="btn btn-dark navbar-btn px-2">
                Sign Out
            </button>
        </div>
    </nav>
    <!-- NavBar End -->

    <!-- Appointments Card-->
    <div class="container">
        <div class="col">
            <div class="card" id="appointmentsCard">
                <div class="card-body">
                    <div id="appt-container">
                        <h5>Appointments</h5>
                        <!-- Appointment Modal Button -->
                        <button type="button" class="btn btn-primary" id="appt-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Request New Appointment
                        </button>
                    </div>
                        
                    <!-- Single Appointment Entry -->
                    <table class='table'>
                        <tr>
                            <td>Appointment Date:</td>
                            <td> Insert from db</td>
                        </tr>
                        <tr>
                            <td>Appointment Time:</td>
                            <td> Insert from db</td>
                        </tr>
                    </table>
                    <!-- make function to create further entries like this or something-->

                </div>
            </div>
        </div>
    </div>





    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Request New Appointment</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Date Picker Start -->
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Enter Preferred Date</span>
                        <input type="date" id="start" name="trip-start"
                            value="2022-11-27"
                            min="2022-11-27" max="2023-11-27">
                    </div>
                    <!-- Date Picker End -->

                    <!-- Time Picker Start  -->
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Enter Preferred Time</span>
                            <input type="time" id="appt" name="appt"
                                min="09:00" max="18:00" required>
                    </div>
                    <!-- Time Picker End -->
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Submit Request</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>