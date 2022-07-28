<?php
    session_start();
    include "islogged.php";
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
   
    </head>
    <body style="margin-bottom: 200px;">
<section class="sec"> 
        
        <?php 
        
        $qry = "SELECT pack_tour_id,pack_tour_name,pack_tour_date,pack_days,pack_price FROM package_tour";
        if($r=mysqli_query($conn,$qry))
        {
          while($row=mysqli_fetch_row($r))
          {
        ?>

        <section class="container mt-5 col-sm">
            
          <div class="container">
            <div class="card">
                <div class="row no-gutters">
                    <div class="col-sm-5 img-fluid my-auto">
                        <img class="card-img img-fluid ali  " src="tourism.jpg" alt="Tour Img">
                    </div>
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row[1]; ?></h5>
                            <p class="card-text"> <b>Date :</b> <?php echo $row[2] ?> </p>
                            <p class="card-text"> <b>Total Days :</b>  <?php echo $row[3]; ?> </p>
                            <p class="card-text"> <b>Package Price :</b>  <?php echo $row[4]; ?></p>
                            <a href="packageTourDetails.php?tourid=<?php echo $row[0]; ?>" class="btn btn-primary mt-2"> View Full Details </a>
                            <a href="editTour.php?packid=<?php echo $row[0]; ?>" class="btn btn-primary mt-2"> Edit Main Information </a><br>  
                            <a href="viewAllDay.php?day=<?php echo $row[0]; ?>" class="btn btn-primary mt-2"> Edit Day wise Information </a>
                            <a href="viewAllHotel.php?hotel=<?php echo $row[0]; ?>" class="btn btn-primary mt-2">Edit Hotel Details </a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        </section>
        <?php
        
            
          }
        }
        ?>

        <section class="container mt-4">
          <div>
            <a href="index_admin.php"> <input type="button" name="Back" class="btn btn-primary" value="Back" > </a>
          </div>
        </section>

      </section>

    </body>
</html>