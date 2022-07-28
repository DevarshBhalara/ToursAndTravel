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
                      <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index_admin.php">Home</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link " href="addTour.php">Add Tour</a>
                      </li>
                     
                      <li class="nav-item">
                        <a class="nav-link" href="viewTour.php">View Tour</a>
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

        <div class="container mt-5">

            <div class="row">
                <div class="" style="background-color: #f7f7f7;">
                <?php 
                
                $id = $_REQUEST['hotel'];
                $qry = "SELECT total,ref_id_pack,pack_hotel_name,city,state FROM hotel_details WHERE total=".$id ;
                if($res = mysqli_query($conn,$qry))
                {
                    while($row = mysqli_fetch_row($res))
                    {
            ?>
                    <form class="mt-4 mb-4">
                        <h3 class="text-center"> Edit Hotel information</h3>
                        <input type="hidden" value="<?php echo $row[0]; ?>" name="total" />
                        
                        <input type="hidden" value="<?php echo $row[1]; ?>" name="tour" />

                        <div class="form">
                            <label class="form-label">Hotel Name </label>
                            <input type="text" name="hotel_name" value="<?php echo $row[2]; ?>" class="form-control" placeholder="Hotel Name ">
                        </div>
                        <div class="form mt-3">
                            <label class="form-label"> City</label>
                            <input type="text" name="city" value="<?php echo $row[3]; ?>" class="form-control" placeholder="Hotel State">
                        </div>
                        <div class="form mt-3">
                            <label class="form-label"> State</label>
                            <input type="text" name="state" value="<?php echo $row[4]; ?>" class="form-control" placeholder="Hotel State">
                        </div>
                        
                        <div class="form mt-3 text-center" >
                            <input type="submit" name="update" class="btn btn-primary" value="Edit Details">
                        </div> 
                        
                    </form>
                    <?php
                        }
                    }
                    
                    ?>
                </div>
                <?php
                    if(isset($_GET['update']))
                    {
                        $qry = "UPDATE hotel_details SET pack_hotel_name='".$_GET['hotel_name']."' , city='".$_GET['city']."' , state='".$_GET['state']."' WHERE total=".$_GET['total'] ;
                        //echo $qry;
                        if(mysqli_query($conn,$qry))
                        {
                            ?>
                            <script>
                                alert("Hotel Updated Successfully");
                                window.location.href = "viewAllHotel.php?hotel=<?php echo $_GET['tour']; ?>";
    
                            </script>
                            
                            <?php
                        }
                    }
                ?>
                
                
            </div>

        </div>

    </body>
</html>