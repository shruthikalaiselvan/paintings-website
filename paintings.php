<?php include('partials-front/menu.php'); ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="paintings-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL; ?>paintings-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for paintings.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="paintings-menu">
        <div class="container">
            <h2 class="text-center">Paintings Menu</h2>

            <?php 
                //Display Paintings that are Active
                $sql = "SELECT * FROM tbl_paintings WHERE active='Yes'";

                //Execute the Query
                $res=mysqli_query($conn, $sql);

                //Count Rows
                $count = mysqli_num_rows($res);

                //CHeck whether the paintings are availalable or not
                if($count>0)
                {
                    //paintings Available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //Get the Values
                        $id = $row['id'];
                        $title = $row['title'];
                        $description = $row['description'];
                        $price = $row['price'];
                        $image_name = $row['image_name'];
                        ?>
                        
                        <div class="paintings-menu-box">
                            <div class="paintings-menu-img">
                                <?php 
                                    //CHeck whether image available or not
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
                    //Food not Available
                    echo "<div class='error'>Painting not found.</div>";
                }
            ?>
           

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

   
    <?php include('partials-front/footer.php'); ?>