<?php
include "conn.php";
date_default_timezone_set('America/Sao_Paulo');
$user = $_POST['user'];

$vendas = $pdo->query("SELECT * FROM transacoes WHERE user = '$user' ORDER BY id DESC");
echo "<div class='row'>";

foreach ($vendas as $key) {
	$data = strftime("%d %b ", strtotime($key['data']));
	if($key['status'] == 1){
		$title = '<h5>Saldo Adicionado</h5>';
		$img = '<img src="../assets/img/up.png" width="30">'; 
		$valor = '<small class="text-success">
					+ R$ '.$key['valor'].'
				  </small>';
         $extrato = '<div class="col">
						<h6>Saldo: '.$key['anterior'].'</h6>
	    				<h6>Adicionado: 
	    					<span class="text-success">
	    				 		+ '.$key['valor'].'
	    					 </span>
	    				</h6>
					</div>

					<div class="col-auto">
						<h6>'.$data.'</h6>
						<h6>Total '.$key['atual'].'</h6>
					</div>
	    			';

	}else if($key['status'] == '2'){
		$title = '<h5>Venda Realizada</h5>';
		$img = '<img src="../assets/img/down.png" width="30">'; 
		$valor = '<small class="text-danger">
					- R$ '.$key['valor'].'
				  </small>';

		 $extrato = '<div class="col">
						<h6>Saldo: '.$key['anterior'].'</h6>
	    				<h6>Custo: 
	    					<span class="text-danger">
	    				 		- '.$key['valor'].'
	    					 </span>
	    				</h6>
					</div>

					<div class="col-auto">
						<h6>'.$data.'</h6>
						<h6>Total '.$key['atual'].'</h6>
					</div>
	    			';

	}else if($key['status']){
		$title = '<h5>Venda Extornada</h5>';
		$img = '<img src="../assets/img/cashback.png" width="30">'; 
		$valor = '<small class="text-success">
					+ R$ '.$key['valor'].'
				  </small>';
	    $extrato = '<div class="col">
						<h6>Saldo: '.$key['anterior'].'</h6>
	    				<h6>Extornado: 
	    					<span class="text-success">
	    				 		+ '.$key['valor'].'
	    					 </span>
	    				</h6>
					</div>

					<div class="col-auto">
						<h6>'.$data.'</h6>
						<h6>Total '.$key['atual'].'</h6>
					</div>
	    			';

	}
	echo '	<div class="col-12 col-md-12">
									<div class="card showext">
										<div class="card-body">
											<div class="row">
												<div class="col-auto">
													'.$img.'
												</div>
												<div class="col">
													'.$title.'
												</div>
												<div class="col-auto">
													'.$valor.'
												</div>
											</div>

											<div class="container" style="display:none;" id="dadosext">
												<hr>

												<div class="row">
													'.$extrato.'
												</div>

											</div>
										</div>
									</div>
								</div>';
}

echo "<div>

		<script>
			$('.showext').click(function(){
				$(this).find('#dadosext').slideToggle('down');
			})
		</script>";
?>