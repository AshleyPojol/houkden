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
     <form id="loginForm" action="login.php" method="post" onsubmit="return isValid()">
     	<h2>Log-In</h2>
		<p> Brew Leaf Milk Tea</p>

		<div class="username">
     	<label>Username</label>
     	<input type="text" name="uname" placeholder="Username"><br>
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
