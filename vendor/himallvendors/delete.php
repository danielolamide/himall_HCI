<?php

// connect to the database
include('connect.php');

// confirm that the 'id' variable has been set
$id = $_GET['id'];
//Connect DB
//Create query based on the ID passed from you table
//query : delete where Staff_id = $id
// on success delete : redirect the page to original page using header() method

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// sql to delete a record
$sql = "DELETE FROM products WHERE product_id = $id"; 

if (mysqli_query($con, $sql)) {
    mysqli_close($con);
    header('Location: dashboard.php'); //If book.php is your main page where you list your all records
    exit;
} else {
    echo "Error deleting record";
}
?>