<?php
$conn = mysqli_connect("localhost","root","","laptopsdb");

$name = $_POST['name'];
$wa   =  $_POST['whatsapp'];
$email= $_POST['email'];
$add  = $_POST['address'];
$lap  = $_POST['laptop_id'];

// save user
mysqli_query($conn,"INSERT INTO users(name,whatsapp,email,address)
VALUES('$name','$wa','$email','$add')");

$user_id = mysqli_insert_id($conn);

// save order
mysqli_query($conn,"INSERT INTO orders(user_id,laptop_id) VALUES('$user_id','$lap')");

// mark laptop sold to prevent next buyer
mysqli_query($conn,"UPDATE laptops SET status='sold' WHERE id=$lap");

header("Location: success.php");
exit;
?>
