<?php
    session_start();
    include "islogged.php";
    include "db_connect.php";
    $conn = mysqli_connect($servername,$username,$password,$dbname);
    if(!$conn){
        //echo "Error in Connecting";
    }
    //echo $_REQUEST["tourid"];

    if(isset($_POST['logout'])){
      session_destroy();
      header("Location:login.php");
    } 
    $id = $_REQUEST['packid'];
    $qry = "SELECT pack_tour_name,
                    pack_tour_date,
                    pack_days,
                    pack_price,
                    pack_main_places,
                    pack_pickup_point,
                    pack_drop_point,
                    pack_other_notes,
                    pack_max_passenger FROM package_tour WHERE pack_tour_id=".$id;
    if(isset($_POST['editTour']))
    {       
        $q = "UPDATE package_tour SET 
                pack_tour_name='".$_POST['tname']."',
                pack_tour_date='".$_POST['tdate']."' ,
                pack_days='".$_POST['tdays']."',
                pack_price='".$_POST['tprice']."',
                pack_main_places='".$_POST['tmainplaces']."',
                pack_pickup_point='".$_POST['tpickup']."',
                pack_drop_point='".$_POST['tdrop']."',
                pack_other_notes='".$_POST['tnotes']."',
                pack_max_passenger='".$_POST['tmaxp']."' WHERE pack_tour_id=".$id;
                if(mysqli_query($conn,$q))
                {
                    header("location:index_admin.php");
                }
    }
    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        
        <!--<link rel="shortcut icon" type="image/png" href="img/favicon.png"> -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
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
                    <form class="mt-4 mb-4"  method="POST">

                    <?php
                        if($r=mysqli_query($conn,$qry)){
                            //echo "Got it";
                            while($row = mysqli_fetch_row($r))
                            {
                    ?>
                        <div class="form">
                            <label class="form-label">Tour name</label>
                            <input type="text" name="tname" value="<?php echo $row[0]; ?>" class="form-control" placeholder="Eg. Manali">
                        </div>
                        <div class="form mt-3">
                            <label class="form-label"> Select Date For Tour </label>
                            <input type="text" name="tdate" value="<?php echo $row[1]; ?>" class="form-control" placeholder="2022-02-14 10:00PM">
                        </div>
                        <div class="form mt-3">
                            <label class="form-label"> Tour Days </label>
                            <input type="text"  name="tdays" value="<?php echo $row[2]; ?>" class="form-control" placeholder="Eg. 10 Days">
                        </div>
                        <div class="form mt-3">
                            <label class="form-label"> Package Price </label>
                            <input type="text" name="tprice" value="<?php echo $row[3]; ?>" class="form-control" placeholder="Eg. 10000/person">
                        </div>
                        <div class="form mt-3">
                            <label class="form-label"> Package Main Places </label>
                            <input type="text" name="tmainplaces" value="<?php echo $row[4]; ?>" class="form-control" placeholder="Eg. Manali,kullu,rohtang,delhi">
                        </div>
                        <div class="form mt-3">
                            <label class="form-label"> Package Pick up Point(Full address) </label>
                            <textarea class="form-control" name="tpickup" placeholder="Eg. Limba chowk office, rajkot" rows="3"> <?php echo $row[5]; ?> </textarea>
                        </div>
                        <div class="form mt-3">
                            <label class="form-label"> Package Drop Point(Full address) </label>
                            <textarea class="form-control" name="tdrop" placeholder="Eg. Limba chowk office, rajkot" rows="3"><?php echo $row[6]; ?></textarea>
                        </div>
                        <div class="form mt-3">
                            <label class="form-label"> Max Passenger </label>
                            <input type="text" name="tmaxp" value="<?php echo $row[8]; ?>" class="form-control" placeholder="Eg. 40">
                        </div>
                        <div class="form mt-3">
                            <label class="form-label"> Package Other Notes </label>
                            <textarea class="form-control" name="tnotes"  placeholder="do this things at your own risk etc.." rows="3"> <?php echo $row[7]; ?></textarea>
                        </div>
                        <div class="form text-center mt-3">
                            <button type="submit" name="editTour" class="btn btn-primary btn-block"> Edit Tour  </button>
                        </div> 
                        <?php
                            }
                        }
                        ?>

                                                                              
                    </form>
                </div>
                
               
            </div>

        </section>

    </body>
</html>