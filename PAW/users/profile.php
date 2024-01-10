<?php require "../includes/header.php";
require "../config/config.php";
?>

<?php
if (isset($_GET['prof_id'])) {
    $id = $_GET['prof_id'];

    //first query

    $select = $conn->query("SELECT * FROM users WHERE id = '$id'");
    $select->execute();
    $rows = $select->fetch(PDO::FETCH_OBJ);

    if ($_SESSION['user_id'] !== $rows->id) {
        header('location: http://localhost/PHP/CMS/index.php');
    }

    //second query 
    if (isset($_POST['submit'])) {
        if ($_POST['email'] == '' or $_POST['username'] == '') {
            echo 'Fill all fields before submiting!';
        } else {

            // Do poprawy update zdjęć


            $email = $_POST['email'];
            $username = $_POST['username'];



            $update = $conn->prepare("UPDATE users SET email = :email, username = :username WHERE id = '$id' ");

            $update->execute([
                ':email' => $email,
                ':username' => $username,
            ]);
        };
    }
}




?>

<form method="POST" action="profile.php?prof_id=<?php echo $rows->id; ?>" enctype="multipart/form-data">
    <!-- Email input -->
    <div class="form-outline mb-4">
        <input type="email" name="email" value="<?php echo $rows->email; ?>" id="form2Example1" class="form-control" placeholder="email" />

    </div>

    <div class="form-outline mb-4">
        <input type="text" name="username" value="<?php echo $rows->username; ?>" id="form2Example1" class="form-control" placeholder="username" />
    </div>




    <!-- Submit button -->
    <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Update</button>


</form>



<?php require "../includes/footer.php";

?>