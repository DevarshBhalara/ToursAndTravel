<?php
    // Error messages
    $uname = "";
    $pass = "";
    $email = "";
    $error = array();
    if(isset($_POST["submit"])) {
        // Set form variables
        $uname = checkInput($_POST["uname"]);
        $pass   = checkInput($_POST["pass"]);
        $email  = checkInput($_POST["email"]);
     
        // Name validation
        if(empty($uname)){
            ?>

            <script>
                alert("Name can not be Emapty");
                window.location.href = "Practical-8.php";
            </script>
            
            <?php 
                //$c = count($error);
               // $error[$c] = 'Name cant be empty';
                //echo $error[0];
        } // Allow letters and white space
        else if(!preg_match("/^[a-zA-Z ]*$/", $uname)) {
            ?>

            <script>
                alert("Onlt Letters and White space allowed");
                window.location.href = "Practical-8.php";
            </script>
            
            <?php 
           // $c = count($error);
            //$error[$c] = 'Onlt Letters and White space allowed';


           /* $fnameErr = '<div class="error">
                Only letters and white space allowed.
            </div>';
            echo $fnameErr . "<br>";*/
        } else {
            echo $uname . '<br>';
        }

        if(empty($pass)){
            ?>

            <script>
                alert("Password can not be left blank");
                window.location.href = "Practical-8.php";
            </script>
            
            <?php 

            //$c = count($error);
            //$error[$c] = 'Password can not be left blank';
            /*$lnameEmptyErr = '<div class="error">
                Name can not be left blank.
            </div>';
            echo $lnameEmptyErr . "<br>";*/
        } // Allow letters and white space
        else if(!preg_match("/^[A-Za-z0-9!@#$%^&*()_]{6,20}$/", $pass)) {

            ?>

            <script>
                alert("Dose not match with pattern");
                window.location.href = "Practical-8.php";
            </script>
            
            <?php 
            //$c = count($error);
            //$error[$c] = 'Dose not match with pattern';
           /* $lnameErr = '<div class="error">
                Only letters and white space allowed.
            </div>';
            echo $lnameErr . "<br>";*/
        } else {
            echo $pass . '<br>';
        }

        // Email validation
        if(empty($email)){
            ?>

            <script>
                alert("Email can not be left blank.");
                window.location.href = "Practical-8.php";
            </script>
            
            <?php 
            //$c = count($error);
            //$error[$c] = ' Email can not be left blank.';
           /* $emailEmptyErr = '<div class="error">
                Email can not be left blank.
            </div>';*/
        } // E-mail format validation
        else if (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email)){
            ?>

            <script>
                alert(" Email format is not valid.");
                window.location.href = "Practical-8.php";
            </script>
            
            <?php 
            //$c = count($error);
            //$error[$c] = ' Email format is not valid.';
            /* $emailErr = '<div class="error">
                    Email format is not valid.
            </div>';*/
        } else {
            echo $email . '<br>';
        }
        /*if(count($error)>0)
        {   $err = "";
            for($i=0;$i<count($error);$i++)
            {
                $err .= $error[$i]."\n";
            }
            //echo $err;
            ?>

            <script>alert("<?php echo $err; ?>")</script>

    <?php 
        }*/
    }

    function checkInput($input) {
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        return $input;
    }    
?>