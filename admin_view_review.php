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
            <link href="css/bootstrap.min.css" rel="stylesheet" >
            <script src="js/bootstrap.bundle.min.js" ></script>
            <script src="umd/popper.min.js" ></script>
            <script src="js/bootstrap.min.js" ></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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



            <section class="container mt-5 col-sm">
                
                <table class="table table-striped  text-center mt-4" >
                    <h3 class="text-center" style="text-transform: uppercase;"> View Review</h3>
                    <tr>
                        <th>User Name</th>
                        <th> Review  </th>
                        <th> Rating</th>
                    
                    </tr>   
                    <?php
                             
                          
                            $qry = "SELECT user_review.`id`, user.`name`, user_review.`review` , user_review.`rating`  FROM user_review INNER JOIN USER ON user.`uid` = user_review.`id` ORDER BY user_review.`datetime` DESC "; 
                             //echo  $qry;
                            if($res = mysqli_query($conn,$qry))
                            {
                                while($row = mysqli_fetch_row($res))
                                {  
                             ?>                    
                    <tr>
                        <td> <?php echo $row[1]; ?>     </td>
                        <td>  <?php echo $row[2]; ?>  </td>
                        <td>  <?php echo $row[3]; ?> </td>
                            
                    </tr>
                    <?php 
                    
                                }
                                
                            }
                    ?>
                
                </table>


            </section>

            



        </body>
    </html>