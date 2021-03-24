<?php
  session_start();
  if(!isset($_SESSION['user'])){
	  header("location:../login.php");
  }
  include "connect.php";
?>

<?php


if(isset($_POST['update']))
{
   $no = $_GET['id'];
    $name=$_POST['name'];
    $bookid = $_POST['bookid'];
    $issue_date=$_POST['issue'];
    $return_date=$_POST['return_date'];

    
        $result_issue = mysqli_query($con, "UPDATE issue SET ret='$return_date',status='1' WHERE no=$no");
        if(!$result_issue){
            echo "<script>alert(\"Book issue problem !!\");</script>";
            header("Location: return book.php");
        }
        $result_book = mysqli_query($con, "UPDATE book SET status=1 WHERE id=$bookid");
        if(!$result_book){
            echo "<script>alert(\"Book Data not updated problem !!\");</script>";
        }
       
        echo "<script>alert(\"Return Succesfully .. \");</script>";
        header("Location: return book.php");
    
}
?>

<?php
$no = $_GET['id'];
//$no = 3;

$result = mysqli_query($con, "SELECT * FROM issue WHERE no=$no");

while($res = mysqli_fetch_array($result)){

    $no= $res['no'];
    $name= $res['name'];
    $bookid=$res['id'];
    $issue_date= $res['date'];
    $return= $res['ret'];
}
?>


<html>
<head>
    <title>Return Book</title>
    <style>
        table{
            margin-top:3em;
            margin-left:auto;
            margin-right:auto;
            margin-top:2em;
            width:90%;
        }
 tr,td,th{
     text-align:center;
 }

</style>
</head>

<body style="background-color:#CCFB5D">
 <h2 ><b >return date of books</b></h2>
    <form name="form1" method="POST" action="#">
        <table>
            <tr>
                <td>Ref. No</td>
                <td><input readonly type="text" name="no" value="<?php echo $no;?>"></td>
            </tr>
            <tr>
                <td>User Name</td>
                <td><input readonly type="text" name="name" value="<?php echo $name;?>"></td>
            </tr>
            <tr>
                <td>Book ID</td>
                <td><input readonly type="text" name="bookid" value="<?php echo $bookid;?>"></td>
            </tr>
            <tr>
                <td>Issue Date</td>
                <td><input readonly type="text" name="issue" value="<?php echo $issue_date;?>"></td>
            </tr>
            <tr>
                <td>Return Date</td>
                <td><input type="text" name="return_date" value="<?php echo $return;?>"></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:center;"><input style="padding:5px;border:none;background-color:red;color:white" type="submit" name="update" value="UPDATE"></td>
            </tr>
        </table>
    </form>
</body>
</html>
