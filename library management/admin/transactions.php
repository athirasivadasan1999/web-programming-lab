<?php
    session_start();
    if(!isset($_SESSION['user'])){
        header("location:login.php");
    }
    include "connect.php";


$result = mysqli_query($con, "SELECT * FROM issue");
?>
 
<html>
<head>    
    <title>book issue statements</title>
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
    <h2><b>Book Transactions</b></h2>
    <table>
        <tr bgcolor='lightpink'>
            <td>Ref. NO</td>
            <td>User Name</td>
            <td>Book ID</td>
            <td>Issue Date</td>
            <td>Return Date</td>
            <td>Status</td>
          
        </tr>
        <?php 
         
        while($res = mysqli_fetch_array($result)) {         
    
            echo "<tr>";
            echo "<td>".$res['no']."</td>";
            echo "<td>".$res['name']."</td>";
            echo "<td>".$res['id']."</td>";    
            echo "<td>".$res['date']."</td>";
            echo "<td>".$res['ret']."</td>"; 
            if($res['status']==0){
                echo "<td style=\"color:green\">closed</td>"; 
              }
              else{
                echo "<td style=\"color:red\">open</td>"; 
              }
             
                   
       
        }
        ?>
    </table>
</body>
</html>
