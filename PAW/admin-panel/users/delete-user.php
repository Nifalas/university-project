<?php require "../../config/config.php";  ?>

<?php

if (isset($_GET['del_id'])) {
    $id = $_GET['del_id'];

    $delete = $conn->prepare("DELETE FROM users WHERE id = :id");
    $delete->execute([
        ':id' => $id,
    ]);

    header('location: users.php');
}
