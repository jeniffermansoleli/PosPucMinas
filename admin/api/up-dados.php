<?php
include "conn.php";

$id_cpf = $_POST['id_cpf'];
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$senha = $_POST['senha'];

$up = $pdo->query("UPDATE users SET nome = '$nome',  email = '$email', cpf = '$cpf', senha = '$senha' WHERE cpf = '$id_cpf'");

$dados = array("status" => "success",
			   "email" => $email,
			   "cpf" => $cpf);

echo json_encode($dados);
?>