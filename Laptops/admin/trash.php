<?php $conn = mysqli_connect("localhost","root","","laptopsdb"); ?>
<?php include 'include/header.php'; ?>

<style>
/* =======================
   TRASH TABLE STYLES
   ======================= */

.table-box{
    width:95%;
    margin:30px auto;
    background:#ffffff;
    padding:20px;
    border-radius:16px;
    box-shadow:0 15px 35px rgba(0,0,0,.15);
    overflow-x:auto;
}

/* TITLE BAR */
.trash-title{
    display:flex;
    justify-content:space-between;
    align-items:center;
    font-size:22px;
    font-weight:700;
    color:#d63031;
    margin-bottom:20px;
}

/* BACK BUTTON */
.back-btn{
    width:42px;
    height:42px;
    display:flex;
    align-items:center;
    justify-content:center;
    background:#0984e3;
    color:#fff;
    border-radius:50%;
    text-decoration:none;
    font-size:18px;
    transition:.3s;
}
.back-btn:hover{
    background:#0652dd;
    transform:translateX(-3px);
}

/* TABLE */
.table{
    width:100%;
    border-collapse:collapse;
    min-width:720px;
}

/* HEADERS */
.table th{
    background:#0984e3;
    color:#fff;
    padding:12px;
    font-size:15px;
    border:1px solid #ddd;
}

/* ROWS */
.table td{
    padding:12px;
    border:1px solid #eee;
    font-size:14px;
    vertical-align:middle;
}

.table tr:nth-child(even){
    background:#f7f9fc;
}

/* IMAGE */
.table img{
    width:70px;
    height:55px;
    object-fit:cover;
    border-radius:8px;
}

/* ACTION BUTTONS */
.action-btn{
    padding:8px 12px;
    border-radius:10px;
    font-size:15px;
    text-decoration:none;
    display:inline-flex;
    align-items:center;
    justify-content:center;
    margin:0 4px;
    transition:.3s;
}

.restore{
    background:#00b894;
    color:#fff;
}
.restore:hover{
    background:#009874;
    transform:scale(1.1);
}

.delete{
    background:#d63031;
    color:#fff;
}
.delete:hover{
    background:#b02324;
    transform:scale(1.1);
}

/* ======================
   MOBILE RESPONSIVE
   ====================== */
@media(max-width:768px){

.trash-title{
    font-size:18px;
}

.table{
    min-width:650px;
}

.table th,
.table td{
    font-size:13px;
    padding:8px;
}

.table img{
    width:60px;
    height:45px;
}
}

/* EXTRA SMALL PHONES */
@media(max-width:480px){

.table-box{
    padding:15px;
}

.table{
    min-width:600px;
}

.action-btn{
    padding:7px 10px;
    font-size:14px;
}
}


</style>

<div class="table-box">
    <div class="trash-title">🗑 Deleted Laptops (Trash)
            <a href="admin_dashboard.php" class="back-btn" title="Go Back">
    <i class="fas fa-arrow-left"></i>
</a>
    </div>
    

    <table class="table table-bordered" style="text-align:center;">
        <tr style="background:#0984e3;color:white;>
            <th>Photo</th>
            <th>Name</th>
            <th>Model</th>
            <th>Price</th>
            <th>Deleted Date</th>
            <th>Actions</th>
        </tr>

        <?php
        $trash = mysqli_query($conn, "SELECT * FROM laptop_trash ORDER BY deleted_date DESC");
        while($row = mysqli_fetch_assoc($trash)){ ?>
            <tr>
                <td><img src="../uploads/<?php echo $row['photo']; ?>" width="80"></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['model']; ?></td>
                <td><?php echo $row['price']; ?></td>
                <td><?php echo $row['deleted_date']; ?></td>
                <td>
                    <a href="restore.php?id=<?php echo $row['trash_id']; ?>" class="action-btn restore">↩</a>
                    <a href="parmanent_delete.php?id=<?php echo $row['trash_id']; ?>" class="action-btn delete"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
        <?php } ?>
    </table>

</div>

<?php include 'include/footer.php'; ?>
