<?php
include "conn.php";

$user = $_POST['user'];
$lista = $pdo->query("SELECT * FROM users WHERE email = '$user'");

foreach ($lista as $key) {
	$dados = array("nome"=>$key['nome'],
				   "cpf" => $key['cpf'],
				   "email" => $key['email'],
				   "senha" => $key['senha']);
}

echo json_encode($dados);
?>