<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>

<body>
    <div class="container-fluid">
        <?php include "sideNavBar.php"; ?>

        <div class="col py-3">
            <?php
            include "../connect_server.php";
            if (isset($_GET['id']) && isset($_GET['username'])) {
                $thisID = $_GET['id'];
                $thisUsername = $_GET['username'];

                // find and delete from:

                // APPOINTMENTS
                $sql = "DELETE FROM appointments WHERE user_ID=$thisID;";
                $sql .= "DELETE FROM appointments WHERE patient_ID=$thisID;";
                $sql .= "DELETE FROM appointments WHERE doctor_ID=$thisID;";

                // MEDICATION

                $sql .= "DELETE FROM medication WHERE med_patientID=$thisID;";

                // PREGNANCIES

                $sql .= "DELETE FROM pregnancies WHERE patient_ID=$thisID;";

                // PATIENTS/DOCTORS

                $sql .= "DELETE FROM patients WHERE patient_ID=$thisID;";
                $sql .= "DELETE FROM doctors WHERE doctor_ID=$thisID;";

                // PERSONAL_INFO

                $sql .= "DELETE FROM personal_info WHERE ID=$thisID;";

                // USERS

                $sql .= "DELETE FROM users WHERE username='$thisUsername';";

                if ($conn->multi_query($sql) === false) {
                    echo "<br> Failed to delete from appointments :( <br>";
                }

                echo "<h3>Successfully Deleted $thisUsername!</h3>";
            }else{
                echo "ahhh";
            }
            ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>

</html>