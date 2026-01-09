<?php
require "../../config/config.php";


//Inorder not to allow everybody to  enter to this page 
if (!isset($_SESSION['adminname'])) {
    header("location:" . ADMINURL . "admins/login-admins.php");
}

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