<?php
session_start();
include("./database/db_conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    $errors = array();

    if (empty($username)) {
        $errors['username'] = "Username is required.";
    }

    if (empty($password)) {
        $errors['password'] = "Password is required.";
    }

    if (empty($errors)) {
        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("SELECT * FROM register WHERE username=? AND password=?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            // Fetch the user's information
            $user = $result->fetch_assoc();
            
            // Store the user's first name in a session variable
            $_SESSION['username'] = $user['username'];
            $_SESSION['fname'] = $user['fname'];
			$_SESSION['lname'] = $user['lname'];
            $_SESSION['usertype'] = $user['usertype'];

            
            // Redirect based on usertype
            if ($user['usertype'] == 'admin') {
                echo "<script>alert('Welcome back, " . $user['fname'] . ' ' . $user['lname'] . " Login Success!'); window.location='index-admin.php';</script>";
                exit();
            } elseif ($user['usertype'] == 'user') {
                echo "<script>alert('Welcome back, " . $user['fname'] . ' ' . $user['lname'] . " Login Success!'); window.location='index.php';</script>";
                exit();
            }
        } else {
            $errors['login'] = "Invalid username or password.";
        }
    }
}

// If there are errors, redirect back to the login page and display the errors
if (!empty($errors)) {
    $error_msg = implode("<br>", $errors);
    echo "<script>alert('$error_msg'); window.location='login.php';</script>";
    exit();
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/login.css"> 
</head>
<body>
  <?php include('header.php'); ?> 
  <section class="Log">
  <div class="form">
     <form id="loginForm" action="login.php" method="POST" onsubmit="return isValid()" validate>
     	<h2>Log-In</h2>
		<p> Brew Leaf Milk Tea</p>

		<div class="username">
     	<label>Username</label>
     	<input type="text" name="username" placeholder="Username"><br>
		</div>

		<div class="password">
     	<label>Password</label>
     	<input type="password" name="password" placeholder="Password"><br>
		 </div>

		<div class="login-btn">
     	<button type="submit">Login</button>
		</div>

		<div class="forgot">
    	<a href="forgot_password.php">Forgot Password?</a>
		</div>

		<div class="create">
		<p>Don't have an account? <a href="register.php">Create an Account</a></p>
		</div>

     </form>
	 </div>
	 </div>

  </section>
</html>
