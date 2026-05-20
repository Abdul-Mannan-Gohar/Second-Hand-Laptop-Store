<?php
$conn = mysqli_connect("localhost","root","","laptopsdb");
$result = mysqli_query($conn,"SELECT * FROM laptops ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>All Laptops</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
*{box-sizing:border-box}
body{
    margin:0;
    font-family:Poppins,sans-serif;
    background:linear-gradient(120deg,#dfe6e9,#b2bec3);
}

/* CONTAINER */
.wrapper{
    max-width:1200px;
    margin:40px auto;
    padding:20px;
}

/* HEADER */
.header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:25px;
}
.header h2{
    margin:0;
    font-size:28px;
    color:#2d3436;
}
.back-btn{
    width:45px;height:45px;
    border-radius:50%;
    background:#0984e3;
    color:white;
    display:flex;
    align-items:center;
    justify-content:center;
    text-decoration:none;
    font-size:18px;
    transition:.3s;
}
.back-btn:hover{transform:scale(1.1)}

/* GRID */
.grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(260px,1fr));
    gap:20px;
}

/* CARD */
.card{
    background:white;
    border-radius:18px;
    padding:15px;
    box-shadow:0 12px 30px rgba(0,0,0,.18);
    transition:.3s;
}
.card:hover{transform:translateY(-6px)}

.card img{
    width:100%;
    height:180px;
    object-fit:cover;
    border-radius:14px;
}

/* INFO */
.info{
    margin-top:10px;
}
.info h3{
    margin:0;
    font-size:18px;
    color:#2d3436;
}
.info p{
    margin:4px 0;
    color:#636e72;
    font-size:14px;
}
.price{
    font-weight:700;
    color:#0984e3;
    font-size:17px;
}

/* ACTIONS */
.actions{
    display:flex;
    gap:10px;
    margin-top:12px;
}
.actions a{
    flex:1;
    padding:10px;
    text-align:center;
    border-radius:10px;
    text-decoration:none;
    color:white;
    font-size:15px;
    transition:.3s;
}
.edit{background:#00b894}
.delete{background:#d63031}
.actions a:hover{opacity:.85}

/* MOBILE */
@media(max-width:600px){
    .header h2{font-size:22px}
}
</style>
</head>

<body>

<div class="wrapper">

    <div class="header">
        <h2>💻 All Laptops</h2>
        <a href="admin_dashboard.php" class="back-btn"><i class="fas fa-arrow-left"></i></a>
    </div>

    <div class="grid">
    <?php while($row = mysqli_fetch_assoc($result)){ ?>
        <div class="card">
            <img src="../uploads/<?php echo $row['photo']; ?>">

            <div class="info">
                <h3><?php echo $row['name']; ?></h3>
                <p><?php echo $row['model']; ?></p>
                <p class="price">PKR <?php echo number_format($row['price']); ?></p>
            </div>

            <div class="actions">
                <a href="edit_laptop.php?id=<?php echo $row['id']; ?>" class="edit">
                    <i class="fas fa-edit"></i> Edit
                </a>
                <a href="delete_laptop.php?id=<?php echo $row['id']; ?>" 
                   onclick="return confirm('Delete this laptop?')" 
                   class="delete">
                    <i class="fas fa-trash"></i> Delete
                </a>
            </div>
        </div>
    <?php } ?>
    </div>

</div>

</body>
</html>
