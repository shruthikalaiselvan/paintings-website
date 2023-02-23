<?php include('partials-front/menu.php'); ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="paintings-search text-center">
        <div class="container">
            <?php
            
                //Get the Search Keyword
                //$search = $_POST['search'];
                $search = mysqli_real_escape_string($conn,$_POST['search']);

            ?>
            
            <h2>Paintings on Your Search <a href="#" class="text-white">"<?php echo $search; ?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="paintings-menu">
        <div class="container">
            <h2 class="text-center">Paintings Menu</h2>

            <?php
                //SQL Query to get paintings based on search keyword

                $sql = "SELECT * FROM tbl_paintings WHERE title LIKE '%$search%' OR description LIKE '%$search%'";

                //Execute the Query
                $res = mysqli_query($conn, $sql);

                //Count Rows
                $count = mysqli_num_rows($res);

                //Check whether food available of not
                if($count>0)
                {
                    //Painting Available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //Get the details
                        $id = $row['id'];
                        $title = $row['title'];
                        $price = $row['price'];
                        $description = $row['description'];
                        $image_name = $row['image_name'];
                        ?>

                            <div class="paintings-menu-box">
                                <div class="paintings-menu-img">
                                    <?php

                                        // Check whether image name is available or not
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

                                    <a href="#" class="btn btn-primary">Order Now</a>
                                </div>
                            </div>

                        <?php
                    }
                }
                else
                {
                    //Painitng Not Available
                    echo "<div class='error'>Painting not found.</div>";
                }

            
            ?>






            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>