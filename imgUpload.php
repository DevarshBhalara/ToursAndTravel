<?php
session_start();
include "islogged.php";
include "db_connect.php";
$conn = mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
    echo "Error in Connecting";
}
if(isset($_POST['ImageAdd']))
            {
                $target_dir = "uploads";
                $target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                if(isset($_POST["ImageAdd"])) {
                    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
                }
            
                $tmpname = $_FILES["fileToUpload"]["name"];
                $tmpimage = addslashes(file_get_contents($_FILES["fileToUpload"]["tmp_name"]));
                
                $qry = "UPDATE package_tour SET package_image = '{$tmpimage}' WHERE pack_tour_id = '".$_SESSION['packid']."';";
                echo $qry;
                if(mysqli_query($conn,$qry)){
                    

                }else{
                    
                }
            }else{
                
            }
        ?>