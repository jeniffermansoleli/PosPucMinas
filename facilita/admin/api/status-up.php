<?php
include "conn.php";

$id = $_POST['id'];
$check = $_POST['check'];

$up = $pdo->query("UPDATE users SET  status = '$check' WHERE id = '$id'");
echo 1;  
?>