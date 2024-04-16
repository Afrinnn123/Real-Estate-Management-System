<?php
require_once ('../Model/modeldb.php');

if(isset($_POST['edit_btn'])){

  $Username = $_POST['edit_username'];
  $Name = $_POST['edit_name'];
  $Email = $_POST['edit_email'];
  $Gender = $_POST['edit_gender'];
  $dob = $_POST['edit_dob'];

  $status = update($Name, $Email, $Gender, $dob, $Username);

  if($status){
    header("Location:../View/buyer.php");
  } else {
    echo "Something went wrong";
  }
} else {
  echo "Invalid request";
}
?>
