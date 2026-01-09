<?php
require "../config/config.php";

//For counting Jobs
$jobs = $conn->query("SELECT COUNT(*) AS count_jobs FROM jobs");
$jobs->execute();

$countJobs = $jobs->fetch(PDO::FETCH_OBJ);
//For counting Categories
$categories = $conn->query("SELECT COUNT(*) AS count_cats FROM categories");
$categories->execute();

$countCategories = $categories->fetch(PDO::FETCH_OBJ);
//For counting Admins
$admins = $conn->query("SELECT COUNT(*) AS count_admins FROM admins");
$admins->execute();

$countAdmins = $admins->fetch(PDO::FETCH_OBJ);

?>

<?php require "layouts/header.php"; ?>


<div class="row">
  <div class="col-md-4">
    <div class="card">
      <div class="card-body">

        <h5 class="card-title">Jobs</h5>
        <!-- <h6 class="card-subtitle mb-2 text-muted">Bootstrap 4.0.0 Snippet by pradeep330</h6> -->
        <p class="card-text">number of jobs: <?php echo $countJobs->count_jobs; ?></p>

      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Categories</h5>

        <p class="card-text">number of categories: <?php echo $countCategories->count_cats ?></p>

      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Admins</h5>

        <p class="card-text">number of admins: <?php echo $countAdmins->count_admins ?></p>

      </div>
    </div>
  </div>
</div>

<?php require "layouts/footer.php" ?>