<?php
include "conn.php";

$cpf = $_POST['cpf'];

$owner = $pdo->query("SELECT owner FROM users WHERE cpf = '$cpf'")->fetchColumn();

$vendas = $pdo->query("SELECT SUM(valor) as total FROM transacoes WHERE status = '2' AND owner = '$owner'")->fetchColumn();

echo $vendas;
?>