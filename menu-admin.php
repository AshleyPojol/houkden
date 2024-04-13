<?php
session_start();
include ("./database/db_conn.php");

$errors = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $food_type = $_POST['food_type'];
    $inclusion = $_POST['inclusion']; // Updated field for food inclusion
    $size = $_POST['size']; // Updated field for food size

    // Validate form data (you can add more validation as needed)
    if (empty($name)) {
        $errors['name'] = "Name is required.";
    }
    if (empty($price)) {
        $errors['price'] = "Price is required.";
    } elseif (!is_numeric($price) || $price <= 0) {
        $errors['price'] = "Price must be a valid positive number.";
    }
    // You can add more validation for other fields here

    // If there are no validation errors, insert the food item into the database
    if (empty($errors)) {
        $insert_query = "INSERT INTO menu (name, description, price, food_type, inclusion, size) VALUES ('$name', '$description', '$price', '$food_type', '$inclusion', '$size')";
        $result = mysqli_query($conn, $insert_query);
        
        if ($result) {
            echo "<script>alert('Item Added Successfully'); window.location='menu-admin.php';</script>";
        } else {
            echo "<script>alert('Adding Failed'); window.location='menu-admin.php';</script>";
        }
    }
}

// Close the database connection
mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Food Item</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php include('header-admin.php'); ?> 

<div class="container">
        <h2>Add New Food Item</h2>
        <form action="menu-admin.php" method="POST">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
                <?php if(isset($errors['name'])) echo "<span class='error'>{$errors['name']}</span>"; ?>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" name="description" rows="3"></textarea>
                <?php if(isset($errors['description'])) echo "<span class='error'>{$errors['description']}</span>"; ?>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" id="price" name="price" step="0.01" min="0" required>
                <?php if(isset($errors['price'])) echo "<span class='error'>{$errors['price']}</span>"; ?>
            </div>
            <div class="form-group">
                <label for="food_type">Food Type:</label>
                <select id="food_type" name="food_type" required>
                    <option value="Milktea">Milktea</option>
                    <option value="Hot Brew">Hot Brew</option>
                    <option value="Fruit Tea">Fruit Tea</option>
                    <option value="Iced Brew">Iced Brew</option>
                    <option value="Frappy">Frappy</option>
                    <option value="Creamy Fruit Tea">Creamy Fruit Tea</option>
                    <option value="Add-Ons">Add-Ons</option>
                </select>
                
            </div>

            <div class="form-group">
                <label for="inclusion">Inclusion:</label>
                <select id="inclusion" name="inclusion" required>
                    <option value="Free Pearl">Free Pearl</option>
                    <option value="Free Creamy Puff">Free Creamy Puff</option>
                    <option value="Fruit Nata De Coco">Fruit Nata De Coco</option>
                    <option value="Free Whip-Cream">Free Whip-Cream</option>
                </select>
                
            </div>

            <div class="form-group">
                <label for="size">Size:</label>
                <select id="size" name="size" required>
                    <option value="Medium">Medium</option>
                    <option value="Medium">Grande</option>
                </select>
            </div>
            <button type="submit">Add Food Item</button>
        </form>
    </div>

    

    <?php include('footer.php'); ?> 

</body>
</html>