<?php
include "db_connect.php";
$conn = mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
    //echo "Error in Connecting";
}

if(isset($_POST['create_account']))
{
    $name = $_POST['uname'];
    $pass = $_POST['pass'];
    $mobile_no = $_POST['mobile'];
    $email = $_POST['email'];
    $city = $_POST['ucity'];

    $check = "SELECT * FROM user WHERE email='".$email."' OR mobile_no='".$mobile_no."';  ";
    $q = mysqli_query($conn,$check);
    $res=mysqli_fetch_row($q);
    if($res[0]==null)
    {
        $qry = "INSERT INTO user (name,password,mobile_no,email,city,role) VALUE('".$name."','".$pass."','".$mobile_no."','".$email."','".$city."','U'); ";

        if(mysqli_query($conn,$qry)){

            $qry_2 = "SELECT * FROM user WHERE email= '".$email."' AND password='".$pass."'; ";
            $q_2 = mysqli_query($conn,$qry_2);
            $res_2=mysqli_fetch_row($q_2);

            $insert_login = "INSERT INTO login(ref_id,name,email,mobile_no,password,role) 
                VALUE('".$res_2[0]."','".$res_2[1]."','".$res_2[4]."','".$res_2[2]."','".$res_2[3]."','U');";

            if(mysqli_query($conn,$insert_login)){  
                echo "<script> alert('Acc '); </script> ";
                ?>
                <script>
                   window.location.href = "login.php";

                </script>
                <?php
            }else{
                echo "prob";
            }




            echo "Account created successfully";
        }else{
            echo "problem in qury";
        }
        
    }
    else{
        echo "mobile no or email alredy in use;";

        
    }
}
?>