<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>

<?php
$users = $conn->query("SELECT * FROM users");
$users->execute();
$rows = $users->fetchAll(PDO::FETCH_OBJ);

?>



<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mb-4 d-inline">Admins</h5>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">username</th>
              <th scope="col">email</th>
              <th scope="col">Delete</th>
              <th scope="col">Admin</th>
            </tr>
          </thead>
          <tbody>

            <?php foreach ($rows as $row) : ?>
              <tr>
                <th scope="row"><?php echo $row->id; ?></th>
                <td><?php echo $row->username; ?></td>
                <td><?php echo $row->email; ?></td>
                <td><a href="delete-user.php?del_id=<?php echo $row->id; ?>" class="btn btn-danger  text-center ">delete</a></td>
                <td><a href="admin-user.php?adm_id=<?php echo $row->id; ?>" class="btn btn-success text-center
                    <?php
                    $check_admin = "SELECT * FROM admins WHERE email = '$row->email'";
                    $adm_res = $conn->query($check_admin);

                    if ($adm_res->rowCount() > 0) {
                      echo "disabled";
                    } else {
                      echo " ";
                    }
                    ?>">Set as admin</a></td>
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