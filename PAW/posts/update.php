<?php require "../includes/header.php";
require "../config/config.php";
?>

<?php
if (isset($_GET['upd_id'])) {
    $id = $_GET['upd_id'];


    $select = $conn->query("SELECT * FROM posts WHERE id = '$id'");
    $select->execute();
    $rows = $select->fetch(PDO::FETCH_OBJ);

    if (isset($_POST['submit'])) {
        if ($_POST['title'] == '' or $_POST['subtitle'] == '' or $_POST['body'] == '') {
            echo 'Fill all fields before submiting!';
        } else {


            unlink("images/" . $rows->img . "");

            $title = $_POST['title'];
            $subtitle = $_POST['subtitle'];
            $body = $_POST['body'];
            $img = $_FILES['img']['name'];
            $seoTitle = $_POST['seotitle'];
            $seoDesc = $_POST['seodesc'];

            $dir = 'images/' . basename($img);



            $update = $conn->prepare("UPDATE posts SET title = :title, subtitle = :subtitle, body = :body, seotitle = :seotitle, seodesc = :seodesc, img = :img WHERE id = '$id' ");

            $update->execute([
                ':title' => $title,
                ':subtitle' => $subtitle,
                ':body' => $body,
                ':img' => $img,
                ':seotitle' => $seoTitle,
                ':seodesc' => $seoDesc,
            ]);

            move_uploaded_file($_FILES['img']['tmp_name'], $dir);
        };
    }
}

$config = array();
$config["apiKey"] = "hrza07gibpjqc0xho5csj6b3lk8ryo0ia1uef7yygx5lbfwo";


?>

<form method="POST" action="update.php?upd_id=<?php echo $id; ?>" enctype="multipart/form-data">
    <!-- Email input -->
    <div class="form-outline mb-4">
        <input type="text" name="title" value="<?php echo $rows->title; ?>" id="form2Example1" class="form-control" placeholder="title" />

    </div>

    <div class="form-outline mb-4">
        <input type="text" name="subtitle" value="<?php echo $rows->subtitle; ?>" id="form2Example1" class="form-control" placeholder="subtitle" />
    </div>

    <div class="form-outline mb-4">
        <textarea type="text" name="body" id="form-wyswig-editor" class="form-control" placeholder="body"><?php echo $rows->body; ?> </textarea>
    </div>

    <?php echo "<img src='images/" . $rows->img . "'width=200px>"  ?>;

    <div class="form-outline mb-4" style="margin-top: 20px;">
        <input type="file" name="img" id="form2Example1" class="form-control" placeholder="image" />
    </div>

    <div class="form-outline mb-4">
        <h2>SEO Settings</h2>
        <input type="text" name="seotitle" value="<?php echo $rows->seotitle; ?>" id="form2Example1" class="form-control" placeholder=" SEO Title" />
    </div>
    <div class="form-outline mb-4">
        <textarea type="text" name="seodesc" id="form2Example1" class="form-control" rows="3" placeholder="Meta Description"><?php echo $rows->seodesc; ?></textarea>
    </div>


    <!-- Submit button -->
    <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Update</button>

    <a href="<?php echo $site_url; ?>/posts/post.php?post_id=<?php echo $id; ?>" class="btn btn-success mb-4 text-center">Back to post</a>


</form>

<script src="https://cloud.tinymce.com/6/tinymce.min.js?apiKey=<?php echo $config["apiKey"]; ?>"></script>
<script src="../js/init.js"></script>

<?php require "../includes/footer.php";

?>