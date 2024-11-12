<html lang = "en">
    <head>
        <meta charset = "UTF-8">
        <meta http-equiv = "x-UA-Compatible" content = "IE=edge">
        <meta name = "viewpoint" content = "width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>Login</title>
    </head>

    <body class="container d-flex flex-column align-items-center justify-content-center text-center" style="min-height: 70vh;">
        <!--Buat guna cara mcm buat card-->
        <div class="card shadow-lg p-4" style="width: 100%; max-width: 400px;">
            <div class="card-body">
                <h2 class="card-title text-center mb-4">Login</h2>

                <form action = "login.php" method = "POST">
                    <div class = "mb-3 text-start">
                        <label for = "username" class = "form-label">Username: </label><br>
                        <input type = "text" id = "username" name = "username" class = "form-control" required><br>
                    </div>

                    <div class = "mb-3 text-start">
                        <label for = "password" class = "form-label">Password: </label><br>
                        <input type = "password" id = "password" name = "password" class = "form-control" required><br>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>

                <div class="text-center mt-3">
                    <a href = "register_acc.php" class = "text-decoration-none">Don't have an account? Register here</a>
                </div>
            </div>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>

</html> 

<?php
//Starting session
session_start();

//Using database connection file here
include "db.php";

//Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    //Get the username value from the form 
    $username = mysqli_real_escape_string($conn, $_POST['username']);

    //Get the password value form the form
    $password = $_POST ['password'];

    //Query the database for username
    $sql = "SELECT  * FROM form_reg WHERE username = '$username' ";

    //Run the query 
    $result = mysqli_query($conn, $sql);

    //Check if the user exists
    if (mysqli_num_rows($result) == 1)
    {
        //Get the data from the database
        $row = mysqli_fetch_assoc($result);

        //Check if the password matches
        if (password_verify($password, $row['password']))
        {
            //Set the session variable
            $_SESSION['username'] = $username; 

            //Redirect to the homepage
            header("Location: index.php");
        }

        //If the password doesn't match
        else 
        {
            //Display an error message
            echo "Invalid username or password";
        }
    }

    //If the user doesn't exixst
    else
    {
        //Display an error message
        echo "No user found with with that username";
    }
}

?>