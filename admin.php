<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/header.css">
</head>
<body>
<?php include('header-admin.php'); ?> 
<section class="Upd">
<button class="btn btn-primary my-5"> <a href="signup.php">Add User</a></button>
</section>

<section class="table">
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Username</th>
      <th scope="col">Password</th>
      <th scope="col">Usertype</th>
      <th scope="col">Age</th>
      <th scope="col">Function</th>
    </tr>
  </thead>
  <tbody>
  <?php
  include("./database/db_conn.php");

  $sql = "SELECT * FROM register";
  $result = mysqli_query($conn, $sql);

  if ($result) {
      while ($row = mysqli_fetch_assoc($result)) {
          $id=$row['id'];
          $fname=$row['fname'];
          $lname=$row['lname'];
          $username=$row['username'];
          $password=$row['password'];
          $usertype=$row['usertype'];
          $age=$row['age'];

          echo ' <tr>
          <th scope="row">'.$id.'</th>
          <td>'.$fname.'</td>
          <td>'.$lname.'</td>
          <td>'.$username.'</td>
          <td>'.$password.'</td>
          <td>'.$usertype.'</td>
          <td>'.$age.'</td>
          <td>
          <button class="btn btn-primary"><a href="update.php?updateid='.$id.'">Update</a></button>
          <button class="btn btn-danger"><a href="delete.php?deleteid='.$id.'">Delete</a></button>
          </td>   
      </tr>';
      }
  } else {
      echo "Error: " . mysqli_error($conn); 
  }
  ?>



  </tbody>
</table>
</section>


<?php include('footer.php'); ?> 

</body>
</html>
