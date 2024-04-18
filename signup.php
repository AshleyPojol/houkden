<?php
session_start();
include ("./database/db_conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve form data
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $age = $_POST['age'];
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Perform validation
  $errors = array();

  if (empty($fname)) {
      $errors['fname'] = "First Name is required.";
  }

  if (empty($lname)) {
      $errors['lname'] = "Last Name is required.";
  }

  if (empty($age)) {
      $errors['age'] = "Age is required.";
  }

  if (empty($username)) {
      $errors['username'] = "Username is required.";
  }

  if (empty($password)) {
      $errors['password'] = "Password is required.";
  }

  // If no errors, registration is successful
  if (empty($errors)) {
      // SQL query to insert user data into the database
      $sql = "INSERT INTO register (fname, lname, age, username, password) VALUES ('$fname', '$lname', '$age', '$username', '$password')";

      // Execute the query
      if (mysqli_query($conn, $sql)) {
          echo "<script>alert('Registration Successful!'); window.location='login.php';</script>";
          exit();
      } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
  }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/signup.css"> 
</head>
<body>
  <?php include('header.php'); ?> 

  <section class="Sign">
  <div class="container">
<h2>Create Account</h2>
<p> Brew Leaf Milk Tea</p>
<form class= "needs-validation" action=""  method="POST" validate >
  <div class="form-row">
    <div class="form-group col-md-6">
		<label>First Name </label>
      <input type="text" class="form-control" name="fname" placeholder="First name" required>
	  <div class="invalid-feedback">
        First Name is required.
      </div>
    </div>
    <div class="form-group col-md-6">
		<label>Last Name </label>
      <input type="text" class="form-control" name="lname" placeholder="Last name" required>
	  <div class="invalid-feedback">
        Last Name is required.
      </div>
    </div>

    <div class="form-group col-md-12">
		<label>Age</label>
      <input type="number" class="form-control" name="age" placeholder="Age" required>
	  <div class="invalid-feedback">
        Age is required.
      </div>
    </div>

	<div class="form-group col-md-12">
		<label>Username</label>
	<input type="text" class="form-control" name="username" placeholder="Username" required>
	<div class="invalid-feedback">
       Username is required.
      </div>
	</div>
	<div class="form-group col-md-6">
		<label>Password </label>
      <input type="password" class="form-control" name="password" placeholder="Password" required>
	  <div class="invalid-feedback">
        Password is required.
      </div>
    </div>
    <div class="form-group col-md-6">
		<label>Confirm Password </label>
      <input type="password" class="form-control" name="cpassword" placeholder="Confirm Password" required>
	  <div class="invalid-feedback">
        Password is required.
      </div>
    </div>

  

    <div class="form-class">
    <div class="custom-control custom-checkbox mb-12">
    <input type="checkbox" class="custom-control-input" id="customControlValidation1" required>
    <label class="custom-control-label" for="customControlValidation1">All the information here is correct.</label>
    <div class="invalid-feedback">Check is required.</div>
  </div>
  </div>
    

  </div>
  <div class="button">
  <button class="btn btn-primary" type="submit" name= "create">Register</button>
  </div>
 
</form>

<!-- Modal -->
<div class="modal fade" id="ageModal" tabindex="-1" role="dialog" aria-labelledby="ageModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ageModalLabel">Terms and Agreement</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Welcome to brewleaf! We're delighted to have you visit us for a delightful milktea experience. Before you proceed, 
          please read the following terms and agreements carefully. These terms outline the rules and responsibilities that apply to customers
          below 18 years old ("Underage Customers") and their guardians when visiting our establishment.</p>
      <a href="term.html">Read Our Terms and Agreement</a>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="continueBtn" type="submit">Continue</button>
      </div>
    </div>
  </div>
</div>

</div>
  </section>
</html>
