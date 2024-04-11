<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit; 
}

include("./database/db_conn.php");

$username = $_SESSION['username'];

// Fetch user details from the database
$sql = "SELECT fname, lname, age, usertype, username FROM register WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Check if user exists
if (!$user) {
    // Redirect to login page if user not found
    header("Location: login.php");
    exit;
}

// Extract user details
$fname = $user['fname'];
$lname = $user['lname'];
$age = $user['age'];
$username = $user['username'];
$usertype =$user['usertype'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="style.css"> <!-- Include your CSS file -->
</head>
<body>
    <h1>Welcome, <?php echo $fname . ' ' . $lname; ?></h1>
    <p>Username: <?php echo $username; ?></p>
    <p>Age: <?php echo $age; ?></p>
    <p>Usertype: <?php echo $usertype; ?></p>
    <a href="index.php"> Go Back to Website </a> </br>
    <a href="logout.php">Logout</a> 
</body>
</html>
