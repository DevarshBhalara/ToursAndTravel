<?php
    session_start();
    include "islogged.php";
    include "db_connect.php";
    $conn = mysqli_connect($servername,$username,$password,$dbname);
    if(!$conn){
        echo "Error in Connecting";
    }
    if(isset($_POST['finalAdd'])){
        //echo "inside if";
        unset($_SESSION['packid']);
        //echo $_SESSION['packid'];
        header('Location: index_admin.php');
      }else{
        //echo $_SESSION['packid'];
      }
   /* if(isset($_POST['addTour']))
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
        $qry = "INSERT INTO package_tour (pack_tour_name,date_when_created,
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
            $qry = "SELECT pack_tour_id FROM package_tour WHERE date_when_created='$whenCreated' ; ";
            //echo $qry;
            if($res = mysqli_query($conn,$qry))
            {
                if($row=mysqli_fetch_row($res)){
                    //echo $row[0];
                }else{
                    echo "Problem in fetch";
                }
            }
            else{
                echo "problem in exe";
            }
        }else{
            echo "not";
        }
    }*/
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
       <script>
    	
    	function verify(){
        	return confirm('Are you sure ?');
        }
        
    </script>
    <script type="text/javascript">
          window.history.forward();
          function noBack() {
              window.history.forward();
          }
        </script>
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
        <?php

            if(isset($_SESSION['packid']))
            {

        ?>
                <section class="container mt-5">
                    <div class="row">
                        <div class="col-lg" style="background-color: #f7f7f7;">
                        
                            <h3>Day wise Details </h3>
                            <form class="mt-4 mb-4" method="POST">
                                <div class="form-group">
                                    <label class="form-label">Day and Time</label>
                                    <input type="text" name="day" class="form-control" placeholder="Eg. Day 1 / 10:00AM">
                                </div>
                                <div class="form-group mt-3">
                                    <label class="form-label"> Day Activity </label>
                                    <input type="text" name="activity" class="form-control" placeholder="We will do Manali Darshan">
                                </div>
                                <div class="form-group text-center mt-4">
                                    <button type="submit" name="addDay" class="btn btn-primary btn-block"> Add Day  </button>
                                </div>  
                            </form> 
                        </div>
                    </div>
                </section>
       
                <section class="container mt-5">
                    <div class="row">
                        <div class="col-lg" style="background-color: #f7f7f7;">
                            <h3>Hote Details </h3>
                            <form class="mt-4 mb-4" method="POST">
                                <div class="form-group">
                                    <label class="form-label">Hotel name</label>
                                    <input type="text" name="hotelName" class="form-control" placeholder="Hotel Hollywood">
                                </div>
                                <div class="form-group mt-3">
                                    <label class="form-label"> City </label>
                                    <input type="text" name="hotelCity" class="form-control" placeholder="Eg. Manali">
                                </div>
                                <div class="form-group mt-3">
                                    <label class="form-label"> State </label>
                                    <input type="text" name="hotelState" class="form-control" placeholder="Eg. Uttrakhand">
                                </div>
                                <div class="form-group text-center mt-4">
                                    <button type="submit" name="addHotel" class="btn btn-primary btn-block"> Add Hotal  </button>
                                </div>  
                            </form>   
                        </div>
                    </div>
                </section>

                <section class="container mt-3">
                    <div class="row">
                        <form method="POST" enctype="multipart/form-data">
                            <div class="form mt-3">
                                    <label class="form-label"> Image for tour </label>
                                    <input type="file" class="form-control" name="fileToUpload" id="fileToUpload" >
                                    <button type="submit" name="ImageAdd" class="btn btn-primary btn-block mt-5"> Click Here to Upload </button>
                            </div>
                        </form>
                    </div>
                </section>
                
                <section class="container mt-3">
                    <div class="row">
                        <form method="POST" onsubmit="return verify()">
                            <div class="form-group text-center mt-4">
                                    <button type="submit" name="finalAdd" class="btn btn-primary btn-block"> After Adding Days and Hotel information Click here </button>
                            </div> 
                        </form>
                    </div>
                </section>

        <?php
        
            }else{
                echo "<script type='text/javascript'> alert('Please! Go back and Tour First'); </script>";
            }
        ?>

        <?php
        
            if(isset($_POST['addDay']))
            {
                $qry="INSERT INTO day_wise_info(ref_pack_id,days_count,days_activity) VALUES('".$_SESSION['packid']."',
                    '".$_POST['day']."' , '".$_POST['activity']."');" ;
                //echo $qry;
                if(mysqli_query($conn,$qry)){
                   echo "<script type='text/javascript'> alert('Day added'); </script>";
                }else{
                    echo "<script type='text/javascript'> alert('Day added! Please try again later'); </script>";
                }
            }

            if(isset($_POST['addHotel'])){
                $qry = "INSERT INTO hotel_details (ref_id_pack, pack_hotel_name, city, state) VALUE('".$_SESSION['packid']."','".$_POST['hotelName']."','".$_POST['hotelCity']."','".$_POST['hotelState']."')";
                //echo $qry;
                if(mysqli_query($conn,$qry)){
                    echo "<script type='text/javascript'> alert('Hotel added'); </script>";
                }else{
                    echo "<script type='text/javascript'> alert('Hotel not added! Please try again later'); </script>";
                }
            }

            if(isset($_POST['ImageAdd']))
            {
                $target_dir = "uploads";
                $target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                if(isset($_POST["ImageAdd"])) {
                    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                    if($check !== false) {
                        //echo "File is an image - " . $check["mime"] . ".";
                        $uploadOk = 1;
                    } else {
                        echo "<script type='text/javascript'> alert('File is not Image or or You Select Image >1MB! Please try again'); </script>";
                        $uploadOk = 0;
                    }
                }
            
                $tmpname = $_FILES["fileToUpload"]["name"];
                $tmpimage = addslashes(file_get_contents($_FILES["fileToUpload"]["tmp_name"]));
                
                $qry = "UPDATE package_tour SET package_image = '{$tmpimage}' WHERE pack_tour_id = '".$_SESSION['packid']."';";
               // echo $qry;
                if(mysqli_query($conn,$qry)){
                    echo "<script type='text/javascript'> alert('Image Added Successfully'); </script>";

                }else{
                    echo "<script type='text/javascript'> alert('Image Not Added Successfully'); </script>";
                }
            }

           /* if(isset($_POST['ImageAdd']))
            {
                $target_dir = "uploads";
                $target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                if(isset($_POST["ImageAdd"])) {
                    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
                }

                $tmpname = $_FILES["fileToUpload"]["name"];
                $tmpimage = addslashes(file_get_contents($_FILES["fileToUpload"]["tmp_name"]));
                
                $qry = "INSERT INTO pacake_tour(package_image) VALUES ('{$tmpimage}');";
                
                if(mysqli_query($conn,$qry))
                {
                    echo "added";
                    echo $qry;
                }
                else{
                    echo "not added";
                }
               
            }*/

           
        
        ?>
    

    </body>
    
</html>