<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>

<?php
if (isset($_GET['adm_id'])) {
  $id = $_GET['adm_id'];

  $user = $conn->prepare("SELECT * FROM users WHERE id = :id ");
  $user->execute([
    ':id' => $id,
  ]);

  $row = $user->fetch(PDO::FETCH_ASSOC);

  $username = $row['username'];
  $user_mail = $row['email'];
  $user_pass =  $row['mypassword'];

  $create_admin =  $conn->prepare("INSERT INTO admins(email, adminname, mypassword) VALUES (:email, :adminname, :mypassword)");

  $create_admin->execute([
    ':email' => $user_mail,
    ':adminname' => $username,
    ':mypassword' => $user_pass,
  ]);

  header("location: ../admins/admins.php");
}
?>