<?php
  session_start();
  if(!isset($_SESSION['user'])){
	  header("location:../login.php");
  }
  include "connect.php";
?>

<html>
<head>
 <style>
   table{
     width:90%;
   }
   tr,td,th{
     text-align:center;
   }
   td{
     padding-top:5px;
   }
    </style>
</head>
<body style="background-color:#CCFB5D">
<h2 ><b>Approve user request</b></h2>
</body>
</html>

<?php

       
        $query = "select * from user_details where status=0";
        $values = mysqli_query($con,$query);
        echo '<table id="myTable" style="margin-left:auto;margin-right:auto;margin-top:3em;border-collapse:collapse;"><th>Name</th><th>Admb no</th><th>Mobile</th><th>User name</th><th>Decision</th>';
        if(mysqli_num_rows($values)){
           
                while($row=mysqli_fetch_array($values)){
                    
                    echo '<form action="#" method="POST"><tr>';
                        echo '<td>';
                            echo $row[0];
                        echo '</td>';
                        echo '<td>';
                            echo $row[1];
                        echo '</td>';
                        echo '<td>';
                            echo $row[2];
                        echo '</td>';
                        echo '<td>';
                        ?>
                            <input style="border:none;text-align:center" readonly name="user" required type="text" placeholder="page name" value="<?php echo $row['user']; ?>">
                        <?php
                        echo '</td>';
                        echo '<td>';
                            echo "<input  type='submit' name='accept' value='Accept' style='background-color:green;'> <input  type='submit' name='reject' value='Reject' style='background-color:red;'>";
                        echo '</td>';
                    echo '</tr></form>';
                };        
                        echo '</table><br><br>';
                       
        }
        else{
                echo "<script>alert('Nothing is active !');</script>";
        }
    

?>

<?php
    if(array_key_exists('accept', $_POST)) { 
        $name = $_POST['user'];

        $query1 = "UPDATE `login` SET status=1 WHERE user='$name'";
        $query2 = "UPDATE user_details SET status=1 WHERE user='$name'";
        mysqli_query($con,$query1);
        mysqli_query($con,$query2);
        echo "<script>alert('added succesfully .')</script>";
        header("location:stdapproval.php");

        
    } 
    else if(array_key_exists('reject', $_POST)) { 
        $user = $_POST['user'];
        $query1 = "delete  from login where user='$user'";
        $query2 = "delete  from user_details where user='$user'";
        mysqli_query($con,$query1);
        mysqli_query($con,$query2);
        echo "<script>alert('rejected succesfully .')</script>"; 
        header("location:stdapproval.php");
    } 

  
?>