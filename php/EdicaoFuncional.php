<?php 


	$cliente = $_POST['cliente'];
	$modulo = $_POST['modulo'];
	$f = $_FILES;

	$diretorio = '../files/';
	$extensao = explode('/', $f['file']['type'])[1];
	$arquivo = $cliente . '_' . $modulo . '.' . $extensao;
	$caminhoCompleto = $diretorio . $cliente . '_' . $modulo . '.' . $extensao;
	

	if(copy($f['file']['tmp_name'], $caminhoCompleto)){
		
		include 'Conecta.php';

		$db = new DB();

		if($modulo == "galeria"){	
			$r = $db->query("INSERT INTO ARQUIVOS VALUES ('" . $cliente . "', NOW(), '" . $arquivo . "', '" . $modulo . "')");
		}

		$r = $db->query("SELECT * FROM ARQUIVOS WHERE MODULO = '" . $modulo . "' AND NUMCPF = " . $cliente);

		if(count($r) > 0){

			$r = $db->query("UPDATE ARQUIVOS SET NOMARQUIVO = '" . $arquivo . "', DATCADASTRO = NOW() WHERE NUMCPF = " . $cliente . " AND MODULO = '" . $modulo . "'");

		} else {

			$r = $db->query("INSERT INTO ARQUIVOS VALUES ('" . $cliente . "', NOW(), '" . $arquivo . "', '" . $modulo . "')");

		}

		




	} else {
		echo "erro!";
	}



 ?>