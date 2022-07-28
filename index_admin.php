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
        <link rel="stylesheet" href="css/bootstrap.min.css" >
        <script src="js/bootstrap.bundle.min.js" ></script>
        <script src="umd/popper.min.js" ></script>
        <script src="js/bootstrap.min.js" ></script>
        <link rel="stylesheet" href="css/style2.css">
        
        <title>KING Tours and Travels</title>
       
       
       <style>
           
       </style>
       <!-- <script type="text/javascript">
          window.history.forward();
          function noBack() {
              window.history.forward();
          }
        </script>-->
       
    </head>
    <body style="margin-bottom: 200px;"  onload="myFunction()">
        <script>
        function myFunction() {
            var field = 'status';
            var url = window.location.href;
            if(url.indexOf('?' + field + '=') != -1){
                const queryString = window.location.search;
                const urlParams = new URLSearchParams(queryString);
                const status = urlParams.get('status');
                alert(status);
            }                
        }
        </script>
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
                        <a class="nav-link active" aria-current="page" href="index_admin.php">Home</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="addTour.php">Add Tour</a>
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


        <section class="container mt-3">
            <div>
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="img/index_bg.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="img/index_bg2.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="img/tourism.jpg" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
                </div>
            </div>
        </section>
       
        <section class="container mt-5">
          <div class="row">
            <div class="card col-sm mt-3" >
              <img src="img/tourism.jpg" class="card-img-top mt-2" alt="Image">
              <div class="card-body">
                  <h5 class="card-title">Add Tour <?php //echo $_SESSION['oname']; ?></h5>

                  <a href="addTour.php" class="btn btn-primary">Add tour</a>
              </div>
            </div>

            <div class="card col-sm card-left-margin mt-3" >
              <img src="img/view.jpg" class="card-img-top mt-2" alt="Image">
              <div class="card-body">
                  <h5 class="card-title">View  Tour <?php //echo $_SESSION['oname']; ?></h5>

                  <a href="viewTour.php" class="btn btn-primary">View tour</a>
              </div>
            </div>

            <div class="card col-sm card-left-margin mt-3" >
              <img src="img/bus1.jpg" class="card-img-top mt-2" alt="Image">
              <div class="card-body">
                  <h5 class="card-title">Add One to One <?php //echo $_SESSION['oname']; ?></h5>

                  <a href="addOnetoOne.php" class="btn btn-primary">Add tour</a>
              </div>
            </div>

           
          </div>
          <div class="row">
            

            <div class="card col-sm card-left-margin mt-3 col-lg-4" >
              <img src="img/qry.png" class="card-img-top mt-2" alt="Image">
              <div class="card-body">
                  <h5 class="card-title">View Query</h5>

                  <a href="admin_view_query.php" class="btn btn-primary">Click here</a>
              </div>
            </div>

            <div class="card col-sm card-left-margin mt-3 col-lg-4" >
              <img src="img/qry.png" class="card-img-top mt-2" alt="Image">
              <div class="card-body">
                  <h5 class="card-title">View Review</h5>

                  <a href="admin_view_review.php" class="btn btn-primary">Click here</a>
              </div>
            </div>

          </div>
        </section>

       

    </body>
</html>