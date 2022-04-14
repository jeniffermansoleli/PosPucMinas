<?php
include "conn.php";

$email = $_POST['email'];

$v = $pdo->query("SELECT * FROM users WHERE email = '$email'");
if($v->rowCount() > 0){
	$v = $v->fetch();

	$dados = array("status" => "success", 
				   "nome" => $v['nome'],
				   "email" => $v['email'],
				   "senha" => $v['senha']);

	echo json_encode($dados);
}else{
	$dados = array("status" => "erro",
				   "motivo" => "Usuário não encontrato");
	echo json_encode($dados);
}
?>