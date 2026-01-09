<?php
require "../../config/config.php";

//Inorder not to allow everybody to  enter to this page 
if (!isset($_SESSION['adminname'])) {
  header("location:" . ADMINURL . "admins/login-admins.php");
}
if (isset($_GET['id'])) {
  $id = $_GET['id'];


  $select = $conn->prepare("SELECT * FROM categories WHERE id=:id");
  $select->execute([':id' => $id]);

  $category = $select->fetch(PDO::FETCH_OBJ);

  if (isset($_POST['submit'])) {
    if (empty($_POST['name'])) {
      echo "<script>alert('input is empty');</script>";
    } else {
      $name = $_POST['name'];
      $update = $conn->prepare("UPDATE categories SET name =:name WHERE id=:id");
      $update->execute([':name' => $name, ':id' => $id]);

      header("location: " . ADMINURL . "/categories-admins/show-categories.php");
    }
  }
} else {
  header("location: http://localhost:3000/jobboard/404.php");
}





?>

<?php require "../layouts/header.php";  ?>
<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mb-5 d-inline">Update Categories</h5>
        <form method="POST" action="update-category.php?id=<?php echo $id; ?>" enctype="multipart/form-data">
          <!-- Email input -->
          <div class="form-outline mb-4 mt-4">
            <input type="text" name="name" id="form2Example1" class="form-control" placeholder="name"
              value="<?php echo $category->name; ?>" />

          </div>


          <!-- Submit button -->
          <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">update</button>


        </form>

      </div>
    </div>
  </div>
</div>
<?php require "../layouts/footer.php";  ?>