<?php 

	session_start();

	if(!isset($_SESSION))
		header("Location:../index.php");

	if($_SESSION['nos_tipuser'] == "2")
		header("Location:../admin.php");


 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Nós Arquitetos</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<meta charset="utf-8">

	<link rel="stylesheet" type="text/css" href="../essencial/bootstrap.min.css">

	<script type="text/javascript" src="../essencial/jquery.min.js"></script>
	<script type="text/javascript" src="../essencial/popper.min.js"></script>
	<script type="text/javascript" src="../essencial/bootstrap.min.js"></script>

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
			cursor: pointer;
			border-radius: 10px;
			padding-top: 15px;
		}

		div.option-item:hover, div.option-item:active, div.option-item:focus{
			background-color: #432F24;
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

		.conteudoPDF{
			width: 80%;
			margin: 0 auto;
			text-align:center;
			background-color:rgb(27,27,27);
		}

		.conteudoPDF p{
			color: white;
			font-size: 16px;
		}
	</style>
	<script type="text/javascript">

		$.getParam = function(name){
			var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
			return results[1] || 0;
		}
		
		$(document).ready(function(){
			
			$('div.conteudoIMG').css('display', 'none');
			$('div.conteudoPDF').css('display', 'none');
			

			var _modulo = $.getParam('modulo');

			if(_modulo == "sair"){
				window.location.href = "../php/logout.php";
				return;
			}

			<?php echo "var _user = '" . $_SESSION['nos_document'] . "';"; ?>
			
			$.ajax({
				url: '../php/view-service.php',
				data: {modulo: _modulo, user: _user},
				method: 'POST',
				success: function(msg){

					if(msg == ""){
						alert('Não há arquivos habilitados nessa opção.');
						window.location.href = "menu.php";
						return;
					}

					if(msg.toUpperCase().includes('JPG') || msg.toUpperCase().includes('JPEG') || msg.toUpperCase().includes('PNG') || msg.toUpperCase().includes('BMP')){

						$('div.conteudoIMG').css('display', 'block').html('<img class="img-fluid" src="'+msg+'" />');

					} else {

						$('div.conteudoPDF').css('display', 'block');

					

						$('div.conteudoPDF').css('display', 'block').html('<iframe style="width:100%;height:100%;" src="'+"http://192.168.0.103:8080/NOS/" + msg.replace('../', '')+'"></iframe>');
  						

  						
					
					}


					
				},
				error: function(err){
					console.log(err);
				}

			});

		});


	</script>
	

</head>
<body>

<nav class="navbar navbar-expand-lg">
  <a class="navbar-brand" href="#">Espaço NÓS</a>
  <div class="pull-right">
  	<a href="menu.php" class="btn btn-dark">Voltar</a>
  </div>
</nav>

<div class="conteudoIMG">
	
</div>
<div class="conteudoPDF" style="width:100%;height:500px;">
	<p>Habilite a opção de abrir pop-up do seu navegador.</p>
	<p>Após isso <a href="#" onClick='parent.location="javascript:location.reload()"'>Cique aqui para abrir o arquivo</a>.</p>
</div>
</body>
</html>