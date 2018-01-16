<?php 
	
	$cpf = $_POST['cpf'];
	$nome = $_POST['nome'];
	$usuario = $_POST['usuario'];
	$tipo = $_POST['tipo'];
	$senha = $_POST['senha'];

	include 'Conecta.php';

	$db = new DB();

	$r = $db->query("UPDATE USUARIO SET NOMUSUARIO = '" . $nome . "', CODUSUARIO = '" . $usuario . "', TIPUSUARIO = " . $tipo . " " . ($senha != '' ? ", DCRSENHA = '" . md5(strtoupper($senha)) . "'" : "") . " WHERE NUMCPF = " . $cpf);




?>