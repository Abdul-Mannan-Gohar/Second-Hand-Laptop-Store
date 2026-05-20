<?php
include('include/header.php'); // Header file
$conn = mysqli_connect("localhost","root","","laptopsdb");

// Get laptops for hero slideshow (first 5 for example)
$heroLaptops = mysqli_query($conn,"SELECT * FROM laptops");

// Get all laptops
$allLaptops = mysqli_query($conn,"SELECT * FROM laptops");
?>

<!-- Hero Section -->
<section class="hero" id="hero">
  <?php $i=0; while($row=mysqli_fetch_assoc($heroLaptops)){ ?>
    <div class="slide <?php if($i==0) echo 'active'; ?>">
      <img src="uploads/<?php echo $row['photo']; ?>" alt="<?php echo $row['name']; ?>">
      <div class="overlay">
        <h1><?php echo $row['name']; ?></h1>
        <p><?php echo $row['model']; ?></p>
      </div>
    </div>
  <?php $i++; } ?>
</section>

<!-- All Laptops Section -->
<section class="laptops" id="laptops">
 <div  class="nav"> <h2>Available Laptops</h2> <h2>Availabl list</h2> <h2>About Us</h2></div>
  <div class="laptop-grid">
  
    <?php while($lap=mysqli_fetch_assoc($allLaptops)){ ?>
      <div class="laptop-card">
        <img src="uploads/<?php echo $lap['photo']; ?>" alt="<?php echo $lap['name']; ?>">
        <h3><?php echo $lap['name']; ?></h3>
        <p class="model"><?php echo $lap['model']; ?></p>
        <p class="price">Rs <?php echo $lap['price']; ?></p>
        <p class="status <?php echo $lap['status']; ?>"><?php echo ucfirst($lap['status']); ?></p>
        <a href="laptop.php?id=<?php echo $lap['id']; ?>" class="button">View Details</a>
      </div>
    <?php } ?>
  </div>
</section>

<?php include('include/footer.php'); ?>
