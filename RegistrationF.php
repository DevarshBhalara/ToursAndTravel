<?php
 include "db_connect.php";
 $conn = mysqli_connect($servername,$username,$password,$dbname);
 if(!$conn){
     //echo "Error in Connecting";
 }
 
 ?>

<html>
<head>
    <style>
        body{
            background-image: url(tourism.jpg);
            background-size: cover;
            background-position: top;
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
            width:fit-content;
            background-color: rgba(255, 255, 255, 0.5);
            
            border-radius:10px;
            margin:8px, 0;
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
    <center>
        <form name='f1' class="box"  onsubmit="return verify()" action="reg.php" method="post">
            <h2> Sign up</h2>
            <table>
                <tr>
                    <td> <label> User Name : </label> </td>
                    <td> <input  class="abc" type="text" name="uname" id="uname" minlength="6" maxlength="15" required> </td>
                </tr>
                <tr>
                    <td> <label> Password : </label> </td>
                    <td> <input  class="abc" type="password" name="pass"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" id="pass" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" minlength="8" required> </td>
                </tr>
                <tr>
                    <td> <label> Confirm Password : </label> </td>
                    <td> <input  class="abc" type="password" name="conf_pass" id="conf_pass" minlength="6" required> </td>
                </tr>
                <tr>
                    <td> <label> Mobile : </label> </td>
                    <td> <input  class="abc" type="text" name="mobile" id="mobile" minlength="10" maxlength="10" required> </td>
                </tr>
                <tr>
                    <td> <label> E-Mail : </label> </td>
                    <td> <input  class="abc" type="email" name="email" id="email" required> </td>
                </tr>
                <tr>
                    <td> <label> City : </label> </td>
                    <td> <input class="abc" type="text" name="ucity" id="ucity" required> </td>
                </tr>
                
                <tr>
                    <td> </td>
                    <td> <input class="btn" type="submit" name="create_account" value="Create Account"> </td>
                </tr>
            </table>
            
        </form>

        <?php

           
              

        

            

        ?>

    </center>

</body>
</html>
