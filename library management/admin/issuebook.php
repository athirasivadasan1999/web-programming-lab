<?php
  session_start();
  if(!isset($_SESSION['user'])){
	  header("location:../login.php");
  }
  include "connect.php";
?>

<html>

<head>
    <title>Student registration</title>
</head>
<style>
    table{
        background-color: white;
        margin-left: auto;
        margin-right: auto;
        margin-top:4em;
        padding:1em;
    
        border-radius:15px;
    }
    tr,td,th{
        padding:1em;
        text-align: left;
    }
    
</style>
<body style="background-color:#CCFB5D">
 
    <form name="form" action="#" method="POST">
        <table>
             <tr>
             <th colspan="2" style="text-align:center"><h2 ><b>Issue Book</b></h2></th>
            </tr>
         
            <tr>
                <th>User Name</th>
                <td><input type="text" name="uname"> </td>
            </tr>
            <tr>
                <th>Book ID</th>
                <td><input type="text" name="id"> </td>
            </tr>
            <tr>
                <th>Issue Date </th>
                <td><input type="text" name="date"> </td>
            </tr>
            
            <tr class="center">
                <th colspan="2"><input class="sb-btn" type="submit" value="submit" name="submit"></th>
            </tr>
        </table>
    </form>
<?php


    if(isset($_POST['submit'])){

        $uname = $_POST['uname'];  
        $bookid = $_POST['id'];  
        $issuedate = $_POST['date'];  
   
            $book_check = "select * from book where id='$bookid'";
            $book_result = mysqli_query($con,$book_check);
            $book_count = mysqli_num_rows($book_result);

            $user_check = "select * from user_details where name='$uname'";
            $user_result = mysqli_query($con,$user_check);
            $user_count = mysqli_num_rows($user_result);
            

            while($res = mysqli_fetch_array($book_result)){

                $status= $res['status'];

            }

            if($user_count < 1 || $book_count < 1){
                if($user_count < 1){
                    echo "<script>alert(\"Username of student wrong !!\");</script>>";
                }
                if($book_count < 1){
                    echo "<script>alert(\"Book ID wrong !!\");</script>";
                }
    
            }
            else if($status == 0){
                echo "<script>alert(\"Book Not Available Now !!\");</script>";
            }
            else{
                $query = "insert into issue (id,name,date,status) values ($bookid,'$uname','$issuedate',1)";
                if(mysqli_query($con,$query)){
                    $result = mysqli_query($con, "UPDATE book SET status='1' WHERE id=$bookid");
                    echo "<script>alert(\"Success\");</script>";
                }
                else{
                    //echo "error".$query.mysqli_error($con);
                    echo "<script>alert(\"Connection error !! contact  administrator !!\");</script>";
                }
            }
    }
?>
   
</body>
</html>