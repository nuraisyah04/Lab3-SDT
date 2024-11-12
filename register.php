<?php
//Starting session 
session_start();

//If session is not set then redirect to login page
if (!isset($_SESSION['username']))
{
    //Redirecting to login page
    header ("Location: login.php");

    //Stop script
    exit();
}

?>

<html lang = "en">
    <head>
        <meta charset = "UTF-8">
        <meta http-equiv = "x-UA-Compatible" content = "IE=edge">
        <meta name = "viewpoint" content = "width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>Student Registration Form</title>
    </head>

    <body>
        <!--Navigation Bar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark w-100">
            <div class="container">
                <a href="index.php" class="navbar-brand">
                    <img src="UTM-LOGO-FULL.png" alt="UTM Logo" width="120" height="40">
                </a>

                <!--Toggle Button for mobile navigation-->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-nav" aria-controls="main-nav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!--Navigation Bar Links-->
                <div class="collapse navbar-collapse justify-content-end align-center" id = "main-nav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="view.php">List Students</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="register.php">Add Student</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <h2 class="text-center mb-4">Student Registration Form</h2>

        <div class="container bg-white p-4 rounded shadow">
            <h3 class="text-center">Student Personal Details</h3>
            <form action="register.php" method="POST">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" id="name" name="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="studentID" class="form-label">Student ID</label>
                    <input type="text" id="studentID" name="studentID" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="telNo" class="form-label">Phone Number</label>
                    <input type="tel" id="telNo" name="telNo" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Gender</label><br>
                    <div class="form-check form-check-inline">
                        <input type="radio" id="male" name="gender" value="Male" class="form-check-input">
                        <label for="male" class="form-check-label">Male</label>
                    </div>
                    
                    <div class="form-check form-check-inline">
                        <input type="radio" id="female" name="gender" value="Female" class="form-check-input">
                        <label for="female" class="form-check-label">Female</label>
                    </div>
                </div>

                <h3 class="text-center">Academic Information</h3>
                <div class="mb-3">
                    <label for="program_study" class="form-label">Program of Study</label>
                    <select id="program_study" name="program_study" class="form-select">
                        <option value="none">-</option>
                        <option value="Software Engineering">Software Engineering</option>
                        <option value="Data Engineering">Data Engineering</option>
                        <option value="Network & Security">Network & Security</option>
                        <option value="Bioinformatics">Bioinformatics</option>
                        <option value="Graphic & Multimedia">Graphic & Multimedia</option>
                    </select>
                </div>

                <div class="d-flex justify-content-center gap-3">
                    <input type="reset" value="Reset" class="btn btn-secondary">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>

        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</html>

<?php

include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $name = $_POST['name'];
    $studentID = $_POST['studentID'];
    $email = $_POST['email'];
    $telNo = $_POST['telNo'];
    $gender = $_POST['gender'];
    $program_study = $_POST['program_study'];

    $sql = "INSERT INTO form (name, studentID, email, telNo, gender, program_study) VALUES ('$name', '$studentID', '$email', '$telNo', '$gender', '$program_study')";

    if (mysqli_query($conn, $sql))
    {
        echo "Student Details Information Successfully Submitted";
    }
    
    else
    {
        echo "Error: " . $sql . "<br" . mysqli_error($conn);
    }

}