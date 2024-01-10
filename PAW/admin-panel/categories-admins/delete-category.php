<?php require "../../config/config.php";  ?>

<?php

if (isset($_GET['de_id'])) {
    $id = $_GET['de_id'];

    $delete = $conn->prepare("DELETE FROM categories WHERE id = :id");
    $delete->execute([
        ':id' => $id,
    ]);

    header('location: show-categories.php');
}
