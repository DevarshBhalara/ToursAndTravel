<?php
    session_start();
    include "isloggedUser.php";
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
 
    /*$id = $_REQUEST['total'];
    $sel = "SELECT total,ref_pack_id,days_count,days_activity FROM day_wise_info WHERE ref_pack_id=".$id ; 
    $res = mysqli_query($conn,$sel);
    $row = mysqli_fetch_row($res);

    
                    
    if(isset($_GET['addDay']))
    {
        
        $qry ="INSERT INTO day_wise_info(ref_pack_id,days_count,days_activity) VALUES('$row[1]', '".$_GET['day']."' , '".$_GET['day_ac']."');" ;
        echo $qry;
        if(mysqli_query($conn,$qry))
        {
            echo $row[1];
        }
    }*/
    
    /*$sel = "SELECT total,ref_pack_id,days_count,days_activity FROM day_wise_info WHERE total=".$_REQUEST['total'] ;
    echo $sel;
    $res = mysqli_query($conn,$sel);
    $row = mysqli_fetch_row($res); */
   
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
                    <a class="navbar-brand" href="#">Logo</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                          <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="#">Contact Us</a>
                          </li>
                        
                          <li class="nav-item">
                            <a class="nav-link" href="#">About Us</a>
                          </li>

                          <li class="nav-item">
                            
                          </li>
                        </ul>
                        <form method="POST" class="d-flex">
                            <input type="submit" name="Logout" class="nav-link" value="logout" style="background-color: transparent;border: 0px solid #3498db;color:white;"> </input>
                        </form>
                    </div>
                </div>
            </nav>
        </header>


        <div class="container mt-5">

            <div class="row">
                <div class="" style="background-color: #f7f7f7;">

                    <form class="mt-4 mb-4" >
                        <h3 class="text-center"> Add Day information</h3>
                       
                        <div class="form">
                            <label class="form-label">Day </label>
                            <input type="text" name="day" class="form-control" placeholder="Day 1 ">
                        </div>
                        <div class="form mt-3">
                            <label class="form-label"> Day Activity </label>
                            <input type="text" name="day_ac" class="form-control" placeholder="Day activity">
                        </div>
                        
                        <div class="form mt-3 text-center" >
                            <input type="submit" name="addDay" class="btn btn-primary" value="Add Details">
                        </div> 
                    </form>
                   
                    
                   
                </div>
                
                
            </div>

        </div>

    </body>
</html>