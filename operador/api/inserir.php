<?php
include "conn.php";

$cpf = $_POST['cpf'];
$card = $_POST['cartao'];
$valor = $_POST['valor'];
$data = date('Y-m-d');

$v = $pdo->query("SELECT * FROM cards WHERE user = '$cpf' AND numero = '$card'");
if($v->rowCount() > 0){

	$owner = $pdo->query("SELECT owner FROM users WHERE cpf = '$cpf'")->fetchColumn();
	$v = $v->fetch();
	$saldo = $v['saldo'];
	$atual = $saldo-$valor;
	if($saldo >= $valor){

		$debitar = $pdo->query("UPDATE cards SET saldo = '$atual' WHERE numero = '$card'");
		$trans = $pdo->query("INSERT INTO transacoes (user, valor, anterior, atual, status, data, owner) VALUES ('$cpf', '$valor', '$saldo', '$atual', '2', '$data', '$owner')");

		$dados = array('status'=>'success',
				   	   'motivo' => 'Operação realizada');
		echo json_encode($dados);


	}else{
		$dados = array('status'=>'erro',
				   	   'motivo' => 'Saldo insuficiente');
		echo json_encode($dados);
	}
}else{
	$dados = array('status'=>'erro',
				   'motivo' => 'CPF ou CARTÃO Inválidos');
	echo json_encode($dados);
}
?>