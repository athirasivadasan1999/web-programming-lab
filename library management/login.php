<?php
   include "connect.php";
?>

<html>
<head>
   <title>Library Mangement</title>
   <link rel="stylesheet" href="library/css/form.css">
</head>
<body style="background-color:#667C26">
   <center>
	   <b><u>
            <h1>Login</h1>
        </u></b>
	</center>
	<br>


   <form method="POST" action="#" target="_top">
      <table align="center">
         <tr>
            <td>UserId:</td>
            <td><input type="text" name="user" class="input1">
            </td>
         </tr>

         <tr>
            <td> Password:</td>
            <td><input type="password" name="pass" class="input1">
            </td>
         </tr>
      </table>

      <div align="center">
         <input type="submit" value="Login" class="input2" name="submit">
      </div>

      <div align="center">
         <h5>New User?</h5><a href="signup.php" target="_blank">registration</a></h5>
	  </div>

   </form> 
</body>

</html>
<?php

   if(isset($_POST['submit'])){
	$user=$_POST['user'];
	$pass=$_POST['pass'];

    $result=mysqli_query($con,"select * from login where user='$user' and password='$pass'");
	if(!$result){
		echo "<script>alert('errorrr');</script>";
	}
	else{
		$count = mysqli_num_rows($result);
	
		while($row=mysqli_fetch_array($result)){
			$type =$row[2]; 
			$status =$row[3];
			echo $row[2];
		}
		if($count == 1){
			if($status == 1){
				if($type == 'admin'){
					session_start();
					$_SESSION['user'] = $user;
					header("location:admin/index.html");
				}
				else if($type == 'student'){
					session_start();
					$_SESSION['user'] = $user;
					header("location:student/index.php");
				}
			}
			else{
				echo "<script>alert('not aproved by librarian');</script>";
			}
	
		}
		else{
			echo "<script>alert('authentication failed');</script>";
		}
	}

   }
?>