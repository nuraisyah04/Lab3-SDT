<html lang = "en">
    <head>
        <meta charset = "UTF-8">
        <meta http-equiv = "x-UA-Compatible" content = "IE=edge">
        <meta name = "viewpoint" content = "width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>Create Account</title>
    </head>

    <body class="container d-flex flex-column align-items-center justify-content-center text-center" style="min-height: 70vh;">
        <!--Buat guna cara mcm buat card-->
        <div class="card shadow-lg p-4" style="width: 100%; max-width: 400px;">
            <div class="card-body">
                <h2 class="card-title text-center mb-4">Create Account</h2>

                <form action="register_acc.php" method="POST">
                    <div class="mb-3 text-start">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" id="username" name="username" class="form-control" required>
                    </div>

                    <div class="mb-3 text-start">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password" class="form-control" required>
                    </div>

                    <br>

                    <button type="submit" class="btn btn-primary w-100">Register</button>
                </form>

                <div class="text-center mt-3">
                    <a href="login.php" class="text-decoration-none">Already have an account? Login here</a>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </body>

</html>

<?php
//Uisng database connection file here
include "db.php";

//Using database connection here
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Get the username value from the form 
    $username = mysqli_real_escape_string($conn, $_POST['username']);

    //Get the password value from the form
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO form_reg (username, password) VALUES ('$username', '$password')";

    if (mysqli_query($conn, $sql))
    {
        echo "New record created successfully";
    }

    else 
    {
        echo "Error: " . sql . "<br>" . mysqli_error($conn);
    }

}

?>