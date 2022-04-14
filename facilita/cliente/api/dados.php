<?php
include "conn.php";

$user = $_POST['user'];

$usuario = $pdo->query("SELECT * FROM users WHERE cpf = '$user'");
$card = $pdo->query("SELECT * FROM cards WHERE user = '$user'");

$c = $card->fetch();
$u = $usuario->fetch();

	$dados = array('nome' => $u['nome'],
				   'cpf' => $u['cpf'],
				   'email' => $u['email'],
				   'senha' => $u['senha'],
				   'saldo' => $c['saldo'],
				   'cartao' => $c['numero'],
				   'data' => date('d/m', strtotime($c['data'])));
	


echo json_encode($dados);


?>