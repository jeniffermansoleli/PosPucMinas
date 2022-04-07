<?php
include "conn.php";

$user = $_POST['owner'];


$owner = $pdo->query("SELECT id FROM users WHERE cpf = '$user'")->fetchColumn();

	
	$vendas = $pdo->query("SELECT * FROM transacoes WHERE status = '2' AND owner = '$owner' ORDER BY id DESC");

if($vendas->rowCount() > 0){
foreach ($vendas as $key) {
 	 echo '<tr role="row" class="odd">
						<td class="">'.$key['user'].'</td>
						<td class="sorting_1"><span class="text-danger">- R$'.$key['valor'].'</span></td>
						
						<td style="white-space: nowrap;">
							<button onclick="extrato('.$key['id'].')" class="btn btn-primary btn-border btn-sm">
								<i class="fas fa-receipt"></i>
								Extrato
							</button>

							<button onclick="extorno('.$key['id'].')" class="btn btn-danger btn-sm">
								<i class="fas fa-hand-holding-usd"></i>
								Extornar
							</button>
						</td>
					</tr>';
  }  

  
}else{
	echo "<div class='text-center'>Nenhum extrato encontrado</div>";
}
?>