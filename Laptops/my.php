
<?php
$conn = mysqli_connect("localhost","root","","laptopsdb");
$laptops = mysqli_query($conn,"SELECT * FROM laptops");
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Where We Fly - SkyHigh Airlines</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
  <style>
    /* ======== Body ======== */
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #e4e1b5;
      color: #0c2a28;
    }

    /* ======== Header ======== */
    header {
      background-color: #0c2a28;
      color: #ffffff;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 15px 30px;
    }

    header a.logo {
      font-size: 1.8em;
      font-weight: bold;
      color: #cd5b43;
      text-decoration: none;
    }

    header .menu-icon {
      font-size: 1.5em;
      cursor: pointer;
    }

    /* ======== Hero Section ======== */
    .hero {
      background: url('https://images.pexels.com/photos/358443/pexels-photo-358443.jpeg?auto=compress&cs=tinysrgb&w=1200') center/cover no-repeat;
      color: #ffffff;
      text-align: center;
      padding: 120px 20px;
      position: relative;
    }

    .hero h1 {
      font-size: 3em;
      margin-bottom: 20px;
      color: #cd5b43;
    }

    .hero p {
      font-size: 1.2em;
      margin-bottom: 30px;
    }

    .hero .btn {
      padding: 12px 25px;
      background-color: #cd5b43;
      color: #fff;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      font-size: 1em;
      text-decoration: none;
    }

    /* ======== Destinations Grid ======== */
    .destinations {
      padding: 60px 20px;
      text-align: center;
    }

    .destinations h2 {
      font-size: 2.2em;
      margin-bottom: 40px;
      color: #0c2a28;
      position: relative;
    }

    .destinations h2::after {
      content: '';
      display: block;
      width: 80px;
      height: 4px;
      background-color: #cd5b43;
      margin: 10px auto 0;
      border-radius: 5px;
    }

    .destination-cards {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 25px;
    }

    .card {
      background: #fff;
      width: 250px;
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 4px 15px rgba(0,0,0,0.1);
      transition: transform 0.3s, box-shadow 0.3s;
    }

    .card img {
      width: 100%;
      height: 160px;
      object-fit: cover;
    }

    .card h3 {
      margin: 15px 0 8px;
      color: #0c2a28;
    }

    .card p {
      padding: 0 15px 15px;
      font-size: 0.9em;
      color: #333;
    }

    .card .btn {
      display: block;
      margin: 0 15px 15px;
      background-color: #cd5b43;
      padding: 10px;
      border-radius: 8px;
      color: #fff;
      text-decoration: none;
      text-align: center;
    }

    .card:hover {
      transform: translateY(-8px);
      box-shadow: 0 8px 25px rgba(0,0,0,0.2);
    }

    /* ======== Footer ======== */
    footer {
      background-color: #0c2a28;
      color: #fff;
      padding: 40px 20px;
      text-align: center;
    }

    footer a {
      color: #cd5b43;
      text-decoration: none;
      margin: 0 10px;
    }

    footer p {
      margin-top: 20px;
      font-size: 0.9em;
    }

    /* ======== Responsive ======== */
    @media(max-width: 768px){
      .destination-cards {
        flex-direction: column;
        align-items: center;
      }

      .card {
        width: 90%;
      }

      .hero h1 {
        font-size: 2.2em;
      }

      .hero p {
        font-size: 1em;
      }
    }

  </style>
</head>
<body>

  <!-- Header -->
  <header>
    <a href="index.html" class="logo">SkyHigh</a>
    <i class="fas fa-bars menu-icon"></i>
  </header>

  <!-- Hero Section -->
  <section class="hero">
    <h1>Where We Fly</h1>
    <p>Explore our most popular destinations around the globe</p>
    <a href="search.html" class="btn">Search Flights</a>
  </section>

  <!-- Destinations -->
  <section class="destinations">
    <h2>Available lptops</h2>
    <div class="destination-cards">

      <?php while($row = mysqli_fetch_assoc($laptops)){ ?>
<div class="card">
    <img src="uploads/<?php echo $row['photo']; ?>" alt="">
    <h3><?php echo $row['name']; ?></h3>
    <p><?php echo $row['model']; ?></p>
    <p><b>Rs <?php echo $row['price']; ?></b></p>

    <a class="button" href="laptop.php?id=<?php echo $row['id']; ?>">View Details</a>
</div>
<?php } ?>
      

    </div>
  </section>

  <!-- Footer -->
  <footer>
    <p>© 2025 SkyHigh Airlines. All Rights Reserved.</p>
    <p>
      <a href="#">About Us</a> | 
      <a href="#">Help</a> | 
      <a href="#">Contact</a> | 
      <a href="#">Terms & Policy</a>
    </p>
    <p>
      <i class="fab fa-facebook-f"></i>
      <i class="fab fa-twitter"></i>
      <i class="fab fa-instagram"></i>
    </p>
  </footer>

</body>
</html>
