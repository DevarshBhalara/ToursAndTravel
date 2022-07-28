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

    if(isset($_REQUEST['hotel']))
    {   $sel = "SELECT ref_id_pack FROM hotel_details WHERE total=".$_REQUEST['hotel'];
        echo $sel;
        $res = mysqli_query($conn,$sel);
        $row = mysqli_fetch_row($res);

        $qry = "DELETE FROM hotel_details WHERE total=".$_REQUEST['hotel'];
        
        if(mysqli_query($conn,$qry))
        {
            ?>
            <script>
                alert('Hotel Deleted');
                window.location.href = "viewAllHotel.php?hotel=<?php echo $row[0]; ?>";
    
            </script>
                         
            <?php
        }
    }

?>