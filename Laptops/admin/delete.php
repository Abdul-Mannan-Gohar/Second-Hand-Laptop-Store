<?php

$conn = mysqli_connect("localhost","root","","laptopsdb");

$id = $_GET['id'];

    // Fetch laptop
    $query = mysqli_query($conn, "SELECT * FROM laptops WHERE id='$id'");
    $data = mysqli_fetch_assoc($query);

    // Insert into trash
    mysqli_query($conn, "
        INSERT INTO laptop_trash (id, photo, name, model, price, condition_status, processor, ram, memory, generation, whatsapp, status)
        VALUES (
            '{$data['id']}','{$data['photo']}','{$data['name']}','{$data['model']}','{$data['price']}',
            '{$data['condition_status']}','{$data['processor']}','{$data['ram']}','{$data['memory']}',
            '{$data['generation']}','{$data['whatsapp']}','{$data['status']}'
        )
    ");

    // Delete from laptops table
    mysqli_query($conn, "DELETE FROM laptops WHERE id='$id'");

    header("Location: admin_dashboard.php?msg=deleted");

?>
