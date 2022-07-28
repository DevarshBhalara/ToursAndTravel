<?php
    // Error messages
    $uname = "";
    $pass = "";
    $email = "";
    $count = 0;
    if(isset($_POST["submit"])) {
        // Set form variables
        $uname = checkInput($_POST["uname"]);
        $pass   = checkInput($_POST["pass"]);
        $email  = checkInput($_POST["email"]);
        $mono = $_POST["mobile"];
     
     
        if(empty($uname)){
            ?>
            <script>
                alert("Name can not be Emapty");
                window.location.href = "Practical-8.php";
            </script>
            <?php 
        }
        else if(!preg_match("/^[a-zA-Z ]*$/", $uname)) {
            ?>

            <script>
                alert("Onlt Letters and White space allowed");
                window.location.href = "Practical-8.php";
            </script>
            <?php 
          
        } else {
            $count = $count + 1;
        }

        if(empty($pass)){
            ?>
            <script>
                alert("Password can not be left blank");
                window.location.href = "Practical-8.php";
            </script>
            <?php 
        } // Allow letters and white space
        else if(!preg_match("/^[A-Za-z0-9!@#$%^&*()_]{6,20}$/", $pass)) {

            ?>

            <script>
                alert("Dose not match with pattern");
                window.location.href = "Practical-8.php";
            </script>
            
            <?php 
            
        } else {
            $count = $count + 1;
        }
        // Email validation
        if(empty($email)){
            ?>
            <script>
                alert("Email can not be left blank.");
                window.location.href = "Practical-8.php";
            </script>
            
            <?php 
           
        } // E-mail format validation
        else if (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email)){
            ?>

            <script>
                alert(" Email format is not valid.");
                window.location.href = "Practical-8.php";
            </script>
            
            <?php 
           
        } else {
            $count = $count + 1;
        }

        if(empty($mono)){
            ?>
            <script>
                alert("Mobile number can not be left blank.");
                window.location.href = "Practical-8.php";
            </script>
            <?php 
        } // E-mail format validation
        else if (!preg_match("/^(\+\d{1,3}[- ]?)?\d{10}$/", $mono)){
            ?>
            <script>
                alert(" Mobile number format is not valid.");
                window.location.href = "Practical-8.php";
            </script>
            <?php 
        } else {
            $count = $count + 1;
        }
        if($count==4)
        {
            ?>
            <script>
                alert(" Mobile number format is not valid.");
                window.location.href = "login.php";
            </script>
            <?php 
        }
       
    }

    function checkInput($input) {
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        
        return $input;
    }    
?>