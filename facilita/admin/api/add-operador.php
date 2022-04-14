<?php
include "conn.php";

$nome = $_POST['nome'];
$email = $_POST['email']; 
$senha = $_POST['senha'];
$cpf = $_POST['cpf'];
$ow = $_POST['owner'];
$data = date('Y-m-d');


$owner = $pdo->query("SELECT id FROM users WHERE email = '$ow'")->fetchColumn();

$verify = $pdo->query("SELECT * FROM users WHERE cpf = '$cpf'");
if($verify->rowCount() > 0){
	echo 0;

}else{
	$add = $pdo->query("INSERT INTO users (nome, email, senha, cpf, status, nivel, owner, data) VALUES ('$nome', '$email', '$senha', '$cpf', 'true', '3', '$owner', '$data')");

	echo 1;
}
?>