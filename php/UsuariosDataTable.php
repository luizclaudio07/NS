<?php 
	
	include 'Conecta.php';

	$db = new DB();

	$r = $db->query("SELECT NOMUSUARIO, NUMCPF, DATE_FORMAT(DATCADASTRO,'%d/%m/%Y %H:%i:%s') AS DATCADASTRO, SITUSUARIO FROM USUARIO");

	if(count($r) == 0){

		echo "<tr><td colspan=\"5\">Não tá usuários</td></tr>";
	
	} else {	
		$content = "";
	
		for($i=0; $i<count($r);$i++){
			$content .="<tr><td>" . $r[$i]['NOMUSUARIO'] . "</td>
		        		<td>" . $r[$i]['NUMCPF'] . "</td>
		        		<td>" . $r[$i]['DATCADASTRO'] . "</td>
		        		<td>" . $r[$i]['SITUSUARIO'] . "</td>
		        		<td><div class=\"btn-group\">
								<button onclick=\"abrilEdicaoUsuario(".$r[$i]['NUMCPF'].");\" class=\"btn btn-danger btn-sm\"><i class=\"material-icons\">mode_edit</i></button>
								<button class=\"btn btn-danger btn-sm\"><i class=\"material-icons\">block</i></button>
								<button onclick=\"apagarUsuarioDashboard(".$r[$i]['NUMCPF'].");\" class=\"btn btn-danger btn-sm\"><i class=\"material-icons\">close</i></button>
							</div></td></tr>";
		}

		echo($content);
	}


 ?>




	      