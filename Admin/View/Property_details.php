<?php
session_start();
require_once('../Model/db.php');
$conn=getConnection();


$location = $_GET['location'];


$sql = "SELECT * FROM Property WHERE location = '$location'";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $property = mysqli_fetch_assoc($result);
    echo "<h1>{$property['title']}</h1>";
    echo "<p><strong>Location: </strong>{$property['location']}</p>";
    echo "<p><strong>Description: </strong>{$property['description']}</p>";
    echo "<p><strong>Price: </strong>{$property['price']}</p>";
    echo "<p><strong>Status: </strong>{$property['status']}</p>";
} else {
    echo "Property not found.";
}


?>
