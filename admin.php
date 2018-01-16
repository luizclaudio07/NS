<!DOCTYPE html>
<html>
<head>
	<title>Portal de Gerenciamento</title>

	<?php 
	include 'php/Conecta.php';
	include 'php/head_tags.php'; 
	?>

	<script type="text/javascript" src="js/admin.js"></script>

</head>
<body>
	<div style="margin:0 auto;box-sizing:border-box;height:auto;margin-left:10%;">
	
	<div class="menu-container">
		<ul id="menu">
			<li id="img-logo" style="border-top:0;"><img src="https://espaconos.000webhostapp.com/img/logo.png"
				style="width:200px;margin:0 auto;" /></li>

			<li data-tab="atualizacoes" class="ativo"><i class="material-icons">backup</i><a class="clicado" href="#">Atualizações</a></li>
			<li data-tab="novo_cliente"><i class="material-icons"><i class="material-icons">person_add</i></i><a  href="#">Novo cliente</a></li>
			<li data-tab="listagem"><i class="material-icons">list</i><a  href="#">Listagem geral</a></li>
			<li data-tab="sair"><i class="material-icons"><i class="material-icons">exit_to_app</i></i><a>Sair</a></li>
		</ul>
		
	</div>

	<div class="work-container">
		<div id="atualizacoes" class="aba ativa">


			<fieldset style="margin-bottom:30px;padding:10px;">
				<legend>Selecione o cliente</legend>
				<select class="form-control" id="cboClienteSelect">
					<option value="">Escolha</option>
					<?php 
						
						$db = new DB();

						$r = $db->query("SELECT * FROM USUARIO WHERE TIPUSUARIO = 1");
						
						for($i=0; $i<count($r);$i++)
							echo "<option value=\"" . $r[$i]['NUMCPF']  . "\">" . 
							$r[$i]['NOMUSUARIO'] . 
							" - CPF: " . $r[$i]['NUMCPF'] . "</option>";

					?>

				</select>
			</fieldset>

			<fieldset>
				<legend>Módulo</legend>
				<div class="row" style="height:170px;margin-bottom:30px;">
					<div class="col-md-3">
						<div class="modulo-item dashboard" >
							<p><i class="material-icons">&#xE24B;</i></p>
							<p>Dashboard</p>
						</div>
					</div>
					<div class="col-md-3">
						<div class="modulo-item financeiro">
							<p><i class="material-icons">attach_money</i></p>
							<p>Físico Financeiro</p>
						</div>
					</div>
					<div class="col-md-3">
						<div class="modulo-item agenda">
							<p><i class="material-icons">date_range</i></p>
							<p>Agenda</p>
						</div>
					</div>
					<div class="col-md-3">
						<div class="modulo-item galeria">
							<p><i class="material-icons">photo_camera</i></p>
							<p>Galeria</p>
						</div>
					</div>
				</div>
				<div class="row" style="height:170px;">
					<div class="col-md-3">
						<div class="modulo-item boletos">
							<p><i class="material-icons">insert_drive_file</i></p>
							<p>Boletos</p>
						</div>
					</div>
					<div class="col-md-3">
						<div class="modulo-item aprovacao">
							<p><i class="material-icons">check</i></p>
							<p>Aprovação de compra</p>
						</div>
					</div>
					<div class="col-md-3">
						<div class="modulo-item orcamento">
							<p><i class="material-icons">filter_none</i></p>
							<p>Orçamento de obra</p>
						</div>
					</div>
					<div class="col-md-3">
						<div class="modulo-item obra3d">
							<p><i class="material-icons">3d_rotation</i></p>
							<p>Obra 360°</p>
						</div>
					</div>
				</div>

				
			</fieldset>


		</div>
		<div id="novo_cliente" class="aba">

			<div class="form-group">
				<div class="row">
		        	<div class="col-md-6">
		        		<label>Nome completo:</label>
	        		<input type="text" id="txtNomCompleto" class="form-control" />
		        	</div>
		        	<div class="col-md-6">
		        		<label>Nome de Usuário:</label>
	        	<input type="text" id="txtNomeUser" class="form-control" />
		        	</div>
		        </div>
	        </div>
	        <div class="form-group">
	        	<div class="row">
		        	<div class="col-md-6">
		        		<label>Senha:</label>
		        		<input type="text" id="txtSenha1" class="form-control" />
		        	</div>
		        	<div class="col-md-6">
		        		<label>Confirmar senha:</label>
		        		<input type="text" id="txtSenha2" class="form-control" />
		        	</div>
		        </div>
	        </div>
	        <div class="form-group">
	        	<div class="row">
		        	<div class="col-md-6">
		        		<label>Tipo de Usuário:</label>
		        		<select id="cboTipUser" class="form-control">
		        			<option value="1">Cliente</option>
		        			<option value="2">Administrador</option>
		        		</select>

		        	</div>
		        	<div class="col-md-6">
		        		<label>CPF:</label>
		        		<input type="text" id="txtCPF" class="form-control" />
		        	</div>
		        </div>
	        </div>
	        <div class="form-group">
	        	<div class="row">
	        		<div class="col-md-3">
	        			<a id="btnNovoUsuario" href="#" class="btn btn-success btn-sm btn-block">Salvar</a>
	        		</div>
	        		<div class="col-md-9">
	        			
						<div id="lblRespostaNovoUsuario" class="alert alert-success alert-dismissible fade show" role="alert" style="margin-bottom:0;font-size:14px;padding:3px;">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close" style="padding:0;">
								<span aria-hidden="true">&times;</span>
							</button>
							<b></b>
						</div>
	        		</div>
	        	</div>
	        </div>

	        <div class="form-group">
	        	<input alt="dtUsuario" type="text" placeholder="Procurar na lista por..." class="form-control form-control-sm" id="txtFiltrarTabela" />
	        </div>
	        
	        <div style="width:100%;max-height:45%;overflow-y:scroll;">
		        <table id="dtUsuario" class="table table-hover table-dark">
			        <thead>
			        	<tr>
			        		<th>Nome</th>
			        		<th>CPF</th>
			        		<th>Data de Cadastro</th>
			        		<th>Situação</th>
			        		<th>Ação</th>
			        	</tr>
			        </thead>
			        <tbody>
		         	</tbody>
		        </table>
	        </div>
        </div>
		<div id="listagem" class="aba">
			TODO: Listagem geral
			
		</div>
		
	</div>
	</div>


	<!-- MODAL DAS FUNCIONALIDADES -->
	<div class="modal fade" id="modalEditor" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="tituloModal">Dashboard - Edição</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

					<form id="frm">
					<input type="hidden" id="inpHiddenFunc" value="" />

					<div class="btn-group" data-toggle="buttons">
						<label class="btn btn-secondary" id="option1">
							<input type="radio" name="options">Imagem</label>
						<label class="btn btn-secondary" id="option2">
							<input type="radio" name="options">PDF</label>
					</div>
					<div id="previaImagem">
						<iframe id="frameIMG" src="pages/frameImagem.html"></iframe>
					</div>
					<div id="previaPDF">
						<iframe id="framePDF" src="pages/framePDF.html"></iframe>
					</div>

					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
					<button id="btnSalvarEdicao" type="button" class="btn btn-secondary">Salvar</button>
				</div>
			</div>
		</div>
	</div>


	<!-- MODAL DAS EDIÇÃO DE USUÁRIO -->
	<div class="modal fade" id="modalEditorUsuario" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Editar Usuário</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>CPF:</label>
								<input type="text" class="form-control" id="txtCPFEdicao" disabled />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Nome Completo:</label>
								<input type="text" class="form-control" id="txtNomeEdicao" />
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Nome de usuário:</label>
								<input type="text" class="form-control" id="txtUsuarioEdicao" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Tipo de perfil:</label>
								<select class="form-control" id="cboTipoEdicao">
									<option value="1">Cliente</option>
									<option value="2">Administrador</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Nova senha:</label>
								<input type="text" class="form-control" id="txtSenha1Edicao" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Confirmar senha:</label>
								<input type="text" class="form-control" id="txtSenha2Edicao" />
							</div>
						</div>
					</div>
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
					<button id="btnEditarUsuario" type="button" class="btn btn-secondary">Salvar</button>
				</div>
			</div>
		</div>
	</div>
</body>
</html>