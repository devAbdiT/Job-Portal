<?php
require "../../config/config.php";


if (isset($_GET['id']) and isset($_GET['status'])) {
    $id = $_GET['id'];
    $status = $_GET['status'];

    if ($status == 1) {
        $update = $conn->prepare("UPDATE jobs SET status=:status WHERE id=:id");
        $update->execute([':status' => 0, ':id' => $id]);
        header("location:" . ADMINURL . "jobs-admins/show-jobs.php");
    } else {
        $update = $conn->prepare("UPDATE jobs SET status=:status WHERE id=:id");
        $update->execute([':status' => 1, ':id' => $id]);
        header("location:" . ADMINURL . "jobs-admins/show-jobs.php");
    }
} else {
    header("location: http://localhost:3000/jobboard/404.php");
}
?>

<?php require "../layouts/header.php";  ?>
<?php require "../layouts/footer.php";  ?>