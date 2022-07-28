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
    <body  style="margin-bottom: 200px;">

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
                
                    $id = $_REQUEST['day'];
                    $qry = "SELECT total,ref_pack_id,days_count,days_activity FROM day_wise_info WHERE total=".$id ; 
                    if($res = mysqli_query($conn,$qry))
                    {
                        while($row = mysqli_fetch_row($res))
                        {
                ?>
                    <form class="mt-4 mb-4" >
                        <h3 class="text-center"> Edit Day wise information</h3>
                        <input type="hidden" name="total" value="<?php echo $row[0]; ?>" />
                        <input type="hidden" name="tour" value="<?php echo $row[1]; ?>" />
                        <div class="form">
                            <label class="form-label">Day </label>
                            <input type="text" name="day" class="form-control" value="<?php echo $row[2]; ?>" placeholder="Day 1 ">
                        </div>
                        <div class="form mt-3">
                            <label class="form-label"> Day Activity </label>
                            <input type="text" name="day_ac" class="form-control" value="<?php echo $row[3]; ?>" placeholder="Day activity">
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
                        $qry = "UPDATE day_wise_info SET days_count='".$_GET['day']."' , days_activity='".$_GET['day_ac']."' WHERE total=".$_GET['total'] ;
                        echo $qry;
                        if(mysqli_query($conn,$qry))
                        {
                            ?>
                            <script>
                                alert("Day Updated");
                                window.location.href = "viewAllDay.php?day=<?php echo $_GET['tour']; ?>";
    
                            </script>
                            
                            <?php
                        }
                    }
                ?>
                
            </div>

        </div>

    </body>
</html>