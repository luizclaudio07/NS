<?php 
	
	include 'Conecta.php';

	$db = new DB();

	$r = $db->query("DELETE FROM USUARIO WHERE NUMCPF = " . $_POST['cpf']);



 ?>