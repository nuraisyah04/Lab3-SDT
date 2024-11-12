<?php
// Starting session
session_start();

// If session is not set then redirect to login page
if (!isset($_SESSION['username'])) {
    // Redirecting to login page
    header("Location: login.php");

    // Stop script
    exit();
}
?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="x-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>Student Details</title>
    </head>

    <body class="bg-light d-flex flex-column align-items-center">
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

        <h2 class="text-center mb-4">Student Details List</h2>

        <div class="container bg-white p-4 rounded shadow">
            <div class = "table-responsive">
                <table class="table table-bordered table-hover text-center">
                    <thead class="table-primary">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Student ID</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Gender</th>
                            <th>Program Study</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        // Include database connection
                        include "db.php";

                        $sql = "SELECT * FROM form";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>". $row['id'] . "</td>";
                                echo "<td>". $row['name'] . "</td>";
                                echo "<td>". $row['studentID'] . "</td>";
                                echo "<td>". $row['email'] . "</td>";
                                echo "<td>". $row['telNo'] . "</td>";
                                echo "<td>". $row['gender'] . "</td>";
                                echo "<td>". $row['program_study'] . "</td>";
                                echo "<td><a href='update.php?id=". $row['id'] . "' class='btn btn-sm btn-warning'>Edit</a></td>";
                                echo "<td><a href='delete.php?id=". $row['id'] . "' class='btn btn-sm btn-danger'>Delete</a></td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='9' class='text-center'>No Data Found</td></tr>";
                        }
                        ?>

                    </tbody>
                </table>   
            </div>

        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
