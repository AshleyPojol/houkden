<?php
session_start();

include("./database/db_conn.php");

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // If not logged in, redirect to the login page
    header("Location: login.php");
    exit();
}

// Retrieve the user's information from the database
$username = $_SESSION['username'];
$sql = "SELECT * FROM register WHERE username='$username'";
$result = mysqli_query($conn, $sql);

if (!$result || mysqli_num_rows($result) != 1) {
    // If user not found or multiple users found (should not happen), display an error
    echo "Error: User not found or multiple users found.";
    exit();
}

$user = mysqli_fetch_assoc($result);

// Close the database connection
mysqli_close($conn);

// Logout functionality
if (isset($_POST['logout'])) {
    // Destroy the session
    session_destroy();
    // Redirect to the login page
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="css/profile.css"> 

</head>
<body>
    <?php 
    // Conditionally include header based on usertype
    if ($user['usertype'] == 'admin') {
        include('header-admin.php');
    } else {
        include('header.php');
    }
    ?> 

    <section class="Profile">
        <div class="container">
            <h2>Profile</h2>
            <div>
                <p><strong>First Name:</strong> <?php echo $user['fname']; ?></p>
                <p><strong>Last Name:</strong> <?php echo $user['lname']; ?></p>
                <p><strong>Username:</strong> <?php echo $user['username']; ?></p>
                <p><strong>Usertype:</strong> <?php echo $user['usertype']; ?></p>

            </div>
            <form method="post">
                <button type="submit" name="logout">Logout</button>
            </form>
        </div>
    </section>
    <?php include('footer.php'); ?> 

</body>
</html>
