<?php
    //include the constants.php file here
    include('../config/constants.php');

    //get the id of admin to be deleted
    $id = $_GET['id'];
    //create sql query to delete admin
    $sql = "DELETE FROM tbl_admin WHERE id=$id";
    //execute the query
    $res = mysqli_query($conn, $sql);
    //redirect to managae admin page with message(success/error)

    if($res == TRUE)
    {
        //query executed successfully and admin deleted
        //echo "Admin Deleted";
        //create session variable to display message 
        $_SESSION['delete'] = "<div class='success'>Admin deleted successfully</div>";
        //redirect to manage admin page
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
    else
    {
        //failed to delete admin
        //echo "Failed to delete Admin";
        $_SESSION['delete'] = "<div class='error'>Failed to delete admin. Try again later.</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
    }

    //check whether the query executed successfully or not
?>