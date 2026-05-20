<?php
session_start();
if(!isset($_SESSION['admin'])) header("Location: login.php"); // secure access




$conn = mysqli_connect("localhost","root","","laptopsdb");

// Fetch stats
$totalLaptops = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as total FROM laptops"))['total'];
$availableLaptops = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as total FROM laptops WHERE status='available'"))['total'];
$soldLaptops = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as total FROM laptops WHERE status='sold'"))['total'];
$totalOrders = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as total FROM orders"))['total'];

// Fetch laptops
$laptops = mysqli_query($conn,"SELECT * FROM laptops ORDER BY added_date DESC");

// Fetch orders
$orders = mysqli_query($conn,"SELECT o.order_id,u.name,u.whatsapp,u.email,u.address,l.name as laptop_name,l.model,l.price FROM orders o JOIN users u ON o.user_id=u.id JOIN laptops l ON o.laptop_id=l.id ORDER BY o.order_date DESC");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Laptop Store</title>
<link rel="stylesheet" href="../assest/css/style.css">
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
        </nav>
    </div>
</header>
<main class="container">

<h1>Laptop Zone</h1>

<!-- Stats Cards -->
<div class="dashboard-cards">
    <div class="card stat-card total" onclick="shift()" >
        <h3>Total Laptops</h3>
        <p ><?php echo $totalLaptops; ?></p>
    </div>
    <div class="card stat-card available" >
        <h3>Available Laptops</h3>
        <p><?php echo $availableLaptops; ?></p>
    </div>
    <div class="card stat-card sold">
        <h3>Sold Laptops</h3>
        <p><?php echo $soldLaptops; ?></p>
    </div>
    <div class="card stat-card orders">
        <h3>Total Orders</h3>
        <p><?php echo $totalOrders; ?></p>
    </div>
</div>

<!-- Laptops Table -->
<h2>Laptops</h2>
<a class="button add"  href="add_laptop.php" title="Add Laptop"><i class="fas fa-plus"></i> Add Laptop</a>
         <a href="trash.php" class="button add"  title="Trash"> <i class="fas fa-trash"></i> Trash</a>
<table class="admin-table">
    <thead>
        <tr>
            <th>ID</th><th>Name</th><th>Model</th><th>Price</th><th>Status</th><th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php while($lap = mysqli_fetch_assoc($laptops)){ ?>
        <tr>
            <td><?php echo $lap['id']; ?></td>
            <td><?php echo $lap['name']; ?></td>
            <td><?php echo $lap['model']; ?></td>
            <td>Rs <?php echo $lap['price']; ?></td>
            <td><?php echo ucfirst($lap['status']); ?></td>
            <td>
                <a href="edit_laptop.php?id=<?php echo $lap['id']; ?>" class="btn-edit" title="Edit Record"><i class="fas fa-edit"></i></a>
                <a href="delete.php?id=<?php echo $lap['id']; ?>" class="btn-delete" onclick="return confirm('Are you sure?')" title="Delete Record"><i class="fas fa-trash-alt"></i></a>
         
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<!-- Orders Table -->
<h2>Orders</h2>
<table class="admin-table">
    <thead>
        <tr>
            <th>User Name</th><th>WhatsApp</th><th>Email</th><th>Laptop</th><th>Model</th><th>Price</th>
        </tr>
    </thead>
    <tbody>
        <?php while($o = mysqli_fetch_assoc($orders)){ ?>
        <tr>
           
            <td><?php echo $o['name']; ?></td>
           

<td>
    <?php echo $o['whatsapp']; ?>
    <a href="https://wa.me/<?php echo $o['whatsapp']; ?>"
       target="_blank"
       title="Chat on WhatsApp"
       style="margin-left:8px;color:#25D366;font-size:20px;">
        <i class="fab fa-whatsapp"></i>
    </a>
</td>

<td>
    <a href="mailto:<?php echo $o['email']; ?>" title="Send Email">
        <?php echo $o['email']; ?>
        <i class="fas fa-envelope"></i>
    </a>
</td>



            <td><?php echo $o['laptop_name']; ?></td>
            <td><?php echo $o['model']; ?></td>
            <td>Rs <?php echo $o['price']; ?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>


<a href="logout.php" class="button logout-btn"><i class="fas fa-sign-out-alt"></i> Logout</a>
</main>
<footer>
    <div class="container">
        <p>&copy; <?php echo date("Y"); ?> Laptop Store. All Rights Reserved.</p>
        <div class="social-icons">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-whatsapp"></i></a>
        </div>
    </div>
</footer>
<script>
    function shift(){
        window.location.href = "all_laptops.php";
    }
</script>

</body>
</html>


