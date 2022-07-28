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
    	
    
    </script>
</head>
<body>
    <center>
        <form class="box"  action="val.php" method="post">
            <h2> Sign up</h2>
            <table>
                <tr>
                    <td> <label> User Name : </label> </td>
                    <td> <input  class="abc" type="text" name="uname" id="uname" > </td>
                </tr>
                <tr>
                    <td> <label> Password : </label> </td>
                    <td> <input  class="abc" type="password" name="pass" > </td>
                </tr>
                
            
                <tr>
                    <td> <label> E-Mail : </label> </td>
                    <td> <input  class="abc" type="text" name="email" id="email" > </td>
                </tr>

                <tr>
                    <td> <label> Mobile : </label> </td>
                    <td> <input  class="abc" type="text" name="mobile" id="mobile" > </td>
                </tr>
              
                <tr>
                    <td> </td>
                    <td> <input class="btn" type="submit" name="submit" value="Create Account"> </td>
                </tr>

            </table>
            
        </form>

        <?php

           
              

        

            

        ?>

    </center>

</body>
</html>
