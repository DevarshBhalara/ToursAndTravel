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
        <link rel="stylesheet" href="css/style3.css">
        <title>KING Tours and Travels</title>
       
        
        </script>
       <style>
            .section_user_review{
                background: rgba(247,247,247,0.3);
                width:100%;
                padding-bottom:20px;
            }
            .section_user_review_heading{
                padding-top:20px;
                text-decoration:underline;
                text-decoration-color:red;
                letter-spacing:7px;
                transition: all .2s;
            }
            .section_user_review_heading:hover {
                transform: skewY(2deg) skewX(15deg) scale(1.1);
                text-shadow: 0.5rem 1rem 2rem rgba(0, 0, 0, 0.4); 
            }
            .custom_card_hover{
                transition: .2s;
            }
            .custom_card_hover:hover{
                
                transform: translateY(-20px);
            }
       </style>
    </head>
    <body class="bg">
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
                      <li class="h nav-item">
                        <a class="nav-link active" aria-current="page" href="index_user.php" >Home</a>
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
                    <form class="d-flex" method="post">
                      
                      <input class="btn btn-primary" name="logout" value="Logout"  type="submit"></button>
                    </form>
                  </div>
                </div>
              </nav>
        </header>
        
<!--
        <section>
            <div class="container mt-5">
                <div class="row">
                  
                    <div class="col-sm-12">
                       
                        <div class="fakeimg text-center">
                           <span> OUTDOOR <br> WHERE LIFE HAPPNES </span>
                        </div>
                        
                        
                    </div>
                </div>
            </div>
        </section>

