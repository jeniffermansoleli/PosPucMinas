<?php
include "conn.php";

$id = $_POST['id'];

$extrato = $pdo->query("SELECT * FROM transacoes WHERE id = '$id'");

foreach ($extrato as $key) {
	$cpf = $key['user'];
	
	$cliente = $pdo->query("SELECT nome FROM users WHERE cpf = '$cpf'")->fetchColumn();
	$cartao =  $pdo->query("SELECT numero FROM cards WHERE user = '$cpf'")->fetchColumn();
	$dados = array("cliente"=>$cliente,
				   "cartao"=>$cartao,
				   "data"=> strftime('%d %b',strtotime($key['data'])),
				   "saldo"=> $key['anterior'],
				   "valor" => $key['valor'],
				   "conta"=> $key['atual']);
}
echo json_encode($dados);
?>