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

    if(isset($_REQUEST['day']))
    {   $sel = "SELECT ref_pack_id FROM day_wise_info WHERE total=".$_REQUEST['day'];
        echo $sel;
        $res = mysqli_query($conn,$sel);
        $row = mysqli_fetch_row($res);

        $qry = "DELETE FROM day_wise_info WHERE total=".$_REQUEST['day'];
        
        if(mysqli_query($conn,$qry))
        {
            ?>
            <script>
                alert('Day Delete');
                window.location.href = "viewAllDay.php?day=<?php echo $row[0]; ?>";
    
            </script>
                         
            <?php
        }
    }

?>