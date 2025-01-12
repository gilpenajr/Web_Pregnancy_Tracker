<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <link rel="icon" type="image/x-icon" href="../images/baby-newborn.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <?php
        include 'patientInfo.php';
        include 'navBar.php'; 
    ?> 
    <div class="container mt-5">
        <div class="card mb-5">
            <div class="card-header py-3">
                <h3>Settings</h3>
            </div>
            <div class="card-body">
                <!-- Change Email -->
                <form action="change_email.php" method="POST">
                    <div class="row p-2">
                        <h5 class="mb-4">Change Email</h5>
                        <div class="col-6 mb-4">
                            <div class="form-floating">
                                <?php
                                    echo '<input type="email" readonly class="form-control" id="currentEmail" name="currentEmail" value="' . $row["email"] . '" disabled readonly>';
                                ?>
                                <label for="currentEmail">Current Email</label>
                            </div>
                        </div>
                        <div class="col-6 mb-4">
                            <div class="form-floating">
                                <input type="email" class="form-control" id="newEmail" name="newEmail" placeholder=" " required>
                                <label for="newEmail">New Email</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Change Email</button>
                        </div>
                    </div>
                </form>
                <hr>
                <!-- Change Password -->
                <form action="change_password.php" method="POST" id="changePw">
                    <div class="row p-2">
                        <h5 class="mb-4">Change Password</h5>
                        <div class="col-6 mb-4">
                            <div class="form-floating">
                                <input type="password" class="form-control" id="currentPassword" name="currentPassword" placeholder=" " required>
                                <label for="currentPassword">Current Password</label>
                            </div>
                        </div>
                        <div class="col-6 mb-4">
                            <div class="form-floating">
                                <input type="password" class="form-control" id="newPassword" name="newPassword" placeholder=" " required>
                                <label for="newPassword">New Password</label>
                            </div>
                        </div>
                        <div class="col-6 mb-4">
                        </div>
                        <div class="col-6 mb-4">
                            <div class="form-floating">
                                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder=" " required>
                                <label for="confirmPassword">Confirm Password</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary" form="changePw">Change Password</button>
                        </div>
                        <!-- TODO: implement JS for password checking -->
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
</body>
</html>