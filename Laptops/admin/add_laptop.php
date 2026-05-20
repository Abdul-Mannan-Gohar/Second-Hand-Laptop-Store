<?php
$conn = mysqli_connect("localhost","root","","laptopsdb");

if(isset($_POST['save'])){
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

    $photo = $_FILES['photo']['name'];
    $tmp = $_FILES['photo']['tmp_name'];
    $path = "../uploads/".$photo;
    move_uploaded_file($tmp,$path);

    $q = "INSERT INTO laptops(photo,name,model,price,condition_status,processor,ram,memory,generation,whatsapp,status)
          VALUES('$photo','$name','$model','$price','$condition','$processor','$ram','$memory','$generation','$whatsapp','$status')";

    mysqli_query($conn,$q);
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Add Laptop</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>
*{box-sizing:border-box}
body{
    margin:0;
    font-family:'Poppins',sans-serif;
    background:linear-gradient(120deg,#dff9fb,#c7ecee);
}

/* CONTAINER */
.wrapper{
    max-width:950px;
    margin:40px auto;
    padding:20px;
}

/* CARD */
.card{
    background:#fff;
    border-radius:18px;
    padding:25px;
    box-shadow:0 15px 40px rgba(0,0,0,.15);
}

/* HEADER */
.header{
    display:flex;
    align-items:center;
    gap:15px;
    margin-bottom:25px;
}
.back-btn{
    width:45px;height:45px;
    display:flex;
    align-items:center;
    justify-content:center;
    background:#0984e3;
    color:#fff;
    border-radius:50%;
    text-decoration:none;
    font-size:20px;
    transition:.3s;
}
.back-btn:hover{transform:scale(1.1)}
.header h2{margin:0;font-size:26px;color:#222}

/* FORM */
form{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
    gap:18px;
}
.form-group{
    display:flex;
    flex-direction:column;
}
label{
    font-weight:600;
    margin-bottom:6px;
}
input,select{
    padding:12px;
    border-radius:10px;
    border:1px solid #ccc;
    font-size:15px;
}
input:focus,select:focus{
    outline:none;
    border-color:#0984e3;
    box-shadow:0 0 10px rgba(9,132,227,.3);
}

/* IMAGE */
.preview{
    width:100%;
    height:160px;
    object-fit:cover;
    border-radius:14px;
    display:none;
    margin-top:8px;
}

/* BUTTON */
.submit-btn{
    grid-column:1/-1;
    padding:15px;
    border:none;
    border-radius:14px;
    font-size:18px;
    background:linear-gradient(135deg,#00b894,#0984e3);
    color:#fff;
    cursor:pointer;
    transition:.3s;
}
.submit-btn:hover{
    transform:translateY(-2px);
    box-shadow:0 10px 25px rgba(0,0,0,.25);
}

//* =====================
   RESPONSIVE ENHANCEMENT
   ===================== */

@media (max-width: 768px){

/* BODY */
body{
    font-size:14px;
}

/* WRAPPER */
.wrapper{
    margin:20px 10px;
    padding:10px;
}

/* CARD */
.card{
    padding:20px 15px;
    border-radius:14px;
}

/* HEADER */
.header{
    flex-direction:row;
    align-items:center;
    gap:10px;
}

.header h2{
    font-size:20px;
    line-height:1.3;
}

/* BACK BUTTON */
.back-btn{
    width:40px;
    height:40px;
    font-size:18px;
}

/* FORM GRID */
form{
    grid-template-columns:1fr;
    gap:14px;
}

/* INPUTS */
input,select{
    padding:11px;
    font-size:14px;
    border-radius:8px;
}

/* IMAGE PREVIEW */
.preview{
    height:140px;
}

/* BUTTON */
.submit-btn{
    font-size:16px;
    padding:14px;
    border-radius:12px;
}
}

/* EXTRA SMALL PHONES */
@media (max-width: 400px){
    .header h2{
        font-size:18px;
    }
    .submit-btn{
        font-size:15px;
    }
}

</style>
</head>

<body>

<div class="wrapper">
    <div class="card">

        <div class="header">
            <a href="javascript:history.back()" class="back-btn">
                <i class="fas fa-arrow-left"></i>
            </a>
            <h2>➕ Add Laptop Details</h2>
        </div>

        <form method="POST" enctype="multipart/form-data">

            <div class="form-group">
                <label>Upload Photo</label>
                <input type="file" name="photo" accept="image/*" onchange="previewImg(event)" required>
                <img id="preview" class="preview">
            </div>

            <div class="form-group">
                <label>Laptop Name</label>
                <input type="text" name="name" required>
            </div>

            <div class="form-group">
                <label>Model</label>
                <input type="text" name="model" required>
            </div>

            <div class="form-group">
                <label>Price (PKR)</label>
                <input type="number" name="price" required>
            </div>

            <div class="form-group">
                <label>Condition</label>
                <input type="text" name="condition_status" placeholder="New / Used / Like New">
            </div>

            <div class="form-group">
                <label>Processor</label>
                <input type="text" name="processor">
            </div>

            <div class="form-group">
                <label>RAM</label>
                <input type="text" name="ram">
            </div>

            <div class="form-group">
                <label>Storage</label>
                <input type="text" name="memory">
            </div>

            <div class="form-group">
                <label>Generation</label>
                <input type="text" name="generation">
            </div>

            <div class="form-group">
                <label>WhatsApp Number</label>
                <input type="text" name="whatsapp">
            </div>

            <div class="form-group">
                <label>Status</label>
                <select name="status">
                    <option value="available">Available</option>
                    <option value="sold">Sold</option>
                </select>
            </div>

            <button class="submit-btn" name="save">
                <i class="fas fa-save"></i> Save Laptop
            </button>

        </form>
    </div>
</div>

<script>
function previewImg(e){
    let img=document.getElementById("preview");
    img.src=URL.createObjectURL(e.target.files[0]);
    img.style.display="block";
}
</script>

</body>
</html>
