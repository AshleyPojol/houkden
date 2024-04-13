<?php
session_start();
if(!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
include('./database/db_conn.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brewleaf</title>
    <link rel="stylesheet" href="css/index.css"> 
</head>
<body>
    <?php include('header-admin.php'); ?> 

    <?php include('home-admin.php'); ?> 

    <?php include('footer.php'); ?> 
    

</html>
