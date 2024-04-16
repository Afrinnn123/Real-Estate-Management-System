<?php
include_once('../Model/modeldb.php');
error_reporting(E_ALL);
ini_set('display_errors', '1');

$transaction = getPropertyData();


header('Content-Type: application/json');
echo json_encode($transaction);
?>

