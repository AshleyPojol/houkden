<?php
session_start();
?>

<?php
include("./database/db_conn.php");

$id = $_GET['updateid'];

// Fetch user details from the database
$sql = "SELECT * FROM register WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $fname = $row['fname'];
    $lname = $row['lname'];
    $username = $row['username'];
    $password = $row['password'];
    $age = $row['age'];
    $usertype = $row['usertype'];
} else {
    echo "<script>alert('User not found or multiple users found.');</script>";
}

if(isset($_POST['create'])){
    // Retrieve form data
    $fname      = $_POST['fname'];
    $lname      = $_POST['lname'];
    $username   = $_POST['username'];
    $password   = $_POST['password'];
    $age        = $_POST['age'];
    $usertype   = $_POST['usertype']; // Retrieve usertype from the form
  
    // Prepare the update statement
    $sql = "UPDATE register SET fname=?, lname=?, username=?, password=?, age=?, usertype=? WHERE id=?";
    $stmtinsert = $conn->prepare($sql);
    $result = $stmtinsert->execute([$fname, $lname, $username, $password, $age, $usertype, $id]);
    
    if ($result){
      echo "<script>alert('Update Successful'); window.location='admin.php';</script>";
    } else {
      echo "<script>alert('Error: All Fields are Required.');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Account</title>
    
</head>
<body>
  <?php include('header.php'); ?> 

  <section class="Sign">
  <div class="container">
<h2>Update Account</h2>
<p> Brew Leaf Milk Tea</p>
<form class= "needs-validation" action=""  method="post" novalidate required >
  <div class="form-row">
    <div class="form-group col-md-6">
		<label>First Name </label>
      <input type="text" class="form-control" name="fname" placeholder="First name" value="<?php echo isset($fname) ? $fname : ''; ?>" required>
	  <div class="invalid-feedback">
        First Name is required.
      </div>
    </div>
    <div class="form-group col-md-6">
		<label>Last Name </label>
      <input type="text" class="form-control" name="lname" placeholder="Last name" value="<?php echo isset($lname) ? $lname : ''; ?>" required>
	  <div class="invalid-feedback">
        Last Name is required.
      </div>
    </div>

    <div class="form-group col-md-12">
		<label>Age</label>
      <input type="number" class="form-control" name="age" placeholder="Age" value="<?php echo isset($age) ? $age : ''; ?>" required>
	  <div class="invalid-feedback">
        Age is required.
      </div>
    </div>

	<div class="form-group col-md-12">
		<label>Username</label>
	<input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo isset($username) ? $username : ''; ?>" required>
	<div class="invalid-feedback">
       Username is required.
      </div>
	</div>
	<div class="form-group col-md-6">
		<label>Password </label>
      <input type="password" class="form-control" name="password" placeholder="Password" value="<?php echo isset($password) ? $password : ''; ?>" required>
	  <div class="invalid-feedback">
        Password is required.
      </div>
    </div>
    <div class="form-group col-md-6">
		<label>Confirm Password </label>
      <input type="password" class="form-control" name="cpassword" placeholder="Confirm Password" value="<?php echo isset($password) ? $password : ''; ?>" required>
	  <div class="invalid-feedback">
        Password is required.
      </div>
    </div>

    <div class="form-group col-md-12">
    <label>Usertype</label>
    <select class="form-control" name="usertype">
        <option value="user" <?php if(isset($usertype) && $usertype == 'user') echo 'selected'; ?>>User</option>
        <option value="admin" <?php if(isset($usertype) && $usertype == 'admin') echo 'selected'; ?>>Admin</option>
    </select>
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
  <button class="btn btn-primary" type="submit" name= "create">Update</button>
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
