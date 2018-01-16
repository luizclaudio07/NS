function abrilEdicaoUsuario(_cpf){

	$('#txtCPFEdicao').val('');
	$('#txtNomeEdicao').val('');
	$('#cboTipoEdicao').val('');
	$('#txtUsuarioEdicao').val('');

	$('#modalEditorUsuario').modal();  
	
	$.ajax({
		url: 'php/GetDetalhesUsuario.php',
		data: {cpf: _cpf},
		method: 'POST',
		dataType: "json",
		success: function(msg){

			$('#txtCPFEdicao').val(msg[0]['NUMCPF']);
			$('#txtNomeEdicao').val(msg[0]['NOMUSUARIO']);
			$('#cboTipoEdicao').val(msg[0]['TIPUSUARIO']);
			$('#txtUsuarioEdicao').val(msg[0]['CODUSUARIO']);
		}

	});


	
}

function apagarUsuarioDashboard(_cpf){

	if(confirm("Deseja realmente deletar o usuário de CPF " + _cpf + "?") == true){
		
		$.ajax({
			url: 'php/ApagarUsuario.php',
			data: {cpf: _cpf},
			method: 'POST',
			success: function(){
				montarDTUsuario();
			}
		});
	}
}

function montarDTUsuario(){
	$.ajax({
		url: 'php/UsuariosDataTable.php',
		success: function(ret){
			$("#dtUsuario tbody").html(ret);
		},
		error: function(err){
			console.log(err);
		}
	})
}


$(function(){
    $("#txtFiltrarTabela").keyup(function(){
        
        var tabela = $(this).attr('alt');
        if($(this).val() != ""){
            $("#"+tabela+" tbody>tr").hide();
            $("#"+tabela+" td:contains-ci('" + $(this).val() + "')").parent("tr").show();
        } else{
            $("#"+tabela+" tbody>tr").show();
        }
    }); 
});

$.extend($.expr[":"], {
    "contains-ci": function(elem, i, match, array) {
        return (elem.textContent || elem.innerText || $(elem).text() || "").toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
    }
});



