<?php 
	
	include 'Conecta.php';

	$user = $_POST['user'];
	$pass = $_POST['pass'];
	$cpf = $_POST['cpf'];
	$tipuser = $_POST['tipUser'];
	$nomeUsuario = $_POST['nomUser'];

	$db = new DB();

	$r = $db->query("SELECT COALESCE(CODUSUARIO,'ERRO') AS CODUSUARIO FROM USUARIO WHERE CODUSUARIO = '" . $user . "'");

	if(count($r) > 0){
		echo "Usuário já existe";
	} else {
		
		$db->query("INSERT INTO USUARIO (CODUSUARIO, DCRSENHA, DATCADASTRO, TIPUSUARIO, SITUSUARIO, NUMCPF, NOMUSUARIO) VALUES ('" . strtoupper($user) . "', '" . md5(strtoupper($pass)) . "', NOW(), " . $tipuser . ", 'A', " . $cpf . ", '" . strtoupper($nomeUsuario) . "')");


		echo('OK');
	}





?>