<?php
    session_start();
	
	include "db_connect.php";

	if(!$conn = mysqli_connect($servername,$username,$password,$dbname)){
	   echo "Error in Connection";
	}                  
	    
	
	
?>
<!DOCTYPE html>
<html>
<head>
    <link href="css/bootstrap.min.css" rel="stylesheet" >
        <script src="js/bootstrap.bundle.min.js" ></script>
        <script src="umd/popper.min.js" ></script>
        <script src="js/bootstrap.min.js" ></script>
        <link rel="stylesheet" href="css/style2.css">
    <style>
        body{
            background-image: url(tourism.jpg);
            background-size: cover;
            
            width :100%;
        }
        .abc{
            background:#ecf0f1;
            border:#ccc 1px solid;
            border-bottom:#ccc 2px solid;
            padding: 8px;
            width:250px;
            font-family:Poppins;
            margin-top:10px;
            font-size:1em;
            border-radius:4px;
        }
        .btn{
            background:#005af0;
            padding-top:5px;
            width:150px;
            height:40px;
            padding-bottom:5px;
            color:white;
            border-radius:30px;
            border: #005af0 1px solid;
            margin-top:20px;
            margin-bottom:20px;
            margin-left:16px;
            font-weight:800;
            font-size:0.8em;
            transition:transform .2s;
        }
        .btn:hover{
            transform:scale(1.1); 
            opacity:1;
            box-shadow:0 6px 10px 0 rgba(0, 0, 0, 0.5), 0 8px 22px 0 rgba(0, 0, 0, 0.19);
        }
        .box{
            margin-top: 5%;
            
            background-color: rgba(255, 255, 255, 0.5);
            
            border-radius:10px;
           
            padding: 20px 70px 20px 60px;
            border: #ecf0f1 4px solid; 
            box-shadow:0 6px 10px 0 rgba(0, 0, 0, 2), 0 8px 22px 0 rgba(0, 0, 0, 0.19);
        }
        form{	
            font-family:Poppins;
        }
        .heading{
            color:#005af0;
        }
        
    </style>

	<script>
    	
    	function verify(){
        	res = true;
            	var pass = document.forms["f1"]["pass"].value;
                var conf_pass = document.forms["f1"]["conf_pass"].value;
                
                const regexExp = /^[6-9]\d{9}$/gi;
                var mobile = document.forms["f1"]["mobile"].value;
               
                if(pass != conf_pass){
                	window.alert("Password and Confirm password must be same")
                    res = false;
				}

                if(regexExp.test(mobile)==false){
                    window.alert("Invalid Mobile number")
                    res=false;
                }
                    
				
                
            return res;
        }
    </script>
</head>
<body>
<section class="">

<div class="row"> 
        <div class="col-lg-3 col-md-3"> </div>
        <form class="col-lg-6 col-md-6 box" method="post">
        <center> <h3>Login  </h3> </center>
                        <div class="mb-3 mt-4">
                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="uname" name="uname" placeholder="name@example.com" required>
                </div>
                <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Password</label>
                <input class="form-control" type="password" name="pass"  id="pass" required>
                </div>
                <div class="mb-3"> 
                 <center > <input class="btn" name="btn_sub" type="submit" value="Login">  </center>
                </div>
                <center> <p> Are you a new user ? <a href="RegistrationF.php" >  Click Here </a> </p> </center>
                
        </form>
        </div>
        </section>
        <?php
        if(isset($_POST["btn_sub"]))
		{
			  $mailid = $_POST['uname'];
			  $pswd = $_POST['pass'];
			  $sel = "SELECT id,ref_id,name,email,mobile_no,password,role FROM login WHERE email = '".$mailid."' and password='".$pswd."'; ";
                echo $sel;
			   if($res = mysqli_query($conn,$sel))
				{
				    if($row = mysqli_fetch_row($res))
				    {         
					  if(($mailid == $row[3]) && ($pswd == $row[5]) && ($row[6] == "A"))
                        {   $_SESSION['oname'] = $row[3];
                            $_SESSION['oid'] = $row[0];
                            $_SESSION['ref_id'] = $row[1];
                            header("Location:index_admin.php");
                            
						}else if(($mailid == $row[3]) && ($pswd == $row[5]) && ($row[6] == "U")){
                            $_SESSION['name'] = $row[3];
                            $_SESSION['id'] = $row[0];
                            $_SESSION['ref_idu'] = $row[1];
							header("Location:index_user.php");
                        }
						else
						{
							echo "Not found";
						}
				    }else{
					echo "Query problem";
				    }
			  }else{
                  echo "not getch";
              }
		}else{
            
        } 
        
        ?>
    

</body>
</html>
