<?php
date_default_timezone_set('America/Sao_Paulo');

try {
$pdo = new PDO('mysql:host=localhost;dbname=facilita;charset=utf8mb4','linkon', 'linkon',
array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

}
catch(PDOException $ex){
        echo "Erro ao estabelecer conexão => ".$ex;
}

?>

