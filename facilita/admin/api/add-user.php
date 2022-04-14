<?php
include "conn.php";

$nome = $_POST['nome'];
$email = $_POST['email']; 
$senha = $_POST['senha'];
$cpf = $_POST['cpf'];
$card = $_POST['card'];
$ow = $_POST['owner'];
$data = date('Y-m-d');
$saldo = str_replace(',', '.', $_POST['saldo']);

$owner = $pdo->query("SELECT id FROM users WHERE email = '$ow'")->fetchColumn();


$verify = $pdo->query("SELECT * FROM users WHERE cpf = '$cpf'");
if($verify->rowCount() > 0){
	echo 0;

}else{
	$add = $pdo->query("INSERT INTO users (nome, email, senha, cpf, status, nivel, owner, data) VALUES ('$nome', '$email', '$senha', '$cpf', 'true', '2', '$owner', '$data')");

	$card = $pdo->query("INSERT INTO cards (user, numero, saldo, data) VALUES ('$cpf', '$card', '$saldo', '$data')");
	if($saldo > '0.00'){
		$anterior = '0.00';
		$newSaldo = $anterior+$saldo;


		$trans  = $pdo->query("INSERT INTO transacoes (user, valor, anterior, atual, status, data, owner) VALUES ('$cpf', '$saldo', '$anterior', '$newSaldo', '1', '$data', '$owner')");
	}
	echo 1;
}
?>