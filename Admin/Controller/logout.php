<?php
require_once('../Model/modeldb.php');

$conn = getConnection();
$loggedInUsername = $_SESSION['Username'];
 
$userDetails = getUserDetails($conn, $loggedInUsername);
 
if(isset($_GET['logout'])) {
    session_destroy();
    header('Location:../View/login.php');
    exit();
}
 
 
?>
