<?php
require "../../config/config.php";
//Inorder not to allow everybody to  enter to this page 
if (!isset($_SESSION['adminname'])) {
    header("location:" . ADMINURL . "admins/login-admins.php");
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $delete = $conn->prepare("DELETE FROM jobs WHERE id=:id");
    $delete->execute([':id' => $id]);
    header("location:" . ADMINURL . "jobs-admins/show-jobs.php");
} else {
    header("location: http://localhost:3000/jobboard/404.php");
}
?>

<?php require "../layouts/header.php";  ?>
<?php require "../layouts/footer.php";  ?>