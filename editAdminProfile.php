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
    
    $qry = "SELECT owner_name,
                    mobile_no,
                    password,
                    email,
                    address,
                    address2,
                    address3
                    FROM owner WHERE oid=".$_SESSION['ref_id'];
    if(isset($_POST['editDetails']))
    {       
        $q = "UPDATE owner SET 
                owner_name='".$_POST['oname']."',
                mobile_no='".$_POST['m_no']."' ,
                password='".$_POST['pass']."',
                email='".$_POST['email']."',
                address='".$_POST['add1']."',
                address2='".$_POST['add2']."',
                address3='".$_POST['add3']."'
                 WHERE oid=".$_SESSION['ref_id'];
                if(mysqli_query($conn,$q))
                {
                    $q2 = "UPDATE login SET 
                            name='".$_POST['oname']."',
                            email='".$_POST['email']."' ,
                            mobile_no='".$_POST['m_no']."',
                            password='".$_POST['pass']."'
                            
                            WHERE id=".$_SESSION['oid'];

                        if(mysqli_query($conn,$q2))
                        {
                            header("location:index_admin.php");
                        }
                        else{
                            echo "problem ni login";
                        }
                   
                }else{
                    echo "problem in owner";
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
                        <a class="nav-link " href="viewTour.php">View Tour</a>
                      </li>

                      <li class="nav-item">
                        <a class="nav-link active" href="editAdminProfile.php">Edit Profile</a>
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
                            <label class="form-label">Owner name</label>
                            <input type="text" name="oname" value="<?php echo $row[0]; ?>" class="form-control" placeholder="Eg. Om Joshi">
                        </div>
                        <div class="form mt-3">
                            <label class="form-label"> Mobile Number </label>
                            <input type="text" name="m_no" value="<?php echo $row[1]; ?>" class="form-control" placeholder="9999999999">
                        </div>
                        <div class="form mt-3">
                            <label class="form-label"> Password </label>
                            <input type="password"  name="pass" value="<?php echo $row[2]; ?>" class="form-control" >
                        </div>
                        <div class="form mt-3">
                            <label class="form-label"> Email </label>
                            <input type="email" name="email" value="<?php echo $row[3]; ?>" class="form-control" placeholder="abc@gmail.com">
                        </div>

                        <div class="form mt-3">
                            <label class="form-label"> Address Line 1 </label>
                            <input type="text" name="add1" value="<?php echo $row[4]; ?>" class="form-control" placeholder="Moti Tanki chowk">
                        </div>

                        <div class="form mt-3">
                            <label class="form-label"> Address Line 2</label>
                            <input type="text" name="add2" value="<?php echo $row[5]; ?>" class="form-control" placeholder="Rocket Plaza">
                        </div>

                        <div class="form mt-3">
                            <label class="form-label"> Address Line 3 </label>
                            <input type="text" name="add3" value="<?php echo $row[6]; ?>" class="form-control" placeholder="Rajkot - 360002">
                        </div>
                       
                        <div class="form text-center mt-3">
                            <button type="submit" name="editDetails" class="btn btn-primary btn-block"> Edit Details  </button>
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