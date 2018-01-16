function sleep(ms) {
  return new Promise(resolve => setTimeout(resolve, ms));
}

$(document).ready(function(){

	$('body').keydown(function(event ){
		if ( event.which == 13 ) {
			$('#btnEntrarLogin').click();
		}
	});

	$('#btnEntrarLogin').click(function(){
		
		var _user = $('#txtUserLogin').val();
		var _pass = $('#txtPassLogin').val();

		$.ajax({
			url: 'php/LoginEntrada.php',
			method: 'POST',
			data: {user: _user, pass: _pass},
			success: function(ret){
				console.log(ret);
				if(ret == 1){
					window.location.href = "pages/menu.php";
				} else {
					$('#lblMsgRetornos').html("Usuário ou senha incorretos.")
					.css('margin-top', '15px')
					.css('margin-bottom', '15px');
				}
				
			},
			beforeSend: function(){

				$('#lblMsgRetornos')
					.html('<img src="img/loading.gif" />')
					.css('margin','auto');

				$('#lblMsgRetornos img')
					.css('width', '60px');

				sleep(20000);
			},
			error: function(err){
				$('#lblMsgRetornos').html(err)
					.css('margin-top', '15px')
					.css('margin-bottom', '15px');
			}


		})



	}); //btnEntrarLogin.click




}); //document.ready

