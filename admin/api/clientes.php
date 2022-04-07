<?php
include "conn.php";

$admin = $_POST['user'];
$cliente = @$_POST['cliente'];
$adm = $pdo->query("SELECT id FROM users WHERE email = '$admin'")->fetchColumn();

if(isset($cliente)){
	$users = $pdo->query("SELECT * FROM users WHERE  (nome like '%$cliente%' or cpf like '%$cliente%' or email like '%$cliente%')  AND owner = '$adm' AND nivel = '2'");
}else{
	$users = $pdo->query("SELECT * FROM users WHERE owner = '$adm' AND nivel = '2'");
	
}
	if($users->rowCount()>0){
		foreach ($users as $key) {
			if($key['status'] == "true"){
				$check = 'checked';
			}else{
				$check = 'false';
			}
			echo '
					<tr role="row" class="odd">
						<td class="">'.$key['nome'].'</td>
						<td class="sorting_1">'.$key['email'].'</td>
						<td class="sorting_1">'.$key['cpf'].'</td>
						<td>
							<label class="switch-wrap switch-success">
								<input type="checkbox" class="status-check" id="'.$key['id'].'" '.$check.'>
								<div class="switch"></div>
							</label>
						</td>
						<td style="white-space: nowrap;">
							<button onclick="view('.$key['id'].')" class="btn btn-primary btn-border btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar">
								<i class="fas fa-user"></i>
							</button>

							<button onclick="card('.$key['id'].')" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Saldo">
								<i class="fas fa-credit-card"></i>
							</button>

						</td>
					</tr>';
		}

		echo '<script>
				$(".status-check").click(function(){
				    id = $(this).attr("id");
				    check = $("#"+id+":checked").length;
				    console.log("id: "+id+" check: "+check);
				    if(check == 1){
				    	check = true;
				    }else if(check == 0){
				    	check = false;
				    }
				    up = "id="+id+"&check="+check;

				    $.post("api/status-up.php", up, (u)=>{
				    	console.log(u);
				    })
				})

				function del(id){
					console.log("deleta: "+id);
					id = "id="+id;
					$.post("api/deleta-cliente.php", id, (d)=>{
						console.log(d);
						if(d == 1){
							clientes();
						}
					})
				}
			 </script>';
	}else{	
		echo "<div class='text-center'>Nenhum usuário encontrado</div>";
	}

?>