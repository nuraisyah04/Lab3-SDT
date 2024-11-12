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

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="x-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>Update Student Details Information</title> 
    </head>

    <body>
        <!--Navigation Bar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a href="index.php" class="navbar-brand">
                    <img src="UTM-LOGO-FULL.png" alt="UTM Logo" width="120" height="40">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-nav" aria-controls="main-nav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="main-nav">
                    <ul class="navbar-nav">
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

        <h2 class="text-center mb-4">Update Student Details Information</h2>

        <?php
        include "db.php";
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "SELECT * FROM form WHERE id = $id";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
        }
        ?>

        <div class="container bg-white p-4 rounded shadow">
            <h3 class="text-center">Student Personal Details</h3>
            <form action="update.php?id=<?php echo $row['id']; ?>" method="POST">
                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="studentID" class="form-label">Student ID:</label>
                    <input type="text" class="form-control" id="studentID" name="studentID" value="<?php echo $row['studentID']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="telNo" class="form-label">Phone Number:</label>
                    <input type="tel" class="form-control" id="telNo" name="telNo" value="<?php echo $row['telNo']; ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Gender:</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="male" name="gender" value="Male" <?php echo ($row['gender'] == 'Male') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="male">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="female" name="gender" value="Female" <?php echo ($row['gender'] == 'Female') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="female">Female</label>
                    </div>
                </div>
                <h3 class="text-center">Academic Information</h3>
                <div class="mb-3">
                    <label for="program_study" class="form-label">Program of Study:</label>
                    <select class="form-select" id="program_study" name="program_study">
                        <option value="none" <?php echo ($row['program_study'] == 'none') ? 'selected' : ''; ?>>-</option>
                        <option value="Software Engineering" <?php echo ($row['program_study'] == 'Software Engineering') ? 'selected' : ''; ?>>Software Engineering</option>
                        <option value="Data Engineering" <?php echo ($row['program_study'] == 'Data Engineering') ? 'selected' : ''; ?>>Data Engineering</option>
                        <option value="Network & Security" <?php echo ($row['program_study'] == 'Network & Security') ? 'selected' : ''; ?>>Network & Security</option>
                        <option value="Bioinformatics" <?php echo ($row['program_study'] == 'Bioinformatics') ? 'selected' : ''; ?>>Bioinformatics</option>
                        <option value="Graphic & Multimedia" <?php echo ($row['program_study'] == 'Graphic & Multimedia') ? 'selected' : ''; ?>>Graphic & Multimedia</option>
                    </select>
                </div>
                <div class="d-flex justify-content-center gap-3">
                    <button type="reset" class="btn btn-secondary">Reset</button>
                    <button type="submit" class="btn btn-primary">Update Student Details</button>
                </div>
            </form>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $name = $_POST['name'];
                $studentID = $_POST['studentID'];
                $email = $_POST['email'];
                $telNo = $_POST['telNo'];
                $gender = $_POST['gender'];
                $program_study = $_POST['program_study'];
                $sql = "UPDATE form SET name='$name', studentID='$studentID', email='$email', telNo='$telNo', gender='$gender', program_study='$program_study' WHERE id=$id";
                if (mysqli_query($conn, $sql)) {
                    echo "<div class='alert alert-success mt-4 text-center'>Record updated successfully</div>";
                } else {
                    echo "<div class='alert alert-danger mt-4 text-center'>Error: " . mysqli_error($conn) . "</div>";
                }
            }
            ?>
        </div>
        

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
