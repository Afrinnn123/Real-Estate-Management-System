<?php
include("../Model/modeldb.php");

if (isset($_POST['delete_username'])) {
    $Username = $_POST['delete_username'];

    $status = deleteUser($Username);

    if ($status) {
        header("Location: ../View/buyer.php");
        exit();
    } else {
        echo "Something went wrong";
    }
} else {
    header("Location: ../View/buyer.php");
    exit();
}
?>
