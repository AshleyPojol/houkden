<?php
    $sname= "localhost";
    $uname= "root"; 
    $password = "";
    $db_name = "houkden";
    $conn = new mysqli($sname, $uname, $password, $db_name, 3306);
    if($conn->connect_error){
     die("Connection Failed".$conn->connect_error);
}
 // echo "Connection Success";
    
 
?>
