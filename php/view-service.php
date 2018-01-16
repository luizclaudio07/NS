<?php 

	$modulo = $_POST['modulo'];
	$user = $_POST['user'];
	$urlArquivo = '';

	include 'Conecta.php';

	$db = new DB();

	$query = "SELECT * FROM ARQUIVOS WHERE MODULO = '" . $modulo . "' AND NUMCPF = " . $user . "";
	
	$r = $db->query($query);

	if(count($r) > 0)
		$urlArquivo = '../files/' . $r[0]['NOMARQUIVO'] ;

	echo $urlArquivo;



?>