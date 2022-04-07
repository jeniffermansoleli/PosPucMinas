<?php
include "conn.php";

$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$cpf = $_POST['cpf'];


$verify = $pdo->query("SELECT * FROM users WHERE cpf = '$cpf' AND id != '$id'");
if($verify->rowCount() > 0){
	echo 0;

}else{
	$up = $pdo->query("UPDATE users SET nome = '$nome', email = '$email', senha = '$senha', cpf = '$cpf' WHERE id = '$id'");
	echo 1;
}
?>