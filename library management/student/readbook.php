<?php
session_start();
   include "connect.php";

?>

<html lang="en">
<head>
    <link href="library/search.css" type="text/css" rel="stylesheet">
    <style>
    tr,td,th{
        padding:10px;
        text-align:center;
        border:1px solid red;
    }
   
    .head{
  	color:black;
  	text-align:center;
	font-size:40px;
    }
    table{
        width:90%;
        
    }
    </style>
</head>
<body style="background-color:#B2C248" ><h2 class="head"> DETAILS OF BOOK</h2>

<h5>Search</h5>

<input type="text" name="search" id="myInput" onkeyup="myFunction()" placeholder="Search.." class="search-bar">
<?php
 
    
        $query = "select * from book";
        $values = mysqli_query($con,$query);
        echo '<table id="myTable" style="margin-left:auto;margin-right:auto;margin-top:3em;border-collapse:collapse;"><th>ID</th><th>TITLE</th><th>AUTHOR NO</th><th>EDITION</th><th>PUBLISHER</th><th>AVAILABILITY</th>';
        if(mysqli_num_rows($values)){
            $i = 1;
                while($row=mysqli_fetch_array($values)){
            
                    echo "<tr>";
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
                            echo $row[3];
                        echo '</td>';
                        echo '<td>';
                            echo $row[4];
                        echo '</td>';
                        echo '<td>';
                        if($row["status"] == 1){
                            echo "<h4 style=\"color:green;\">Available</h4>";

                        }
                        else{
                            echo "<h4 style=\"color:red;\">Not Available</h4>";
                        }
                        echo '</td>';
                    echo '</tr>';
                    
                }
        }
        else{
                echo "error".$query.mysqli_error($con);
        }
    

?>
<script src="library/js/search.js"></script>
<div>
</body>
</html>

