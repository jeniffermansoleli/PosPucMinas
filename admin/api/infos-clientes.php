<?php
include "conn.php";

$user = $_POST['user'];
$dados = $pdo->query("SELECT * FROM  users WHERE id = '$user'");

foreach ($dados as $key) {
	$cpf = $key['cpf'];
	$card = $pdo->query("SELECT * FROM cards WHERE user = '$cpf'")->fetch();
	$data = array('id' => $key['id'], 
				  'nome' => $key['nome'],
				  'email' => $key['email'], 
				  'senha' => $key['senha'], 
				  'cpf' => $key['cpf'],
				  'status' => $key['status'],
				  'card' => $card['numero'],
				  'saldo' => $card['saldo'],
				  'data' => $key['data']);
	}

	echo json_encode($data);
?>