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
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        
        <!--<link rel="shortcut icon" type="image/png" href="img/favicon.png"> -->
        <link href="css/bootstrap.min.css" rel="stylesheet" >
        <script src="js/bootstrap.bundle.min.js" ></script>
        <script src="umd/popper.min.js" ></script>
        <script src="js/bootstrap.min.js" ></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/style2.css">
        
        <title>KING Tours and Travels</title>
       
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script>
       
        </script>
       <style>
           
       </style>
    </head>
    <body style="margin-bottom: 200px;">
<section class="sec"> 
         <header>
         <nav class="navbar navbar-expand-lg navbar-dark bg-success">
                <div class="container-fluid">
                  <a class="navbar-brand" href="#"> <img heigth="10px" width="50px" src="logo-white.png" /> </a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                      <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index_admin.php">Home</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link " href="addTour.php">Add Tour</a>
                      </li>
                     
                      <li class="nav-item">
                        <a class="nav-link active" href="viewTour.php">View Tour</a>
                      </li>

                      <li class="nav-item">
                        <a class="nav-link" href="editAdminProfile.php">Edit Profile</a>
                      </li>
                     
                    </ul>
                    <form class="d-flex" method="post">
                      
                      <input class="btn btn-primary" type="submit" name="logout" value="logout">
                    </form>
                  </div>
                </div>
              </nav>
        </header>


        <?php 
        
        $qry = "SELECT pack_tour_id,pack_tour_name,pack_tour_date,pack_days,pack_price,package_image FROM package_tour";
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
                    <?php 

                        if($row[5]==null)
                        {

                            echo "<img class='card-img img-fluid ali' src='tourism.jpg' alt='not added'>";

                        }else{

                            echo "<img class='card-img img-fluid ali' src='data:image/jpg;base64," .base64_encode($row[5]). "'>";
                        }
                        ?>
                    </div>
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row[1]; ?></h5>
                            <p class="card-text"> <b>Date :</b> <?php echo $row[2] ?> </p>
                            <p class="card-text"> <b>Total Days :</b>  <?php echo $row[3]; ?> </p>
                            <p class="card-text"> <b>Package Price :</b>  <?php echo $row[4]; ?></p>
                            <a href="viewfullDetailAdmin.php?tourid=<?php echo $row[0]; ?>" class="btn btn-primary mt-2"> View Full Details </a>
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