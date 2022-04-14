<?php
include "conn.php";

$num = $_POST['card'];
$card = $pdo->query("SELECT * FROM cards WHERE numero = '$num'");
if($card->rowCount() > 0){
	echo 1;
}else{
	echo 0;
}
?>