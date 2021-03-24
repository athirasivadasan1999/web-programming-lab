<?php
   include "connect.php";
?>

<html>
<head>
  <title>Student Registration</title>
  <link rel="stylesheet" href="library/css/form.css">   
</head>
   <body style="background-color:#667C26">
      
      <center><b><u><h1>Student Registration</h1></u></b></center><br>
     
  
     
      <form method = "POST" action ="#">
         <table align="center">
            <tr>
               <td>Name:</td>
               <td><input type = "text" name = "name" class="input1">
         
               </td>
            </tr>
           <tr>
               <td>Admission Number:</td>
               <td><input type = "text" name = "admnno" class="input1">
              
               </td>
            </tr>
            <tr>
      
            <tr>
               <td>Phone Number:</td>
               <td> <input type = "text" name = "phno" class="input1" maxlength="10">
                 
               </td>
            </tr>
            <tr>
               <td>Username:</td>
               <td><input type = "password" name = "user" class="input1">
               
               </td>
            </tr>
            
          <tr>
               <td>Enter Password:</td>
               <td><input type = "password" name = "pass" class="input1">
               
               </td>
            </tr>
           
				
         </table>
          <br><br>
    <div align="center">
       <input type="submit" value="Register" class="input2" name="submit">&nbsp&nbsp&nbsp
        <input type="reset" value="close" class="input2">
    </div>
			
      </form>
   </body>
   </html>
   <?php

    if(isset($_POST['submit'])){
        $name = $_POST['name'];  
        $adno = $_POST['admnno']; 
        $mobile = $_POST['phno'];  
        $user = $_POST['user'];  
        $password = $_POST['pass'];
   

            $query = "insert into user_details values('$name','$adno','$mobile','$user',0)";
            $query1 = "insert into login values('$user','$password','student',0)";

            $check_login="select * from login where user='$user'";
            $result = mysqli_query($con,$check_login);
            $count = mysqli_num_rows($result);

            if($count <= 0){
                if(mysqli_query($con,$query) && mysqli_query($con,$query1)){
                    echo "<script>alert('success');</script>";
                }
                else{
                    echo "error".$query.mysqli_error($con);
                    echo "error".$query1.mysqli_error($con);
                }
            }

            else{
                echo "<script>alert('Try another username !!!');</script>";
            }
    }
?>