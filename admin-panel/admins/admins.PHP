<?php
require "../../config/config.php";

// FIX: Added database query to fetch admins
$select = $conn->query("SELECT * FROM admins");
$admins = $select->fetchAll(PDO::FETCH_OBJ);
?>

<?php require "../layouts/header.php";  ?>

<div class="row">
  <div class="col-md-12"> <!-- FIX: Changed from 'col' to 'col-md-12' for consistency -->
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mb-4 d-inline">Admins</h5>
        <!-- FIX: Added ADMINURL prefix to create link -->
        <a href="<?php echo ADMINURL; ?>admins/create-admins.php" class="btn btn-primary mb-4 text-center float-right">Create Admins</a>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">username</th>
              <th scope="col">email</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($admins): ?>
              <?php foreach ($admins as $admin): ?>
                <tr>
                  <th scope="row"><?php echo $admin->id; ?></th>
                  <td><?php echo $admin->adminname; ?></td>
                  <td><?php echo $admin->email; ?></td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr>
                <td colspan="3" class="text-center">No admins found</td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<?php require "../layouts/footer.php";  ?>