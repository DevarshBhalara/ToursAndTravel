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

    if(isset($_POST['addData'])){
        $qry="INSERT INTO one_to_one (
                one_to_one_source,
                one_to_one_destination,
                price,
                stops,
                date,
                other_notes,
                pick_up_address,
                drop_address,
                max_passenger) VALUE(
                    '".$_POST['from']."',
                    '".$_POST['to']."',
                    '".$_POST['price']."',
                    '".$_POST['stops']."',
                    NOW(),
                    '".$_POST['notes']."',
                    '".$_POST['p_address']."',
                    '".$_POST['d_address']."',
                    '".$_POST['max']."'
                );";

        if(mysqli_query($conn,$qry)){
            
            header("Location:index_admin.php?status=1");
        }else{
            header("Location:index_admin.php?status=0");
        }
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

        <section class="container mt-5">

            <div class="row">
                <div class="col-md" style="background-color: #f7f7f7;">
                    <form class="mt-4 mb-4" method="POST">

                        <div class="form mt-3">
                            <label class="form-label">From </label>
                            <input type="text" name="from" class="form-control" placeholder="Eg. Rajkot">
                        </div>
                        <div class="form mt-3">
                            <label class="form-label">To </label>
                            <input type="text" name="to"class="form-control" placeholder="Eg. Ahmedabad">
                        </div>
                        <div class="form mt-3">
                            <label class="form-label">Stops </label>
                            <input type="text" name="stops" class="form-control" placeholder="Eg. chotila,surendranagar">
                        </div>
                        <div class="form mt-3">
                            <label class="form-label"> Select Date For Tour </label>
                            <input type="datetime-local" name="datetime" class="form-control" placeholder="2022-02-14 10:00PM">
                        </div>
                        <div class="form mt-3">
                            <label class="form-label"> Total Time to reach Destination </label>
                            <input type="text" name="totaltime" class="form-control" placeholder="Eg. 5 hours">
                        </div>
                        <div class="form mt-3">
                            <label class="form-label"> Price </label>
                            <input type="text" name="price" class="form-control" placeholder="Eg. 600/person">
                        </div>
                        
                        <div class="form mt-3">
                            <label class="form-label"> Package Pick up Point(Full address) </label>
                            <textarea class="form-control" name="p_address" placeholder="Eg. Limba chowk office, rajkot" rows="3"></textarea>
                        </div>
                        <div class="form mt-3">
                            <label class="form-label"> Package Drop Point(Full address) </label>
                            <textarea class="form-control" name="d_address" placeholder="Eg. Limba chowk office, rajkot" rows="3"></textarea>
                        </div>
                        <div class="form mt-3">
                            <label class="form-label"> Max Passenger </label>
                            <input type="text" name="max" class="form-control" placeholder="Eg. 40">
                        </div>
                        <div class="form mt-3">
                            <label class="form-label"> Package Other Notes </label>
                            <textarea class="form-control" name="notes" placeholder="do this things at your own risk etc.." rows="3"></textarea>
                        </div>
                        <div class="form text-center mt-3">
                            <button type="submit" name="addData" class="btn btn-primary btn-block"> Add Data  </button>
                        </div> 
                        

                                                                              
                    </form>
                </div>
                
               
            </div>

        </section>

    </body>
</html>