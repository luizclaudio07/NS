<?php 
	
	$cpf = $_POST['cpf'];

	include 'Conecta.php';

	$db = new DB();

	$r = $db->query("SELECT NUMCPF, NOMUSUARIO, TIPUSUARIO, CODUSUARIO FROM USUARIO WHERE NUMCPF = " . $cpf);

	if(count($r) > 0){
		echo json_encode($r);
	}

	

	

	
?>