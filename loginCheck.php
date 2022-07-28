<?php
	include "db_connect.php";
	session_start();
	if(!$conn = mysqli_connect($servername,$username,$password,$dbname)){
	   echo "Error in Connection";
	}else{                     
	    if(isset($_POST["btn_sub"]))
		{
			  $mailid = $_POST['uname'];
			  $pswd = $_POST['pass'];
			  $sel = "SELECT oid,owner_name,travel_company_name,mobile_no,password,email,rol FROM owner WHERE email = '".$mailid."' and password='".$pswd."'; ";
                echo $sel;
			   if($res = mysqli_query($conn,$sel))
				{
				    if($row = mysqli_fetch_row($res))
				    {         
					  if(($mailid == $row[5]) && ($pswd == $row[4]) && ($row[6] == "O"))
                        {   $_SESSION['oname'] = $row[1];
                            $_SESSION['oid'] = $row[0];
							header("Location:index_admin.php");
						}
						else
						{
							echo "Not found";
						}
				    }else{
					echo "Query problem";
				    }
			  }
		}   
	}
	
?>