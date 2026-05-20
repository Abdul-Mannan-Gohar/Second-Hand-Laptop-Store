<?php
$conn = mysqli_connect("localhost","root","","laptopsdb");

$id = $_GET['id'];
$lap = mysqli_fetch_assoc(mysqli_query($conn,"SELECT name,model FROM laptops WHERE id='$id'"));
?>
<!DOCTYPE html>
<html>
<head>
<title>Book Laptop</title>

<style>
body{
    margin:0;
    font-family:Segoe UI, Tahoma, sans-serif;
    background:#f1f4f9;
}

/* 🔹 Form Container */
.form-box{
    max-width:420px;
    width:90%;
    margin:60px auto;
    background:#fff;
    padding:30px;
    border-radius:18px;
    box-shadow:0 15px 35px rgba(0,0,0,.15);
    animation:fadeIn .6s ease;
}

@keyframes fadeIn{
    from{opacity:0;transform:translateY(20px);}
    to{opacity:1;transform:translateY(0);}
}

.form-box h2{
    text-align:center;
    margin-top:0;
    margin-bottom:20px;
    color:#2d3436;
}

/* 🔹 Inputs */
input, textarea{
    width:100%;
    padding:13px 14px;
    margin:12px 0;
    border-radius:10px;
    border:1px solid #dcdde1;
    font-size:15px;
    transition:.3s;
    box-sizing:border-box;
}

textarea{
    resize:none;
    min-height:90px;
}

/* 🔹 Focus Effect */
input:focus,
textarea:focus{
    outline:none;
    border-color:#0984e3;
    box-shadow:0 0 12px rgba(68, 159, 45, 0.35);
}

/* 🔹 Button */
button{
    width:100%;
    padding:14px;
    margin-top:10px;
    background:linear-gradient(135deg,#00b894,#00cec9);
    color:#fff;
    border:none;
    font-size:18px;
    border-radius:12px;
    cursor:pointer;
    transition:.3s;
}

button:hover{
    transform:translateY(-2px);
    box-shadow:0 10px 25px rgba(0,0,0,.2);
}

/* 🔹 Mobile Optimization */
@media(max-width:480px){
    .form-box{
        margin:30px auto;
        padding:22px;
    }

    button{
        font-size:16px;
    }
}

</style>

</head>
<body>

<?php include "include/header.php"; ?>

<div class="form-box">
    <h2>Book <?php echo $lap['name']." ".$lap['model']; ?></h2>

    <form action="order.php" method="POST">
        <input type="hidden" name="laptop_id" value="<?php echo $id; ?>">

        <input type="text" name="name" placeholder="Full Name" required>
        <input type="text" name="whatsapp" placeholder="WhatsApp Number in 00923333333" required>
        <input type="email" name="email" placeholder="Email (Optional)">
        <textarea name="address" placeholder="Complete Address"></textarea>

        <button type="submit">Confirm Booking</button>
    </form>
</div>

<?php include "include/footer.php"; ?>

</body>
</html>
