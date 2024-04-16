<?php
session_start();

require_once('db.php');
$conn=getConnection();

$location = $_GET['location'];
$action = $_GET['action'];

if ($_SESSION['Username'] == $Username) {
    if ($action === 'approve') {
        $sql = "UPDATE Property SET verified = 1, decision = 'approved' WHERE location='$location'";
    } elseif ($action === 'reject') {
        $sql = "UPDATE Property SET verified = 0, decision = 'rejected' WHERE location='$location'";

    }

    if (mysqli_query($conn, $sql)==TRUE) {
        header("Location: ../View/Admin_Display.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    echo "Unauthorized access.";
}

?>