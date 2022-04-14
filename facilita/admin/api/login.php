<?php
include "conn.php";

$email = $_POST['email'];
$senha = $_POST['senha'];

$login = $pdo->query("SELECT * FROM  users WHERE email = '$email' AND senha = '$senha' AND status = 'true' LIMIT 1");
if($login->rowCount() > 0){
	foreach ($login as $key) {
	$dados = array('status'=>'success',
				   'nivel' => $key['nivel'],
					'cpfuser' => $key['cpf']);
					
	}
	echo json_encode($dados);
}else{
	$dados = array('status'=>'erro');

	echo json_encode($dados);
}

?>