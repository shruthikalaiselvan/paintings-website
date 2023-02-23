<?php include('../config/constants.php')?>

<html>
    <head>
        <title>Login - Paintings Order System</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>
    <body style="background-color: grey;">
        <div class="login" style="background-image: linear-gradient(to right top, #d16ba5, #c777b9, #ba83ca, #aa8fd8, #9a9ae1, #8aa7ec, #79b3f4, #69bff8, #52cffe, #41dfff, #46eefa, #5ffbf1);">
            <h1 class="text-center">Login</h1>
            <br><br>

            <?php
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }   
                
                if(isset($_SESSION['no-login-message']))
                {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }
            ?>
            <br><br>

            <!--login form -->
            <form action="" method="POST" class="text-center">
                Username: 
                <input type="text" name="username" placeholder="Enter username"><br><br>

                Password: 
                <input type="password" name="password" placeholder="Enter Password"><br><br>

                <input type="submit" name="submit" value="Login" class="btn-primary">
                <br><br>
            </form>

            <p class="text-center">Created By Shruthi K</p>
        </div>
    </body>
</html>

<?php

    //check whether the submit button is clicked or not
    if(isset($_POST['submit']))
    {
        //process for login
        //get the data from login form
        //$username = $_POST['username'];
        //$password = md5($_POST['password']);
        $username = mysqli_real_escape_string($conn,$_POST['username']);
        $raw_password = md5($_POST['password']);
        $password = mysqli_real_escape_string($conn,$raw_password);

        //csql to check whether the user with username and password exists or not
        $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

        //execute the query
        $res = mysqli_query($conn, $sql);

        //count rows to check whether the user exists or not
        $count = mysqli_num_rows($res);

        if($count==1){
            //user available
            $_SESSION['login'] = "<div class='success'>Login Successful</div>";

            $_SESSION['user'] = $username; //to check whether the user is logged in or not and logout will unset it

            //redirect to home page or dashboard
            header('location:'.SITEURL.'admin/');
        }
        else
        {
            $_SESSION['login'] = "<div class='error text-center'>Username or Password did not match </div>";
            //redirect to home page or dashboard
            header('location:'.SITEURL.'admin/login.php');
        }
    }
?>