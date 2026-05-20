<?php
$conn = mysqli_connect("localhost","root","","laptopsdb"); 

if(isset($_GET['id'])){
    $tid = $_GET['id'];
    mysqli_query($conn, "DELETE FROM laptop_trash WHERE trash_id='$tid'");
    header("Location: trash.php?msg=permanently_deleted");
}
?>
