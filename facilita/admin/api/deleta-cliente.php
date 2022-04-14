<?php
include "conn.php";
$id = $_POST['id']; 

$cpf = $pdo->query("SELECT cpf FROM users WHERE id = '$id'")->fetchColumn();
$del = $pdo->query("DELETE FROM users WHERE id = '$id'");
$card = $pdo->query("DELETE FROM cards WHERE user = '$cpf'"); 

echo 1;
?>