<?php
include "conn.php";

$user = $_POST['user'];
$valor = $_POST['valor'];
$data = date('Y-m-d');

$id = $pdo->query("SELECT id FROM users WHERE cpf  = '$user'")->fetchColumn();
$anterior = $pdo->query("SELECT saldo FROM cards WHERE user  = '$user'")->fetchColumn();
$newSaldo = $anterior+$valor;

$owner = $pdo->query("SELECT owner FROM users WHERE cpf = '$user'")->fetchColumn();

$trans  = $pdo->query("INSERT INTO transacoes (user, valor, anterior, atual, status, data, owner) VALUES ('$user', '$valor', '$anterior', '$newSaldo', '1', '$data', '$owner')");

$add = $pdo->query("UPDATE cards SET saldo = '$newSaldo' WHERE user = '$user'");

echo $id;

?>