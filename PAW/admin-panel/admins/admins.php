<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>

<?php
$admins = $conn->query("SELECT * FROM admins");
$admins->execute();
$rows = $admins->fetchAll(PDO::FETCH_OBJ);
?>



<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mb-4 d-inline">Admins</h5>
        <a href="create-admins.php" class="btn btn-primary mb-4 text-center float-right">Create Admins</a>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">username</th>
              <th scope="col">email</th>
              <th scope="col">Delete</th>
            </tr>
          </thead>
          <tbody>

            <?php foreach ($rows as $row) : ?>
              <tr>
                <th scope="row"><?php echo $row->id; ?></th>
                <td><?php echo $row->adminname; ?></td>
                <td><?php echo $row->email; ?></td>
                <td><a href="delete-admins.php?del_id=<?php echo $row->id; ?>" class="btn btn-danger text-center ">delete</a></td>
              </tr>
            <?php endforeach; ?>

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>



</div>
<?php require "../layouts/footer.php"; ?>