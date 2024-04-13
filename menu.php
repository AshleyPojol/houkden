<?php
session_start();

include ("./database/db_conn.php");

if(!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit();
}

$foods = []; 

$sql = "SELECT name, description, price, size, food_type FROM menu"; 
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $existing_key = array_search($row['name'], array_column($foods, 'name'));
        if ($existing_key !== false) {
            $foods[$existing_key]['price'][] = $row['price'];
            $foods[$existing_key]['size'][] = $row['size']; 
        } else {
            $row['price'] = [$row['price']]; 
            $row['size'] = [$row['size']]; 
            $foods[] = $row;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brewleaf</title>
    <link rel="stylesheet" href="css/menu.css"> 
</head>
<body>
  <?php include('header.php'); ?> 

  <section class="Navi">
    <div class="navigationism">
   <ul class="nav">
   <li class="nav-item">
    <a class="nav-link active" class="Drt" href="#milktea">Milktea</a>
</li>
  <li class="nav-item">
    <a class="nav-link active" class="drt" href="#hot">Hot Brew</a>
</li>
<li class="nav-item">
    <a class="nav-link active" class="drt" href="#fruit">Fruit Tea</a>
</li>
<li class="nav-item">
    <a class="nav-link active" class="drt" href="#ice">Iced Brew</a>
</li>
<li class="nav-item">
    <a class="nav-link active" class="drt" href="#frappe">Frappy</a>
</li>
<li class="nav-item">
    <a class="nav-link active" class="drt" href="#creamy">Creamy Fruit Tea</a>
</li>
<li class="nav-item">
    <a class="nav-link active" class="drt" href="#addsons">Add-Ons</a>
</li>
<form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
</ul>
    </div>
  </section>

<?php
// Initialize $food_type variable before the loop
$food_type = null;

// Loop through the $foods array and display food items
foreach ($foods as $food) {

  if ($food['food_type'] !== $food_type) {
    echo "<section class='hotbrew'  ><h1 class='hotbrew-menu'>{$food['food_type']}</h1></section>";
    $food_type = $food['food_type'];
}

echo "
<section class='hotbrew' id='hot'>
<div class='col-sm-6'>
    <div class='card'>
        <div class='card-body'>
            <h5 class='card-title'>{$food['name']}</h5>
            <p class='card-text'>{$food['description']}</p>";

// Display each price and size as a separate button
foreach ($food['price'] as $index => $price) {
    $size = $food['size'][$index];
    echo "<a href='#' class='btn btn-primary'>₱" . number_format($price, 2) . " $size</a>";
}

echo "
</section>
</div>
    </div>
</div>";
}
?>

<?php include('footer.php'); ?> 
</body>
</html>
