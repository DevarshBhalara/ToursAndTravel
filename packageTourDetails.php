<?php
    include "db_connect.php";
    $conn = mysqli_connect($servername,$username,$password,$dbname);
    if(!$conn){
        echo "Error in Connecting";
    }
    //echo $_REQUEST["tourid"];

    if(isset($_POST['logout'])){
        session_destroy();
        header("Location:login.php");
    }

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        
        <!--<link rel="shortcut icon" type="image/png" href="img/favicon.png"> -->
        <link href="css/bootstrap.min.css" rel="stylesheet" >
        <script src="js/bootstrap.bundle.min.js" ></script>
        <script src="umd/popper.min.js" ></script>
        <script src="js/bootstrap.min.js" ></script>
        <link rel="stylesheet" href="css/style2.css">
        
        <title>KING Tours and Travels</title>
       
       
       <style>
           
       </style>
    </head>
    <body style="margin-bottom: 200px;">

    <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
                <div class="container-fluid">
                  <a class="navbar-brand" href="#"> <img heigth="10px" width="50px" src="logo-white.png" /> </a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                      <li class="h nav-item">
                        <a class="nav-link" aria-current="page" href="index_user.php" >Home</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="contact_us.html">Contact Us</a>
                      </li>
                     
                      <li class="aa nav-item">
                        <a class="nav-link" href="about_us.html">About Us</a>
                      </li>
                      <li class="r nav-item">
                        <a class="nav-link" href="user_review.php">Add Review</a>
                      </li>
                    </ul>
                    <form class="d-flex">
                      
                      <button class="btn btn-primary"  type="submit">Logout</button>
                    </form>
                  </div>
                </div>
              </nav>
        </header>

        <?php
        
            $qry = "SELECT pack_tour_name,
                            pack_tour_date,
                            pack_days,
                            pack_price,
                            pack_pickup_point,
                            pack_drop_point,
                            pack_other_notes,
                            package_image FROM package_tour WHERE pack_tour_id='".$_REQUEST['tourid']."';  ";
            $res = mysqli_query($conn,$qry);
            if($row = mysqli_fetch_row($res))
            {
        ?>


        <section class="container mt-5">
            <div class="card">
                <?php 
                    if($row[7]==null)
                    {
                ?>
                        <img src="img/index_bg.jpg" class="card-img-top mx-auto" style="padding: 2%;" alt="Tour Image">
                <?php    
                    }else{
                        echo "<img class='card-img img-fluid ali' style='padding: 2%;' src='data:image/jpg;base64," .base64_encode($row[7]). "'>";
                    }
                ?>
                <!--<img src="img/index_bg.jpg" class="card-img-top mx-auto" style="padding: 2%;" alt="Tour Image">-->
                <div class="card-body">

                    <h3 class="card-title text-center" style="text-transform: uppercase;"> <b> <?php echo $row[0]; ?> </b>  </h3>

                    <p class="card-text"> <b>Date : </b> <?php echo $row[1]; ?> </p>

                    <p class="card-text"> <b>Total Days in Tour :</b> <?php echo $row[2]; ?> </p>

                    <p class="card-text"> <b>Package Price : </b> <?php echo $row[3]; ?> </p>

                    <p class="card-text"> <b> Pick up Point of Tour : </b> <?php echo $row[4]; ?></p>

                    <p class="card-text"> <b>Drop point Point of Tour : </b> <?php echo $row[5]; ?> </p>

                    <p class="card-text"> <b>Other Notes Related Tour :</b> <?php echo $row[6]; ?></p>

                    <div  style="border: 1px solid black; padding: 20px;">

                        <h3 class="card-text text-center" style="text-transform: uppercase;"> Day Wise Detail of Tour </h3>

                       
                        <div>

                            <table class="table table-striped  text-center mt-4" >
                                
                                <tr>
                                    <th scope="col">Day</th>
                                    <th scope="col"> Activity</th>
                                </tr>

                                <?php                          
                                    $qry_day = "SELECT days_count,days_activity FROM day_wise_info WHERE ref_pack_id=".$_REQUEST['tourid'];
                                    //echo $qry_day;
                                    $res_day = mysqli_query($conn,$qry_day);
                                    while($row_day = mysqli_fetch_row($res_day))
                                    {
                                ?>
                                <tr>
                                    <th> <?php echo $row_day[0]; ?> </th>
                                    <td> <?php echo $row_day[1]; ?> </td>
                                <tr>
                                <?php                 
                                    }
                                ?>

                            </table>

                        </div>
                       
                    </div>
                   


                    <div class="mt-5" style="border: 1px solid black; padding: 20px;">
                        <h3 class="card-text text-center" style="text-transform: uppercase;"> Hotel details </h3>

                        <div>

                            <table class="table table-striped  text-center mt-4" >
                                
                                <tr>
                                    <th scope="col">Hotel Name </th>
                                    <th scope="col"> City</th>
                                    <th scope="col"> State</th>
                                </tr>
                                <?php
                                    $qry_hotel = "SELECT pack_hotel_name,city,state FROM hotel_details WHERE ref_id_pack=".$_REQUEST['tourid'];
                                    //echo $qry_hotel;
                                    $res_hotel = mysqli_query($conn,$qry_hotel);
                                    while($row_hotel=mysqli_fetch_row($res_hotel))
                                    {
                                
                                ?>
                                
                                <tr>
                                    <td> <?php echo $row_hotel[0]; ?> </td>
                                    <td> <?php echo $row_hotel[2]; ?> </td>
                                    <td> <?php echo $row_hotel[1]; ?> </td>
                                </tr>
                                <?php
                                    }
                                ?>
                            
                            </table>

                        </div>
                    </div>

                  <!--<a href="#" class="btn btn-primary">Go somewhere</a>-->
                </div>
              </div>
        </section>

        <?php
            }
        ?>
    </body>
</html>