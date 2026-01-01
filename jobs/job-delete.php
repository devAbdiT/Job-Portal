<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require "../config/config.php";

if (isset($_SESSION['type']) and $_SESSION['type'] !== "Company") {
    header("location:" . APPURL . "");
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $delete = $conn->prepare("DELETE FROM jobs WHERE id=:id");
    $delete->execute([':id' => $id]);
    // echo "Deleted Successfully";
    echo "<script>alert('Job deleted successfully!')</script>";

    header("location:" . APPURL . "");
} else {
    echo "404";
}

?>
<?php
require "../includes/header.php";
?>
<?php
require "../includes/footer.php";
?>
