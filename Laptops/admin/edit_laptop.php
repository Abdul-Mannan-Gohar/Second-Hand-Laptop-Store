<?php
$conn = mysqli_connect("localhost","root","","laptopsdb"); // change db if different

// GET ID from URL
$id = $_GET['id'];

// Fetch existing record
$result = mysqli_query($conn,"SELECT * FROM laptops WHERE id=$id");
$data = mysqli_fetch_assoc($result);

// UPDATE DATA
if(isset($_POST['update'])){

    $name = $_POST['name'];
    $model = $_POST['model'];
    $price = $_POST['price'];
    $condition = $_POST['condition_status'];
    $processor = $_POST['processor'];
    $ram = $_POST['ram'];
    $memory = $_POST['memory'];
    $generation = $_POST['generation'];
    $whatsapp = $_POST['whatsapp'];
    $status = $_POST['status'];

    // Check if new image uploaded
    if($_FILES['photo']['name'] != ""){
        $photo = $_FILES['photo']['name'];
        move_uploaded_file($_FILES['photo']['tmp_name'],"uploads/".$photo);
    } else {
        $photo = $data['photo']; // keep old image
    }

    $update = "UPDATE laptops SET 
        photo='$photo',
        name='$name',
        model='$model',
        price='$price',
        condition_status='$condition',
        processor='$processor',
        ram='$ram',
        memory='$memory',
        generation='$generation',
        whatsapp='$whatsapp',
        status='$status'
        WHERE id=$id";

    if(mysqli_query($conn,$update)){
        echo "<script>alert('Laptop Updated Successfully');window.location='admin_dashboard.php';</script>";
    }else{
        echo "<script>alert('Update Failed!');</script>";
    }
}
?>

<!------------------ EDIT FORM UI ------------------->
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Add Laptop</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">


<style>
/* ===== FORCE OVERRIDE ===== */
.edit-box{
    width:90% !important;
    max-width:720px !important;
    background:linear-gradient(180deg,#ffffff,#f7fbff) !important;
    margin:30px auto !important;
    padding:35px !important;
    border-radius:20px !important;
    box-shadow:0 25px 60px rgba(0,0,0,.18) !important;
    position:relative;
}

/* TOP GLOW */
.edit-box::before{
    content:"";
    position:absolute;
    top:-3px;left:0;
    width:100%;
    height:6px;
    background:linear-gradient(90deg,#0984e3,#00b894);
    border-radius:20px 20px 0 0;
}

/* TITLE */
.edit-box h2{
    font-size:26px !important;
    font-weight:700;
    text-align:center;
    margin-bottom:25px;
    background:linear-gradient(90deg,#0984e3,#00b894);
    -webkit-background-clip:text;
    color:transparent;
}

/* INPUTS */
.edit-box input,
.edit-box select,
.edit-box textarea{
    width:100% !important;
    padding:14px !important;
    font-size:15px !important;
    border-radius:12px !important;
    border:1px solid #dfe6e9 !important;
    background:#f8fbff !important;
    transition:.3s;
}

.edit-box input:focus,
.edit-box select:focus,
.edit-box textarea:focus{
    outline:none;
    background:#fff !important;
    border-color:#0984e3 !important;
    box-shadow:0 0 0 4px rgba(9,132,227,.15) !important;
    transform:translateY(-2px);
}

/* IMAGE */
.preview-img{
    width:170px !important;
    height:170px !important;
    border-radius:18px !important;
    margin:18px auto !important;
    display:block;
    box-shadow:0 20px 35px rgba(0,0,0,.25);
    transition:.3s;
}
.preview-img:hover{
    transform:scale(1.05);
}

/* BUTTON */
.edit-box button{
    width:100% !important;
    padding:16px !important;
    font-size:18px !important;
    border:none !important;
    border-radius:14px !important;
    background:linear-gradient(135deg,#0984e3,#00b894) !important;
    color:#fff;
    cursor:pointer;
    transition:.3s;
}

.edit-box button:hover{
    transform:translateY(-3px);
    box-shadow:0 15px 30px rgba(0,0,0,.3);
}

/* ===== MOBILE ===== */
@media(max-width:768px){
    .edit-box{
        padding:25px !important;
    }
    .edit-box h2{
        font-size:22px !important;
    }
}

@media(max-width:480px){
    .edit-box{
        padding:20px !important;
        border-radius:16px !important;
    }
    .preview-img{
        width:140px !important;
        height:140px !important;
    }
    .edit-box button{
        font-size:16px !important;
    }
}
/* SMART BACK BUTTON */
.smart-back{
    position:absolute;
    top:20px;
    left:20px;
    width:46px;
    height:46px;
    background:linear-gradient(135deg,#0984e3,#00b894);
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    color:#fff;
    font-size:18px;
    cursor:pointer;
    box-shadow:0 10px 25px rgba(0,0,0,.3);
    transition:.3s;
    z-index:99;
}

.smart-back:hover{
    transform:scale(1.1) rotate(-5deg);
    box-shadow:0 15px 35px rgba(0,0,0,.4);
}

.smart-back:active{
    transform:scale(.9);
}

/* MOBILE FIX */
@media(max-width:480px){
    .smart-back{
        top:15px;
        left:15px;
        width:40px;
        height:40px;
        font-size:16px;
    }
}


</style>
</head>

<div class="edit-box">
    <a class="smart-back" onclick="goBack()" title="Go Back">
    <i class="fas fa-arrow-left"></i>
</a>

    <h2>✏ Edit Laptop Details</h2>

<form method="POST" enctype="multipart/form-data">

    <label>Current Image</label><br>
    <img src="../uploads/<?php echo $data['photo']; ?>" class="preview-img">

    <label>Upload New Image (Optional)</label>
    <input type="file" name="photo" accept="image/*"><br>

    <label>Laptop Name</label>
    <input type="text" name="name" value="<?php echo $data['name']; ?>" required>

    <label>Model</label>
    <input type="text" name="model" value="<?php echo $data['model']; ?>" required>

    <label>Price (PKR)</label>
    <input type="number" name="price" value="<?php echo $data['price']; ?>" required>

    <label>Condition</label>
    <input type="text" name="condition_status" value="<?php echo $data['condition_status']; ?>" required>

    <label>Processor</label>
    <input type="text" name="processor" value="<?php echo $data['processor']; ?>" required>

    <label>RAM</label>
    <input type="text" name="ram" value="<?php echo $data['ram']; ?>" required>

    <label>Memory</label>
    <input type="text" name="memory" value="<?php echo $data['memory']; ?>" required>

    <label>Generation</label>
    <input type="text" name="generation" value="<?php echo $data['generation']; ?>" required>

    <label>WhatsApp</label>
    <input type="text" name="whatsapp" value="<?php echo $data['whatsapp']; ?>" required>

    <label>Status</label>
    <select name="status">
        <option value="available" <?php if($data['status']=="available") echo "selected"; ?>>Available</option>
        <option value="sold" <?php if($data['status']=="sold") echo "selected"; ?>>Sold</option>
    </select>

    <button type="submit" name="update">Update Laptop</button>

</form>
</div>
<script>
function goBack(){
    if(document.referrer !== ""){
        window.history.back();
    }else{
        window.location.href = "admin_dashboard.php";
    }
}
</script>

</html>


