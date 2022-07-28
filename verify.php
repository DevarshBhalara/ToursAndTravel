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

  <html>
    </head>
    <body style="margin-bottom: 200px;"  onload="myFunction()">
        <script>
        function myFunction() {
            var field = 'status';
            var url = window.location.href;
            if(url.indexOf('?' + field + '=') != -1){
                
                alert('Account Created Successfully');
                window.location.href = "login.html";
            }                
        }
        </script>
        </body>
        </html>