<?php
session_start();
$conn = mysqli_connect("localhost","root","","laptopsdb");

// Handle login
$error = '';
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']); // Assuming admin password stored as MD5
    $res = mysqli_query($conn,"SELECT * FROM admins WHERE username='$username' AND password='$password'");
    if(mysqli_num_rows($res) > 0){
        $_SESSION['admin'] = $username;
        header("Location: admin_dashboard.php");
        exit;
    } else {
        $error = "Invalid Credentials";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Login - Laptop Store</title>
<link rel="stylesheet" href="../assets/css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
/* Centered login form */
body{display:flex;justify-content:center;align-items:center;height:100vh;background:#f5f5f5;}
.login-container{background:#fff;padding:40px;border-radius:10px;box-shadow:0 5px 15px rgba(0,0,0,0.2);width:350px;text-align:center;}
.login-container h2{margin-bottom:25px;color:#007bff;}
.login-container input{width:100%;padding:12px;margin:10px 0;border:1px solid #ccc;border-radius:5px;}
.login-container button{width:100%;padding:12px;background:#007bff;color:#fff;border:none;border-radius:5px;font-size:16px;cursor:pointer;}
.login-container button:hover{background:#0056b3;}
.error-msg{color:#dc3545;margin-bottom:15px;}
.login-container .fa-user-shield{font-size:50px;color:#007bff;margin-bottom:15px;}
</style>
</head>
<body>
<div class="login-container">
    <i class="fas fa-user-shield"></i>
    <h2>Admin Login</h2>
    <?php if($error != ''){ echo "<p class='error-msg'>$error</p>"; } ?>
    <form method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button name="login" type="submit"><i class="fas fa-sign-in-alt"></i> Login</button>
    </form>
</div>
</body>
</html>