$(document).ready(function(){

	$(".menu-container ul li").on('click', function(){
		
		$(this).parent().find('.ativo').removeClass('ativo');
		$(this).addClass('ativo');

		var tab_id = $(this).attr('data-tab');

		if(tab_id == "sair"){
			window.location.href = "php/logout.php";
		}

		$('.aba').removeClass('ativa');
		$("#"+tab_id).addClass('ativa');
	});


$(".nav-tabs li a").on('click', function(){
	$(this)
	.parent().parent()
	.find(".active").removeClass('active');
	$(this).parent().addClass('active');

	var tab_id = $(this).attr('data-tab');
	
	$('.nav-tabs ul li').removeClass('aberta');
	$('.tab-result').removeClass('aberta');

	
	$("#"+tab_id).addClass('aberta');
});


	$('.modulo-item').click(function(){
		$('#modalEditor').modal();  
		$('#tituloModal').html( $(this).find('p').eq(1).html() + ' - Edição');
		
		var modulo = "";

		switch($(this).find('p').eq(1).html()){
			case "Dashboard":
				modulo = "dashboard";
				break;

			case "Físico Financeiro":
				modulo = "financeiro";
				break;

			case "Agenda":
				modulo = "agenda";
				break;

			case "Galeria":
				modulo = "galeria";
				break;

			case "Boletos":
				modulo = "boletos";
				break;

			case "Aprovação de compra":
				modulo = "aprovacao";
				break;

			case "Orçamento de obra":
				modulo = "orcamento";
				break;

			case "Obra 360°":
				modulo = "obra360";
				break;
		}

		$('#inpHiddenFunc').val(modulo);

	});


	montarDTUsuario();
	$('#previaImagem').css('display', 'none');
	$('#previaPDF').css('display', 'none');

	$('#lblRespostaNovoUsuario').css('display', 'none');

	$("#option1").click(function(){
		$('#previaImagem').css('display', 'block');
		$('#previaPDF').css('display', 'none');

	});

	$("#option2").click(function(){
		$('#previaImagem').css('display', 'none');
		$('#previaPDF').css('display', 'block');
		
	});


	$('#btnFileModal').change(function(){
		
		var extension = $(this).val().substr( ($(this).val().lastIndexOf('.') +1) );

		switch(extension){
			case 'jpg': case 'png': case'png':
				$('#previaImagem').css('display', 'block');
				$('#previaPDF').css('display', 'none');	


				break;

			case 'pdf':
				$('#previaImagem').css('display', 'none');
				$('#previaPDF').css('display', 'block');	
				break;

			default:
				alert('Tipo de arquivo não aceito.');
				$(this).val('');
				$('#previaImagem').css('display', 'none');
				$('#previaPDF').css('display', 'none');
				break;

		}

	});

	$('#btnSalvarEdicao').click(function(){

		var file = null;
		var cliente = $('#cboClienteSelect').val();
		var tipArquivo = ($('#option1').hasClass('active') ? 'IMG' : 'PDF');
		var modulo = $('#inpHiddenFunc').val();
		

		if(cliente == ""){
			alert('Eescolha um cliente para a atualização!');
			return;
		}

		if(tipArquivo == 'PDF'){
			file = $("#framePDF").contents().find("input")[0].files[0];
			if(file == null){
				alert('Escolha um arquivo para upload.');
				return;
			}

		} else {
			file = $("#frameIMG").contents().find("input")[0].files[0];
		}
		


		var f = new FormData();

		f.append('file', file);
		f.append('cliente', cliente);
		f.append('modulo', modulo);
		
		$.ajax({
			url: 'php/EdicaoFuncional.php',
			type: "POST",
		   	data: f,
		   	processData: false,  
		   	contentType: false,
	        success: function(ret){
	        	
	        	$('#option1').removeClass('active');
	        	$('#option2').removeClass('active');

	        	$('#previaImagem iframe').attr('src', 'pages/frameImagem.html');
				$('#previaPDF iframe').attr('src', 'pages/framePDF.html');

				$('#previaImagem').css('display', 'none');
				$('#previaPDF').css('display', 'none');

				alert('Arquivo enviado com sucesso!');

	        },
	        error: function(err){
				console.log("deu erro");
	        	//console.log(err);
	        }

		});


	});



	$('#btnNovoUsuario').click(function(){

		//validações dos campos
		var _user = $('#txtNomeUser').val();
		var _nome = $('#txtNomCompleto').val();
		var _senha = $('#txtSenha1').val();
		var _senha2 = $('#txtSenha2').val();
		var _tipUser = $('#cboTipUser').val();
		var _cpf = $('#txtCPF').val();

		

		$.ajax({
			url: 'php/NovoUsuarioADMIN.php',
			data: {user: _user, pass: _senha, cpf: _cpf, tipUser: _tipUser, nomUser: _nome},
			method: 'POST',
			success: function(msg){
				if(msg == 'OK')
					montarDTUsuario();
					$('#lblRespostaNovoUsuario b').html('Cadastrado com sucesso!');
					$('#lblRespostaNovoUsuario').css('display', 'block');

					$('#txtNomeUser').val('');
					$('#txtNomCompleto').val('');
					$('#txtSenha1').val('');
					$('#txtSenha2').val('');
					$('#cboTipUser').val('');
					$('#txtCPF').val('');
			}

		});

	});


	$('#btnEditarUsuario').click(function(){

		var _cpf = $('#txtCPFEdicao').val();
		var _nome = $('#txtNomeEdicao').val();
		var _tipo = $('#cboTipoEdicao').val();
		var _usuario = $('#txtUsuarioEdicao').val();
		var _senha1 = $('#txtSenha1Edicao').val().trim();
		var _senha2 = $('#txtSenha2Edicao').val().trim();

		if(_senha1 != "" || _senha2 != ""){

			if(_senha1 != _senha2){
				alert("As senhas não estão iguais.");
				return;
			}


		}


		$.ajax({
			url: 'php/AtualizarUsuarioADMIN.php',
			method: 'post',
			data: {cpf: _cpf, nome: _nome, tipo: _tipo, usuario: _usuario, senha: _senha1},

			success: function(msg){

				$('#txtCPFEdicao').val('');
				$('#txtNomeEdicao').val('');
				$('#cboTipoEdicao').val('');
				$('#txtUsuarioEdicao').val('');
				$('#txtSenha1Edicao').val('');
				$('#txtSenha2Edicao').val('');

				montarDTUsuario();
				alert("Atualizado com sucesso.");
			}
		});


	});
});