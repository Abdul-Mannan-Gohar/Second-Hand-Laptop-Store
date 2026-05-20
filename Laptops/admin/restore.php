<?php
$conn = mysqli_connect("localhost","root","","laptopsdb"); 

if(isset($_GET['id'])){
    $tid = $_GET['id'];

    // Fetch record from trash
    $query = mysqli_query($conn, "SELECT * FROM laptop_trash WHERE trash_id='$tid'");
    $data = mysqli_fetch_assoc($query);

    // Restore with SAME ID
    mysqli_query($conn, "
        INSERT INTO laptops (
            id, photo, name, model, price, condition_status, 
            processor, ram, memory, generation, whatsapp, status
        )
        VALUES (
            '{$data['id']}',
            '{$data['photo']}',
            '{$data['name']}',
            '{$data['model']}',
            '{$data['price']}',
            '{$data['condition_status']}',
            '{$data['processor']}',
            '{$data['ram']}',
            '{$data['memory']}',
            '{$data['generation']}',
            '{$data['whatsapp']}',
            '{$data['status']}'
        )
    ");

    // Remove from trash
    mysqli_query($conn, "DELETE FROM laptop_trash WHERE trash_id='$tid'");

    header("Location: trash.php?msg=restored");
    exit;
}
?>
