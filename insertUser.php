<?php
    include "db_connect";
    $conn = mysqli_connect($servername,$username,$password,$dbname);
        if(!$conn){
            echo "Error in Connecting";
        }

?>