<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>

        <br><br>

        <?php
            if(isset($_SESSION['add'])){ //checking whether the session is set or not
                echo $_SESSION['add']; //display the session message if set
                unset($_SESSION['add']); //removing session message
            }
        ?>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name:</td>
                    <td>
                        <input type="text" name="full_name" placeholder="Enter your name" required>
                    </td>
                </tr>

                <tr>
                    <td>Username:</td>
                    <td>
                        <input type="text" name="username" placeholder="Your username" required>
                    </td>
                </tr>

                <tr>
                    <td>Password: </td>
                    <td>
                        <input type="password" name="password" placeholder="Your password" required>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php include('partials/footer.php'); ?>

<?php
    //Process the value from form and save it in database
    //check whether the submit button is clicked or not
    if(isset($_POST['submit']))
    {
        // Button clicked
        //echo "Button clicked";

        //to get data from form
        $full_name=$_POST['full_name'];
        $username=$_POST['username'];
        $password=md5($_POST['password']); //password encryption with md5

        //sql query to save data into database
        $sql="INSERT INTO tbl_admin SET
            full_name='$full_name',
            username='$username',
            password='$password'
        ";

        //executing query and saving data into database
        $res = mysqli_query($conn, $sql) or die(mysqli_error());

        //check whether the data is inserted or not and display appropriate message
        if($res==TRUE)
        {
            //Data Inserted
            //echo "data inserted";
            //create a session variable to display message
            $_SESSION['add'] = "<div class='success'>Admin added successfully</div>";
            //redirect page to manage admin
            header("location:".SITEURL.'admin/manage-admin.php'); 
        }
        else{
            //failed
            //echo "failed";
            $_SESSION['add'] = "<div class='errpr'>Failed to add admin</div>";
            //redirect page to add admin
            header("location:".SITEURL.'admin/add-admin.php'); 
        }
    }