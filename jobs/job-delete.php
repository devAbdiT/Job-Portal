<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require "../config/config.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $delete = $conn->prepare("DELETE FROM jobs WHERE id=:id");
    $delete->execute([':id' => $id]);
    // echo "Deleted Successfully";
    echo "<script>alert('Job deleted successfully!')</script>";

    header("location:" . APPURL . "");
}

?>
<?php
require "../includes/header.php";
?>
<?php
require "../includes/footer.php";
?>
