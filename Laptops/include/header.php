<?php
// start session for admin pages
if(!isset($noSessionStart)) session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Laptop Store</title>
<link rel="stylesheet" href="assest/css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
<header>
    <div class="header">
        <div class="logo">
            <a href="index.php">LAPTOP</i></a>
        </div>
        <nav>
            <a href="index.php"><i class="fas fa-home"></i> Home</a>
            <a href="admin/login.php"><i class="fas fa-user-shield"></i> Admin</a>
        </nav>
    </div>
</header>
<main class="container">
