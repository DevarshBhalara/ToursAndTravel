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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/style3.css">
        <title>KING Tours and Travels</title>
       
       
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
                        <a class="nav-link" aria-current="page" href="#">Home</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="contact_us.html">Contact Us</a>
                      </li>
                     
                      <li class="nav-item">
                        <a class="nav-link" href="about_us.html">About Us</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link  active" href="user_review.php">Add Review</a>
                      </li>
                    </ul>
                    <form class="d-flex">
                      
                      <button class="btn btn-primary" type="submit">Logout</button>
                    </form>
                  </div>
                </div>
              </nav>
        </header>
        


        <section class="section_user_review mt-5">

            <div class="container text-center">
                <h3 class="section_user_review_heading"> ADD REVIEW  </h3>
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
                                    <label for="mono" class="form-label"> <h5>Rating</h5></label>
                                    <input type="number" name="rating" class="form-control" id="mono"  required>
                                </div>
                                <div class="mb-3">
                                    <label for="query" class="form-label"><h5>Review</h5></label>
                                    <textarea class="form-control" name="rev" id="query" rows="3"></textarea>
                                </div>
                                <div class="form-group text-center">
                                    <button type="submit" name="addRev" class="btn btn-primary btn-block"> Add Review </button>
                                </div>
                        </form>
                    </div>
                </div>

                <?php
                    if(isset($_POST['addRev']))
                    {
                        $rat = $_POST['rating'];
                        if($rat<=5)
                        {
                            $qry = "INSERT INTO user_review(id,review,rating,datetime) VALUES('".$_SESSION['ref_idu']."',
                            '".$_POST['rev']."' ,'".$_POST['rating']."' ,NOW() )";
                            if(mysqli_query($conn,$qry))
                            {
                                ?>
                                <script>
                                    alert("Your Review is Submitted");
                                    window.location.href = "index_user.php";
        
                                </script>
                                
                                <?php
                            }
                        }else{
                            ?>
                            <script>
                                alert("Add Rating below 5");
                               
                            </script>
                            
                            <?php
                        }
                       
                    }
                ?>
            </div>

        </section>


        

       


    </body>
    
</html> 