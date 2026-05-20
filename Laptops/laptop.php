<?php
$conn = mysqli_connect("localhost","root","","laptopsdb");

$id = $_GET['id'];
$lap = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM laptops WHERE id='$id'"));
?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $lap['name']; ?></title>

<style>
body{
    margin:0;
    font-family:Segoe UI, Tahoma, sans-serif;
    background:#f1f4f9;
}

.container{
    max-width:1000px;
    width:95%;
    margin:40px auto;
}

.box{
    display:flex;
    gap:40px;
    background:#fff;
    padding:30px;
    border-radius:18px;
    box-shadow:0 10px 30px rgba(0,0,0,.12);
    align-items:center;
}

.box img{
    width:380px;
    max-width:100%;
    border-radius:15px;
    object-fit:cover;
}

.price{
    font-size:26px;
    color:#0984e3;
    font-weight:800;
}

.btn{
    display:inline-block;
    margin-top:25px;
    padding:14px 28px;
    background:#0984e3;
    color:#fff;
    text-decoration:none;
    border-radius:10px;
    font-size:18px;
    transition:.3s;
}
.na{
     text-transform: uppercase;
}
.btn:hover{background:#0652dd;}

/* 🔹 MOBILE & TABLET RESPONSIVE */
@media (max-width: 900px){
    .box{
        flex-direction:column;
        text-align:center;
    }

    .box img{
        width:100%;
        max-height:260px;
    }

    .price{
        font-size:24px;
    }
}

/* 🔹 SMALL MOBILE */
@media (max-width: 480px){
    .container{
        margin:20px auto;
    }

    .box{
        padding:20px;
    }

    h2{
        font-size:20px;
    }

    .price{
        font-size:22px;
    }

    p{
        font-size:15px;
    }

    .btn{
        width:100%;
        padding:14px;
        font-size:16px;
    }
}
.back-btn{
    display:inline-flex;
    align-items:center;
    gap:6px;
    padding:10px 14px;
    background:#f1f4f9;
    color:#333;
    border-radius:10px;
    text-decoration:none;
    font-size:18px;
    box-shadow:0 4px 12px rgba(0,0,0,.15);
    transition:.3s;
    margin-top:20px;
}
.back-btn:hover{
    background:#0984e3;
    color:#fff;
    transform:translateX(-4px);
}

</style>

</head>
<body>

<?php include "include/header.php"; ?>

<div class="container">
<div class="box">

    <img src="uploads/<?php echo $lap['photo']; ?>">

    <div>
        <h2 class="na"><?php echo $lap['name']." - ".$lap['model']; ?></h2>
        <p class="price">PKR <?php echo number_format($lap['price']); ?></p>

        <p><b>Processor:</b> <?php echo $lap['processor']; ?></p>
        <p><b>RAM:</b> <?php echo $lap['ram']; ?></p>
        <p><b>Storage:</b> <?php echo $lap['memory']; ?></p>
        <p><b>Generation:</b> <?php echo $lap['generation']; ?></p>
        <p><b>Condition:</b> <?php echo $lap['condition_status']; ?></p>

        <a href="book.php?id=<?php echo $lap['id']; ?>" class="btn">
            Book This Laptop
        </a>
                  <a  href="javascript:history.back()"  class="back-btn" title="Go Back">
    <i class="fas fa-arrow-left"></i>
</a>
    </div>

</div>
</div>

<?php include "include/footer.php"; ?>

</body>
</html>
