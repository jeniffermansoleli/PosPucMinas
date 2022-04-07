<?php
include "conn.php";

$id = $_POST['id'];



$user = $pdo->query("SELECT user FROM transacoes WHERE id = '$id'")->fetchColumn();

$anterior = $pdo->query("SELECT saldo FROM cards WHERE user  = '$user'")->fetchColumn();

$valor = $pdo->query("SELECT valor FROM transacoes WHERE id = '$id'")->fetchColumn();

$owner  = $pdo->query("SELECT owner FROM transacoes WHERE id = '$id'")->fetchColumn();

$data = date('Y-m-d');

$atual = $anterior+$valor;


$extorno = $pdo->query("INSERT INTO transacoes (user, valor, anterior, atual, status, data, owner) VALUES ('$user', '$valor', '$anterior', '$atual', '3', '$data', '$owner')");


$card = $pdo->query("UPDATE cards SET saldo = '$atual' WHERE user = '$user'");

$deleta = $pdo->query("DELETE FROM  transacoes WHERE id = '$id'");

$dados = array('status' => 'success',
			   'user'=>$user,
			   'valor' => $valor,
			   'anterior' => $anterior,
			   'owner' => $owner,
			   'atual' => $atual);

echo json_encode($dados);


?>