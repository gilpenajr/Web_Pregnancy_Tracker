<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pregnancies</title>
    <link rel="icon" type="image/x-icon" href="../images/baby-newborn.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="patientStyle.css">
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <!-- NavBar Start -->
    <?php
        include 'patientInfo.php';
        include 'navBar.php'; 
    ?> 
    <!-- Pregnancy Card        -->
    <div class="container mt-5">
        <div class="col">
            <div class="card" id="pregnancyCard">
                <div class="card-header d-flex justify-content-between py-3">
                    <h3>Pregnancies</h3>
                    <!-- Button to show past pregnancies -->
                    <tr>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Show Past Pregnancies
                        </button>
                    </tr>
                </div>
                <div class="card-body">
                    <!--Single Pregnancy Entry -->
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Current Trimester </th>
                                <th scope="col">Weeks Until Due Date</th>
                                <th scope="col">Due Date</th>
                                <th scope="col">Baby's Sex</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            //decarling vars
                            $firstPregancyRow = null;
                            $countdownRatio = 0;
                            //getting current date and time 
                            $tempDateTime = date('d-m-Y h:i:s a', time());
                            //saving date time as datetimeImmutabel
                            $currentDateTime  = new dateTimeImmutable($tempDateTime);
                            //datetime string 
                            $currDate = $currentDateTime->format('F d,Y');

                            // create query for pregnancies 
                            $pregnanciesSQL = "SELECT * FROM pregnancies where patient_ID = $patientID;";
                            //get pregnacy rows if found 
                            $pregnanciesResult = $conn->query($pregnanciesSQL);

                            //function to print current pregnancy
                            if ($pregnancyRow = $pregnanciesResult->fetch_assoc()) {
                                //get due date 
                                $dueDate = $pregnancyRow["due_date"];
                                //converting due date to immutable 
                                $dueDateImmutable = new dateTimeImmutable($dueDate);
                                //getting difference for due date 
                                $dueDateCountDown = $currentDateTime->diff($dueDateImmutable);
                                //getting days
                                $countdownDays = $dueDateCountDown->format('%R%a');
                                if ($countdownDays <= 0) {
                                    echo "<td>No current pregnancies </td>";
                                    $firstPregancyRow = $pregnancyRow;
                                } else {
                                    //converting days left to weeks 
                                    $countdownWeeks = floor($countdownDays / 7);
                                    //getting weeks into pregancy(40 weeks in a pregancy? according to bing)
                                    $currentweek = 40 - $countdownWeeks;
                                    //getting countdown ratio for progress par 
                                    $countdownRatio = ($countdownWeeks / 40) * 100;
                                    if ($countdownWeeks <= 13)
                                        $trimester = "First";
                                    elseif ($countdownWeeks <= 26)
                                        $trimester = "2";
                                    elseif ($countdownWeeks <= 40)
                                        $trimester = "Second";
                                    echo ("<td>$trimester</td>" .
                                        "<td>$countdownWeeks</td>" .
                                        "<td>" . $pregnancyRow["due_date"] .
                                        "<td>" . $pregnancyRow["baby_sex"] .
                                        "</td></tr></div>"
                                    );
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                    <!-- Progress Bar -->
                    <?php
                    echo "<div class='progress'>
                            <div class='progress-bar progress-bar-striped' role='progressbar'
                             aria-label='Default striped example' style='width: $countdownRatio%' 
                             aria-valuenow='100' aria-valuemin='0' aria-valuemax='100'></div>
                        </div>";
                    ?>
                    <!-- Further pregnancies create more entries function or something -->
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Previous Pregnancies</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class='table table-bordered table-hover'>
                        <thead>
                            <tr>
                                <th scope="col">Weeks Until Due Date</th>
                                <th scope="col">Due Date</th>
                                <th scope="col">Baby's Sex</th>
                            </tr>
                        </thead>
                        <div class="card-body">
                            <?php
                            //check for first pregnancy row 
                            try {
                                if ($firstPregancyRow)
                                    printRow($firstPregancyRow);
                            } catch (Exception $e) {
                                print("nevermind");
                            }

                            //print following pregancies 
                            while ($pregnancyRow = $pregnanciesResult->fetch_assoc())
                                printRow($pregnancyRow);

                            function printRow($pregnancyRow)
                            {
                                echo ("
                                <tr><td> Birthed </td>     
                                <td>" . $pregnancyRow["due_date"] . "</td>" .
                                    "<td>" . $pregnancyRow["baby_sex"] . "</td>" .
                                    "</tr></div>"
                                );
                            }
                            ?>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>