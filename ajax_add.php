<?php
    session_start();
    include "islogged.php";
    include "db_connect.php";
    $conn = mysqli_connect($servername,$username,$password,$dbname);
    if(!$conn){
        echo "Error in Connecting";
    }

   /* if(isset($_POST['addDay']))
    {
        if(!isset($_SESSION['packid']))
        {
            echo "<script type='text/javascript'> alert('Please, Add Tour first!'); </script>";
        }
        else{
            header('Location: addDayHotel.php');
        }

    }*/

    if(isset($_POST['addTour']))
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
        $qry = "INSERT INTO package_tour (pack_tour_name,
                                        date_when_created,
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
            //echo "Added";
            $qry = "SELECT pack_tour_id FROM package_tour WHERE date_when_created='$whenCreated' ; ";
         
            //echo $qry;
            if($res = mysqli_query($conn,$qry))
            {
                if($row=mysqli_fetch_row($res)){

                    //echo "<script type='text/javascript'> alert('Tour Added Now you can Add Days using Below button'); </script>";
                    $_SESSION['packid'] = $row[0];
                    if(!isset($_SESSION['packid']))
                    {
                        echo "<script type='text/javascript'> alert('Please, Add Tour first!'); </script>";
                    }
                    else{
                        header('Location: addDayHotel.php');
                    }
                    
                    
                }else{
                    echo "Problem in fetch";
                }
            }
            else{
                echo "problem in exe";
            }
        }else{
            //echo "not";
        }
    }

    if(isset($_POST['addDay']))
    {
        
    }
?>


    <body style="margin-bottom: 200px;">
        <section class="sec">
  

        <section class="container mt-5">

            <div class="row">
                <div class="col-lg" style="background-color: #f7f7f7;">
                    <form class="mt-4 mb-4"  method="POST">

                        <div class="form">
                            <label class="form-label">Tour name</label>
                            <input type="text" class="form-control" name="packageName" placeholder="Eg. Manali" required>
                        </div>
                        <div class="form mt-3">
                            <label class="form-label"> Select Date For Tour </label>
                            <input type="datetime-local" class="form-control" name="packageDate" placeholder="2022-02-14 10:00PM" required>
                        </div>
                        <div class="form mt-3">
                            <label class="form-label"> Tour Days </label>
                            <input type="text" class="form-control" name="packageDays" placeholder="Eg. 10 Days" required>
                        </div>
                        <div class="form mt-3">
                            <label class="form-label"> Package Price </label>
                            <input type="text" class="form-control" name="packagePrice" placeholder="Eg. 10000/person" required>
                        </div>
                        <div class="form mt-3">
                            <label class="form-label"> Package Main Places </label>
                            <input type="text" class="form-control" name="packagePlaces" placeholder="Eg. Manali,kullu,rohtang,delhi" required>
                        </div>
                        <div class="form mt-3">
                            <label class="form-label"> Package Pick up Point(Full address) </label>
                            <textarea class="form-control" name="packagePickUpAdd" placeholder="Eg. Limba chowk office, rajkot" rows="3" required></textarea>
                        </div>
                        <div class="form mt-3">
                            <label class="form-label"> Package Drop Point(Full address) </label>
                            <textarea class="form-control" name="packageDropAdd" placeholder="Eg. Limba chowk office, rajkot" rows="3" required></textarea>
                        </div>
                        <div class="form mt-3">
                            <label class="form-label"> Max Passenger </label>
                            <input type="text" class="form-control" name="packageMaxPess" placeholder="Eg. 40">
                        </div>
                        <div class="form mt-3">
                            <label class="form-label"> Package Other Notes </label>
                            <textarea class="form-control" name="packageNotes" placeholder="do this things at your own risk etc.." rows="3" required></textarea>
                        </div>
                       

                        <div class="form text-center mt-3">
                            <button type="submit" name="addTour" class="btn btn-primary btn-block"> Add Tour Data  </button>
                        </div> 

                        
                                                                        
                    </form>

                   

                </div>

              
                <!--
                <div class="col-lg" style="background-color: #f7f7f7; margin-left: 1%;">
                    <h3>Day wise Details </h3>
                    <form class="mt-4 mb-4" action="searchResultTour.php" method="POST">
                        <div class="form-group">
                            <label class="form-label">Day and Time</label>
                            <input type="text" name="day" class="form-control" placeholder="Eg. Day 1 / 10:00AM">
                        </div>
                        <div class="form-group mt-3">
                            <label class="form-label"> Day Activity </label>
                            <input type="text" name="activity" class="form-control" placeholder="We will do Manali Darshan">
                        </div>
                        <div class="form-group text-center mt-4">
                            <button type="submit" name="search" class="btn btn-primary btn-block"> Add Day  </button>
                        </div>  
                    </form> 
                </div> -->
            </div>

        </section>
    </section>

