<?php
include "db.php";

// Check if an ID is provided
if(isset($_GET['id'])){
    $id = $_GET['id'];

    // Check if the user has already confirmed the deletion
    if (isset($_GET['confirm']) && $_GET['confirm'] == 'yes') 
    {
        // Proceed with deletion if confirmed
        $sql = "DELETE FROM form WHERE id='$id'";
        $result = mysqli_query($conn, $sql);

        if($result)
        {
            echo "<script>alert('Student Information Deleted Successfully'); window.location='view.php';</script>";
        } 
        else 
        {
            echo "<script>alert('Student Information Not Deleted'); window.location='view.php';</script>";
        }
    } 
    
    else 
    {
        // If confirmation is not yet given, ask for confirmation using JavaScript
        echo "<script>
            var userConfirmed = confirm('Are you sure you want to delete this student record?');

            if (userConfirmed) 
            {
                // Redirect with the 'confirm' parameter to confirm the deletion
                window.location.href = 'delete.php?id=$id&confirm=yes';
            } 
            else 
            {
                window.location.href = 'view.php';
            }
        </script>";
    }
}
?>