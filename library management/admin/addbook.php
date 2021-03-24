<?php
  session_start();
  if(!isset($_SESSION['user'])){
	  header("location:../login.php");
  }
  include "connect.php";
?>

<html>

<head>
    <title>Add Book</title>
</head>
<style>
   table{
      margin-top:20%;
      margin-left:auto;
      margin-right:auto;
   }
   th{
      text-align:left;
   }
</style>
<body style="background-color:#B2C248">
<?php

    if(isset($_POST['submit'])){
      $id = $_POST['id'];  
		$name = $_POST['name'];  
        $author = $_POST['author'];  
        $edition = $_POST['edition'];  
        $publisher = $_POST['publisher'];

        $query = "insert into book values('$id','$name','$author','$edition','$publisher',1)";
            if(mysqli_query($con,$query)){
                header("location:addbook.php");
            }
            else{
                echo "error".$query.mysqli_error($con);
            }
    }
?>

    
    <form name="form" action="#" method="POST">
        <table>
            <tr>
                <th colspan="2" style="text-align:center">
                <h2><b>ADD new book</b></h2>
                </th>
            </tr>
            <tr>
			
			
                <th>ID</th>
                <td> <input  type="text" name="id"> </td>
            </tr>
            <tr>
                <th>NAME</th>
                <td><input type="text" name="name"> </td>
            </tr>
            <tr>
                <th>AUTHOR </th>
                <td><input type="text" name="author"> </td>
            </tr>
            <tr>
                <th>EDITION </th>
                <td><input type="text" name="edition"> </td>
            </tr>
            <tr>
                <th>PUBLISHER </th>
                <td><input type="text" name="publisher"> </td>
            </tr>
            <tr class="center">
                <th colspan="2"><input  type="submit" value="ADD" name="submit"></th>
            </tr>
        </table>
    </form>
   
</body>
</html>