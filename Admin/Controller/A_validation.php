<?php
session_start();
require_once('../Models/modeldb.php');

if(isset($_REQUEST['submit'])) 
{
    $A_name = $_REQUEST['Name'];
    $email = $_REQUEST['Email'];
    $Username = $_REQUEST['Username'];
    $Password = $_REQUEST['Password'];
    $Rpass = $_REQUEST['Confirm_Password'];
    $gender= $_REQUEST['Gender'];
    $dob= $_REQUEST['Date_of_Birth'];
    $utype= $_REQUEST['User_Type'];

    $errors = [];

    if (empty($A_name)) {
        $errors[] = "Name is required.";
        echo "Name is required.";
    }


    if (empty($email)) {
        $errors[] = "Email is required.";
        echo "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid Email. Please provide a valid email address.";
        echo "Invalid Email. Please provide a valid email address.";
    }


    if (empty($Username)) {
        $errors[] = "Username is required.";
        echo "Username is required.";
    } elseif (!preg_match("/^[a-zA-Z0-9]+$/", $Username)) {
        $errors[] = "Invalid Username. Please use only letters and numbers.";
        echo "Invalid Username. Please use only letters and numbers.";
    }


    if (empty($Password)) {
        $errors[] = "Password is required.";
        echo "Password is required.";
    } elseif (strlen($Password) < 6) {
        $errors[] = "Password should be at least 6 characters long.";
        echo "Password should be at least 6 characters long.";
    } elseif (!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*\W).+$/", $Password)) {
        $errors[] = "Password should contain at least one uppercase letter, one lowercase letter, one number, and one special character.";
        echo "Password should contain at least one uppercase letter, one lowercase letter, one number, and one special character.";

    }

    
    if (empty($Rpass) || $Password != $Rpass) {
        $errors[] = "Passwords do not match. Please try again.";
        echo "Passwords do not match. Please try again.";
    }

    
    if (empty($gender)) {
        $errors[] = "Gender is required.";
        echo "Gender is required.";
    }

    
    if (empty($dob) || !preg_match("/^\d{4}-\d{2}-\d{2}$/", $dob)) {
        $errors[] = "Invalid Date of Birth. Please use the format YYYY-MM-DD.";
        echo "Invalid Date of Birth. Please use the format YYYY-MM-DD.";
    }


    if (empty($utype)) {
        $errors[] = "User Type is required.";
        echo "User Type is required.";
    }

    if (empty($errors)) {
    $_SESSION['Username'] = $Username;
    $_SESSION['User_Type'] = $utype;
    $status = regcheck($A_name, $email, $Username, $Password, $gender, $dob, $utype);

    if ($status) {
        header('location: ../View/login.php');
        exit();
    } else {
        $_SESSION['errors'] = $errors;
        header('location: ../View/Registration_A.php');
        exit();
    }
}

    
}
 

 
 
?>