-->
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

        <section class="section_user_review mx-auto"  >
            <div class="container mt-5">

                
                <h3 class="section_user_review_heading text-center">  USER REVIEW </h3>
                
               <!-- <hr/> -->
                <div class="row user-review mt-4" style="padding: 20px;">
                <div class="row">
                <?php
                 $qry = "SELECT total,id,review,rating,datetime FROM user_review ORDER BY datetime desc "; 
                 //echo  $qry;
                 $count = 0;
                 if($res = mysqli_query($conn,$qry))
                 {
                     while($row = mysqli_fetch_row($res))
                     {  
                        $count = $count+1;
                        if($count<4)
                        {
                ?>
                    
                        <div class="user-review-box col-md" style="margin-left: 10px;margin-top: 10px;">
                            User Name : <?php ?> <br>
                            Rating : <?php echo $row[3]; ?> <br>
                            Review : <?php echo $row[2]; ?> <br>
                        </div>
                <?php 
                        }
                    }
                }
                ?>
                    <div style="margin-top: 10px;"></div>
                    </div>
                  
                    
                </div>
            </div>
        </section>



        <!--<section>
            
            <div class="container">
                <div class="row text-center">
                    <div class="col-md search-specific-tour  mt-5" >     
                        <div style="padding: 10%;">                      
                            <h4 class="text-center mb-4">Seacrh For Specific Tour</h4>
                            <form action="searchResultTour.php" method="POST">
                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control" id="floatingInput" placeholder="Manali">
                                        <label for="floatingInput">Enter Your Tour Location</label>
                                    </div>
                                    <div class="form-group text-center">
                                        <button type="submit" name="search" class="btn btn-primary btn-block"> Search  </button>
                                    </div>                                                       
                            </form>
                        </div>
                    </div>
                    
                    <div class="col-md search-specific-tour mt-5 card-left-margin"> 
                        <div style="padding: 10%;">
                            <h4 class="text-center mb-4">Seacrh For Specific Tour</h4>
                            <form>
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="floatingInput" placeholder="Rajkot">
                                    <label for="floatingInput">From Where you want to go?</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="floatingInput" placeholder="Ahmedabad">
                                    <label for="floatingInput">To Where you want to go?</label>
                                </div>
    
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-primary btn-block"> Search  </button>
                                </div>                                                        
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    
        </section>-->

        <div class="section_user_review mt-5">

            <div class="container text-center">
                <h3 class="section_user_review_heading"> NEW TOURS </h3>
            </div>
            
            <div class="container">
                
          

                <div class="row">

                <?php 
                $sel = "SELECT pack_tour_id,
                                pack_tour_name,
                                pack_days,
                                pack_max_passenger,
                                pack_tour_date,
                                package_image,
                                pack_price FROM package_tour ORDER BY date_when_created desc" ;

                if($result = mysqli_query($conn,$sel))
                {
                    $count = 1;
                    while($row = mysqli_fetch_row($result))
                    {
                        
                        if($count<=3)
                        {
                    ?>
                            <div class="flip-card col-md mt-4 custom_card_hover">
                                <div class="flip-card-inner">
                                    <div class="flip-card-front">
                                        <div class="img-fluid  fakeimg">
                                            <?php
                                            
                                            if($row[5]==null)
                                            {
                
                                                echo "<img class='img-fluid ali' src='tourism.jpg' alt='not added'>";
                                        
                                            }else{
                
                                                echo "<img class='img-fluid ali' width='100%' src='data:image/jpg;base64," .base64_encode($row[5]). "'>";
                                            }

                                            ?>
                                            
                                        </div>
                                        
                                        <div class="text-center mt-4">
                                            
                                            <div class="container">
                                                <p> <?php echo $row[1]; ?> </p>
                                                <hr style="margin:5px;">
                                                <p> <?php echo $row[2]; ?> </p>
                                                <hr style="margin:5px;">
                                                <p> <?php echo $row[3]; ?></p>
                                                <hr style="margin:5px;">
                                                <p> <?php echo $row[4]; ?></p>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="flip-card-back">
                                        <div class="container back-card-custom">
                                            <h5> Only </h5>
                                            <h2>  <?php echo $row[6]; ?> </h3>
                                            <h6>  <a href="packageTourDetails.php?tourid=<?php  echo $row[0]; ?>" > Click here to read full information </a> </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                <?php   }
                        $count++;
                    }
                }
                ?>
                   <!-- <div class="flip-card col-md mt-4 custom_card_hover">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                                <div class="img-fluid  fakeimg">
                                    <img class="img-fluid ali" width="100% " src="img/img_card.jpg" alt=".." />
                                </div>
                                 
                                <div class="text-center mt-4">
                                    
                                    <div class="container">
                                        <p> Manali </p>
                                        <hr style="margin:5px;">
                                        <p> 10 Days </p>
                                        <hr style="margin:5px;">
                                        <p> 35 Peoples</p>
                                        <hr style="margin:5px;">
                                        <p> Sleep in cozy hotels</p>

                                    </div>
                                </div>
                            </div>
                            <div class="flip-card-back">
                                <div class="container back-card-custom">
                                    <h5> Only </h5>
                                    <h2> 10000/person</h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flip-card col-md mt-4 custom_card_hover">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                                <div class="img-fluid  fakeimg">
                                    <img class="img-fluid ali" width="100% " src="img/img_card.jpg" alt=".." />
                                </div>
                                 
                                <div class="text-center mt-4">
                                    <div class="container">
                                        <p> Manali </p>
                                        <hr style="margin:5px;">
                                        <p> 10 Days </p>
                                        <hr style="margin:5px;">
                                        <p> 35 Peoples</p>
                                        <hr style="margin:5px;">
                                        <p> Sleep in cozy hotels</p>
                                    </div>
                                </div>
                            </div>
                            <div class="flip-card-back">
                                
                                <div class="container back-card-custom">
                                    <h5> Only </h5>
                                    <h2> 10000/person</h3>
                                </div>
                                
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>

        </div>



        <section class="section_user_review mt-5">

            <div class="container text-center">
                <h3 class="section_user_review_heading"> NEED SOMETHING ? </h3>
            </div>
            
            <div class="container">
                <div class="row text-center">
                    <div class="col-md search-specific-tour  mt-4" >     
                        <div style="padding: 10%;">                      
                            <h4 class="text-center mb-4">Seacrh For Specific Tour</h4>
                            <form action="searchResultTour.php" method="POST">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="loc" class="form-control" id="floatingInput" placeholder="Manali" required>
                                        <label for="floatingInput">Enter Your Tour Location</label>
                                    </div>
                                    <div class="form-group text-center">
                                        <button type="submit" name="search" class="btn btn-primary btn-block"> Search  </button>
                                    </div>                                                       
                            </form>
                        </div>
                    </div>
                    
                    <div class="col-md search-specific-tour mt-4 card-left-margin"> 
                        <div style="padding: 10%;">
                            <h4 class="text-center mb-4">Seacrh For Specific Tour</h4>
                            <form action="searchOnetoOne.php" method="POST">
                                <div class="form-floating mb-3">
                                    <input type="text" name="from" class="form-control" id="floatingInput" placeholder="Rajkot" required>
                                    <label for="floatingInput">From Where you want to go?</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" name="to" class="form-control" id="floatingInput" placeholder="Ahmedabad" required>
                                    <label for="floatingInput">To Where you want to go?</label>
                                </div>
    
                                <div class="form-group text-center">
                                    <button type="submit" name="searchOnetoOne" class="btn btn-primary btn-block"> Search  </button>
                                </div>                                                        
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    
        </section>

        <section class="section_user_review mt-5">

            <div class="container text-center">
                <h3 class="section_user_review_heading"> ANY QUERY ? </h3>
            </div>

            <div class="container ">
                <div class="row">
                    <div class="col-lg-2">    </div>
                    <div class="search-specific-tour mt-4 col-lg-8" style="padding:50px;">
                        <form method="post">
                                <div class="mb-3">
                                    <label for="username" class="form-label"> <h5>Your Name</h5></label>
                                    <input type="text" name="username" class="form-control" id="username"  required>
                                </div>
                                <div class="mb-3">
                                    <label for="mono" class="form-label"> <h5>Mobile Number/Email</h5></label>
                                    <input type="text" name="mono_email" class="form-control" id="mono"  required>
                                </div>
                                <div class="mb-3">
                                    <label for="query" class="form-label"><h5>Your Query</h5></label>
                                    <textarea class="form-control" name="qry" id="query" rows="3"></textarea>
                                </div>
                                <div class="form-group text-center">
                                    <button type="submit" name="addQuery" class="btn btn-primary btn-block"> Register Query </button>
                                </div>
                        </form>
                    </div>
                </div>

                <?php
                    if(isset($_POST['addQuery']))
                    {
                        $qry = "INSERT INTO user_query(uid,query,mobile_email) VALUES('".$_SESSION['ref_idu']."',
                        '".$_POST['qry']."' ,'".$_POST['mono_email']."'  )";
                        if(mysqli_query($conn,$qry))
                        {
                            ?>
                            <script>
                                alert("Your Query is Submitted");
                                window.location.href = "viewAllHotel.php?hotel=<?php echo $_GET['tour']; ?>";
    
                            </script>
                            
                            <?php
                        }
                    }
                ?>
            </div>

        </section>


        

        <footer>
           
            <div class="mt-5 p-4 bg-dark text-white text-center" >
                © 2020 Copyright:
                <a class="text-white" href="https://dreamdevelopers.com/">dreamdevelopers.com</a>
            </div>
            <!-- Copyright -->
        </footer>

                </section>
    </body>
    
</html> 