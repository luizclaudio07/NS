<?php 
	if(isset($_SESSION))
		header("Location:pages/menu.php");

?>
<!DOCTYPE html>
<html>
<head>
	<title>NÓS Construção Conectada</title>

	<?php include 'php/head_tags.php'; ?>

	<script type="text/javascript" src="js/services.js"></script>

</head>
<body>
	<div class="login-bg"></div>
	<div class="col-md-4 card">
		<div class="card-body">
			<div class="text-center">
				<img src="http://www.nosarquitetos.com.br/wp-content/uploads/2017/12/LOGO-NÓS-hor-NOVA-PROPOSTA-e1513687893287.png" class="image-fluid logo-inicial" />
			</div>
		</div>
		<p id="lblMsgRetornos" class="lead" style="margin: 15px 0;text-align:center;">Preencha os campos abaixo.</p>
		<div class="card-body">
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon"><i class="material-icons">person</i></span>
					<input type="text" id="txtUserLogin" class="form-control" />
				</div>
			</div>
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon"><i class="material-icons">lock</i></span>
					<input type="password" id="txtPassLogin" class="form-control" />
				</div>
			</div>
			<div class="form-group">
				<button class="btn btn-success col-md-12" id="btnEntrarLogin">Entrar </button>
			</div>
		</div>
	</div>
	
		
	
</body>
</html>