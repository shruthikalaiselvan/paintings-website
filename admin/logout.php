<?php
    //include constants.php for url
    include('../config/constants.php');

    //Destory the session 
    session_destroy(); //unset $_SESSION['user']

    //redirect to login page
    header('location:'.SITEURL.'admin/login.php');
?>