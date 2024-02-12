<?php
// Database credentials
$db = "houkden";
$host = "localhost";
$user = "root";
$password = "";

// Create a database connection
$conn = new mysqli($host, $user, $password, $db);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $email = $_POST["email"];
    $name = $_POST["name"];
    $section = $_POST["section"];

    $sql = "INSERT INTO main (email, name, section) VALUES (?, ?, ?)";

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $email, $fullName, $section);

    // Execute the statement
    if ($stmt->execute()) {
        echo '<p class="text-center">Data submitted successfully!</p>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>PHP with Bootstrap</title>
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center">Hello, PHP with Bootstrap!</h1>

    <div class="alert alert-success" role="alert">
        This is a Bootstrap alert!
    </div>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Full Name</label>
            <input type="name" class="form-control" id="exampleFormControlInput1" placeholder="Ricwel Vince Tiu">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Section</label>
            <input type="name" class="form-control" id="exampleFormControlInput1" placeholder="Magenta">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
