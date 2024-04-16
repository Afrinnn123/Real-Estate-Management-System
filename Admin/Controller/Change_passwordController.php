<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

require_once '../Model/modeldb.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_SESSION['Username'])) {
        $currentPassword = $_POST['currentpassword'];
        $newPassword = $_POST['newpassword'];
        $confirmPassword = $_POST['confirmpassword'];
        $loggedInUsername = $_SESSION['Username'];

        $result5 = verifyCurrentPassword($loggedInUsername, $currentPassword);

        if ($result5) {
            if ($newPassword === $confirmPassword) {
                updatePassword($loggedInUsername, $newPassword);
                $message = "Password updated successfully!";
            } else {
                $message = "New password and confirm password do not match.";
            }
        } else {
            $message = "Current password is incorrect.";
        }
    } else {
        $message = "Username not found in the session.";
    }
    include('../View/Change_password.php');
}
?>
