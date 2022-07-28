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
    <body class="bg">

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
                      
                      <button class="btn btn-primary" type="submit">Logout</button>
                    </form>
                  </div>
                </div>
              </nav>
        </header>

        <section style="margin-top: 20px;">
            <div class="container-fluid text-center">
                <h2> SEARCH RESULT</h2>
                <hr>
            </div>
        </section>



<?php
    include "db_connect.php";
    $conn = mysqli_connect($servername,$username,$password,$dbname);
    if(!$conn){
        echo "Error in Connecting";
    }

    if(isset($_POST["search"])){


        $qry = "SELECT pack_tour_id,
                        pack_tour_name,
                        pack_days,
                        pack_price,
                        package_image,
                        pack_tour_date FROM package_tour where pack_tour_name LIKE '%".$_REQUEST['loc']."%' OR pack_main_places LIKE '%".$_REQUEST['loc']."%' ;";

        $res = mysqli_query($conn,$qry);
        while($row = mysqli_fetch_row($res))
        {
?>
        <section style="margin-top: 20px;">
            <div class="container">
                <div class="card">
                    <div class="row no-gutters">
                        <div class="col-sm-5 img-fluid my-auto">
                        <?php 

                            if($row[4]==null)
                            {

                                echo "<img class='card-img img-fluid ali' src='tourism.jpg' alt='not added'>";
                        
                            }else{

                                echo "<img class='card-img img-fluid ali' src='data:image/jpg;base64," .base64_encode($row[4]). "'>";
                            }
                        ?>
                        </div>
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="card-title"> <?php echo $row[1]; ?> </h5>
                                <p class="card-text"> <b>Date :</b> <?php echo $row[5]; ?>   </p>
                                <p class="card-text"> <b>Total Days :</b>  <?php echo $row[2];  ?> </p>
                                <p class="card-text"> <b>Package Price :</b> <?php echo $row[3] ?> </p>
                                
                                <a href="packageTourDetails.php?tourid=<?php echo $row[0]?>" class="btn btn-primary"> View Full Details </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </section>

        <?php
        }
    }else{
        echo "  Go back And Enter Location ";
    }

?>

    </body>
</html>