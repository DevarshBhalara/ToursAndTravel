<?php
    session_start();
   // include "islogged.php";
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script>
       
        </script>
       
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
        <section class="sec">
        


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
      </section>
       

    </body>
</html>