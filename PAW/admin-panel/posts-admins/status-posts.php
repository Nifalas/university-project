<?php require "../../config/config.php"; ?>
<?php
if (isset($_GET['id']) and isset($_GET['status'])) {
    $id = $_GET['id'];
    $status = $_GET['status'];


    //second query 
    if ($status == 0) {


        $update = $conn->prepare("UPDATE posts SET status = 1 WHERE id = '$id' ");
        $update->execute();
        header('location: show-posts.php');
    } else {

        $update = $conn->prepare("UPDATE posts SET status = 0 WHERE id = '$id' ");
        $update->execute();
        header('location: show-posts.php');
    }
}





?>