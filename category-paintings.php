<?php include('partials-front/menu.php'); ?>

<?php 
        //CHeck whether id is passed or not
        if(isset($_GET['category_id']))
        {
            //Category id is set and get the id
            $category_id = $_GET['category_id'];
            // Get the CAtegory Title Based on Category ID
            $sql = "SELECT title FROM tbl_category WHERE id=$category_id";

            //Execute the Query
            $res = mysqli_query($conn, $sql);

            //Get the value from Database
            $row = mysqli_fetch_assoc($res);
            //Get the TItle
            $category_title = $row['title'];
        }
        else
        {
            //CAtegory not passed
            //Redirect to Home page
            header('location:'.SITEURL);
        }
?>

    <!-- painting sEARCH Section Starts Here -->
    <section class="paintings-search text-center">
        <div class="container">
            
            <h2>Paintings on <a href="#" class="text-white">"<?php echo $category_title; ?>"</a></h2>

        </div>
    </section>
    <!-- painting sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="paintings-menu">
        <div class="container">
            <h2 class="text-center">Paintings Menu</h2>

            <?php
            
                //Create SQL Query to Get foods based on Selected CAtegory
                $sql2 = "SELECT * FROM tbl_paintings WHERE category_id=$category_id";

                //Execute the Query
                $res2 = mysqli_query($conn, $sql2);
                
                //Count the Rows
                $count2 = mysqli_num_rows($res2);
                
                //CHeck whether food is available or not
                if($count2>0)
                {
                    //Painting is AVailable
                    while($row2=mysqli_fetch_assoc($res2))
                    {
                        $id = $row2['id'];
                        $title = $row2['title'];
                        $price = $row2['price'];
                        $description = $row2['description'];
                        $image_name = $row2['image_name'];
                        ?>

                            <div class="paintings-menu-box">
                                <div class="paintings-menu-img">
                                <?php 
                                    if($image_name=="")
                                    {
                                        //Image not Available
                                        echo "<div class='error'>Image not Available.</div>";
                                    }
                                    else
                                    {
                                        //Image Available
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/painting/<?php echo $image_name; ?>" alt="Girl" class="img-responsive img-curve">
                                        <?php
                                    }
                                ?>
                                </div>

                                <div class="paintings-menu-desc">
                                    <h4><?php echo $title; ?></h4>
                                    <p class="paintings-price">$<?php echo $price; ?></p>
                                    <p class="paintings-detail">
                                        <?php echo $description; ?>
                                    </p>
                                    <br>

                                    <a href="<?php echo SITEURL; ?>order.php?paintings_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                                </div>
                            </div>

                        <?php
                    }
                }
                else
                {
                    //Painting not available
                    echo "<div class='error'>Painting not Available</div>";
                }

            ?>



            


            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

<?php include('partials-front/footer.php'); ?>