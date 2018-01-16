<?php 

	$user = $_POST['user'];
	$pass = $_POST['pass'];

	include('Conecta.php');


	$db = new DB();

	$q = "SELECT CODUSUARIO,DCRSENHA,DATCADASTRO,TIPUSUARIO,SITUSUARIO,NUMCPF ".
		 "FROM USUARIO WHERE CODUSUARIO = '" . strtoupper($user) . "' AND DCRSENHA = '" . md5(strtoupper($pass)) . "' AND SITUSUARIO = 'A'";

	$r = $db->query($q);



	if(count($r) == 0){

		echo 0;
		$db->CloseConnection();

	} else {
		

		session_start();
		$_SESSION['nos_user'] = $r[0]['CODUSUARIO'];
		$_SESSION['nos_document'] = $r[0]['NUMCPF'];
		$_SESSION['nos_tipuser'] = $r[0]['TIPUSUARIO'];

		$db->CloseConnection();
		
		echo 1;

	}


	
 ?>