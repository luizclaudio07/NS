<?php 

	session_start();

	if(!isset($_SESSION['nos_tipuser']))
		header("Location:../index.php");


	if($_SESSION['nos_tipuser'] == "2")
		header("Location:../admin.php");


 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Nós Arquitetos</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="../essencial/bootstrap.min.css">
	<script type="text/javascript" src="../essencial/jquery.min.js"></script>
	<script type="text/javascript" src="../essencial/popper.min.js"></script>
	<script type="text/javascript" src="../essencial/bootstrap.min.js"></script>
	
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<style type="text/css">
	
		div.option-item{
			margin:0 auto;
			width:150px;
			height: 150px;
			box-sizing: border-box;
			background-color: rgb(27,27,27);
			box-sizing: border-box;
			cursor: pointer;
			border-radius: 10px;
			padding-top: 15px;
		}

		div.option-item:hover, div.option-item:active, div.option-item:focus{
			background-color: #1b1b1bbf;
		}

		p{text-align:center;margin:5px auto;color:white;}


		.row{
			margin-bottom: 15px;
		}

		.material-icons{
			font-size:70px;
			color: white;
		}

		.navbar-expand-lg{
			background-color:rgb(27,27,27);
		}

		.navbar-expand-lg a{
			color: white;
		}
	</style>
</head>
<body>

<nav class="navbar navbar-expand-lg">
  <a class="navbar-brand" href="#">Espaço NÓS</a>
</nav>
	<br />
	<div class="container">
		<div class="row">
			<div class="col-6">
				<div class="option-item dashboard" data-alvo="dashboard">
					<p><i class="material-icons">&#xE24B;</i></p>
					<p>Dashboard</p>
				</div>
			</div>
			<div class="col-6">
				<div class="option-item" data-alvo="financeiro">
					<p><i class="material-icons">attach_money</i></p>
					<p>Físico Financeiro</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-6">
				<div class="option-item" data-alvo="agenda">
					<p><i class="material-icons">date_range</i></p>
					<p>Agenda</p>
				</div>
			</div>
			<div class="col-6">
				<div class="option-item" data-alvo="galeria">
					<p><i class="material-icons">photo_camera</i></p>
					<p>Galeria</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-6">
				<div class="option-item" data-alvo="boletos">
					<p><i class="material-icons">insert_drive_file</i></p>
					<p>Boletos</p>
				</div>
			</div>
			<div class="col-6">
				<div class="option-item sair" data-alvo="sair">
					<p><i class="material-icons">close</i></p>
					<p>Sair</p>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		$(document).ready(function(){

			$('.option-item').click(function(){

				var alvo = $(this).data('alvo');
				
				//window.location.href = alvo + ".php";
				window.location.href = 'view.php?modulo=' + alvo;

			});
		});
	</script>


</body>
</html>