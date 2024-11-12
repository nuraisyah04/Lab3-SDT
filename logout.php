<?php
// Start the session and check if a logout confirmation is required
session_start();

// Check if the logout request is confirmed
if (isset($_GET['confirm']) && $_GET['confirm'] == 'yes') 
{
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit();
} 

else 
{
    // If the user hasn't confirmed, show a confirmation prompt using JavaScript
    echo "<script>
        var userConfirmed = confirm('Are you sure you want to log out?');
        
        if (userConfirmed) 
        {
            window.location.href = 'logout.php?confirm=yes'; // Redirect to logout.php with confirmation
        } 
        else 
        {
            window.location.href = 'index.php'; 
        }
    </script>";
}
?>