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
                      <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index_user.php">Home</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Contact Us</a>
                      </li>
                     
                      <li class="nav-item">
                        <a class="nav-link" href="about_us.html">About Us</a>
                      </li>
                      <li class="nav-item">
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

    if(isset($_POST["searchOnetoOne"])){


        $qry = "SELECT one_to_one_id,
                       one_to_one_source,
                       one_to_one_destination,
                       price,
                       stops,
                       date,
                       other_notes,
                       pick_up_address,
                       drop_address,
                       max_passenger FROM one_to_one WHERE one_to_one_source LIKE '%".$_POST['from']."%' AND (stops LIKE '%".$_POST['to']."%' OR one_to_one_destination LIKE '%".$_POST['to']."%');";
        //echo $qry;
        $res = mysqli_query($conn,$qry);
        while($row = mysqli_fetch_row($res))
        {
?>
        <section style="margin-top: 20px;">
            <div class="container">
                <div class="card">
                    <div class="row no-gutters">
                        <div class="col-sm-5 img-fluid my-auto">
                        <img class='card-img img-fluid ali' src='tourism.jpg' alt='not added'>
                        </div>
                        <div class="col-sm-7">
                            <div class="card-body my-auto">
                               
                                <p class="card-text"> <b>From  :</b> <?php echo $row[1]; ?> <b>To :</b>  <?php echo $row[2];  ?>   </p>
                                <p class="card-text"> <b>Stops :</b> <?php echo $row[4]; ?> </p>
                                <p class="card-text"> <b>Price :</b> <?php echo $row[3]; ?> </p>
                                <p class="card-text"> <b>Date :</b> <?php echo $row[5]; ?> </p>
                                <p class="card-text"> <b>Max passenger :</b> <?php echo $row[9]; ?> </p>
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
        //echo $qry;
    }

?>

      

    </body>
</html>