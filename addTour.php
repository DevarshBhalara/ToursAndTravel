<?php
    session_start();
    include "islogged.php";
    include "db_connect.php";
    $conn = mysqli_connect($servername,$username,$password,$dbname);
    if(!$conn){
        echo "Error in Connecting";
    }

   /* if(isset($_POST['addDay']))
    {
        if(!isset($_SESSION['packid']))
        {
            echo "<script type='text/javascript'> alert('Please, Add Tour first!'); </script>";
        }
        else{
            header('Location: addDayHotel.php');
        }

    }*/

    if(isset($_POST['addTour']))
    {
        $tourName=$_POST["packageName"];
        $tourDate=$_POST["packageDate"];
        $tourDays=$_POST["packageDays"];
        $tourPrice=$_POST["packagePrice"];
        $tourPlaces=$_POST["packagePlaces"];
        $tourPick=$_POST["packagePickUpAdd"];
        $tourDrop=$_POST["packageDropAdd"];
        $tourMax=$_POST["packageMaxPess"];
        $tourNote=$_POST["packageNotes"];
        $whenCreated = date('Y/m/d H:i:s');
        $qry = "INSERT INTO package_tour (pack_tour_name,
                                        date_when_created,
                                        pack_tour_date,
                                        pack_days,
                                        pack_price,
                                        pack_pickup_point,
                                        pack_drop_point,
                                        pack_other_notes,
                                        pack_max_passenger,
                                        pack_main_places)
                                VALUES( '".$tourName."',
                                        '".$whenCreated."',
                                        '".$tourDate."',
                                        '".$tourDays."',
                                        '".$tourPrice."',
                                        '".$tourPick."',
                                        '".$tourDrop."',
                                        '".$tourNote."',
                                        '".$tourMax."',
                                        '".$tourPlaces."' ); ";
        //echo $qry;
        if(mysqli_query($conn,$qry)){
            //echo "Added";
            $qry = "SELECT pack_tour_id FROM package_tour WHERE date_when_created='$whenCreated' ; ";
         
            //echo $qry;
            if($res = mysqli_query($conn,$qry))
            {
                if($row=mysqli_fetch_row($res)){

                    //echo "<script type='text/javascript'> alert('Tour Added Now you can Add Days using Below button'); </script>";
                    $_SESSION['packid'] = $row[0];
                    if(!isset($_SESSION['packid']))
                    {
                        echo "<script type='text/javascript'> alert('Please, Add Tour first!'); </script>";
                    }
                    else{
                        header('Location: addDayHotel.php');
                    }
                    
                    
                }else{
                    echo "Problem in fetch";
                }
            }
            else{
                echo "problem in exe";
            }
        }else{
            //echo "not";
        }
    }

    if(isset($_POST['addDay']))
    {
        
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
                        <a class="nav-link active" href="addTour.php">Add Tour</a>
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
                <div class="col-lg" style="background-color: #f7f7f7;">
                    <form class="mt-4 mb-4"  method="POST">

                        <div class="form">
                            <label class="form-label">Tour name</label>
                            <input type="text" class="form-control" name="packageName" placeholder="Eg. Manali" required>
                        </div>
                        <div class="form mt-3">
                            <label class="form-label"> Select Date For Tour </label>
                            <input type="datetime-local" class="form-control" name="packageDate" placeholder="2022-02-14 10:00PM" required>
                        </div>
                        <div class="form mt-3">
                            <label class="form-label"> Tour Days </label>
                            <input type="text" class="form-control" name="packageDays" placeholder="Eg. 10 Days" required>
                        </div>
                        <div class="form mt-3">
                            <label class="form-label"> Package Price </label>
                            <input type="text" class="form-control" name="packagePrice" placeholder="Eg. 10000/person" required>
                        </div>
                        <div class="form mt-3">
                            <label class="form-label"> Package Main Places </label>
                            <input type="text" class="form-control" name="packagePlaces" placeholder="Eg. Manali,kullu,rohtang,delhi" required>
                        </div>
                        <div class="form mt-3">
                            <label class="form-label"> Package Pick up Point(Full address) </label>
                            <textarea class="form-control" name="packagePickUpAdd" placeholder="Eg. Limba chowk office, rajkot" rows="3" required></textarea>
                        </div>
                        <div class="form mt-3">
                            <label class="form-label"> Package Drop Point(Full address) </label>
                            <textarea class="form-control" name="packageDropAdd" placeholder="Eg. Limba chowk office, rajkot" rows="3" required></textarea>
                        </div>
                        <div class="form mt-3">
                            <label class="form-label"> Max Passenger </label>
                            <input type="text" class="form-control" name="packageMaxPess" placeholder="Eg. 40">
                        </div>
                        <div class="form mt-3">
                            <label class="form-label"> Package Other Notes </label>
                            <textarea class="form-control" name="packageNotes" placeholder="do this things at your own risk etc.." rows="3" required></textarea>
                        </div>
                       

                        <div class="form text-center mt-3">
                            <button type="submit" name="addTour" class="btn btn-primary btn-block"> Add Tour Data  </button>
                        </div> 

                        
                                                                        
                    </form>

                   

                </div>

              
                <!--
                <div class="col-lg" style="background-color: #f7f7f7; margin-left: 1%;">
                    <h3>Day wise Details </h3>
                    <form class="mt-4 mb-4" action="searchResultTour.php" method="POST">
                        <div class="form-group">
                            <label class="form-label">Day and Time</label>
                            <input type="text" name="day" class="form-control" placeholder="Eg. Day 1 / 10:00AM">
                        </div>
                        <div class="form-group mt-3">
                            <label class="form-label"> Day Activity </label>
                            <input type="text" name="activity" class="form-control" placeholder="We will do Manali Darshan">
                        </div>
                        <div class="form-group text-center mt-4">
                            <button type="submit" name="search" class="btn btn-primary btn-block"> Add Day  </button>
                        </div>  
                    </form> 
                </div> -->
            </div>

        </section>
    </section>
    </body>
</html>