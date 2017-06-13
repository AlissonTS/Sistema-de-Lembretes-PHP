<?php 
	session_start();	

	if (isset($_SESSION['nome']) and isset($_SESSION['senha'])){		
		?>
		<html>
			<head>
				<meta charset="utf-8">
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
				<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">

				<link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
				<link rel="icon" type="image/png" href="icone/notas.png" />
			    <title>Alterar Lembrete</title>
			</head>
			<body>
				<div class="row">
					<div class="col-md-12">
						 <nav class="navbar navbar-default">
						  <div class="container-fluid">
						    <div class="navbar-header">
						      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						        <span class="icon-bar"></span>
								<span class="icon-bar"></span>
						        <span class="icon-bar"></span>
						      </button>
						      <a class="navbar-brand" href="lembretes.php">Add Lembretes <i class="glyphicon glyphicon-list-alt"></i></a>
						    </div>
						    <div class="collapse navbar-collapse" id="myNavbar">
						      <ul class="nav navbar-nav  navbar-right">
						        <li><a href="lembretes.php">Página Inicial do Usuário</a></li>
						        <li><a href="cadastroLembrete.php">Cadastrar Lembrete</a></li>
						        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
						      </ul>
						    </div>
						  </div>
						</nav>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<h1 class="page-header text-center">Alterar Lembrete:</h1>
						<form role="form" method="POST" action="controla.php">
							<?php 
								include 'ConexaoBD.class.php';
								include "Lembrete.class.php";

									$lembrete = new Lembrete;
									$lembrete->id = $_GET['id'];

									$resultado = $lembrete->mostrarLembrete();

									if($resultado){
										while($linha=mysqli_fetch_assoc($resultado)){
											$id = $linha['id'];
											$data = $linha['data'];
											$descricao = $linha['descricao'];
											$observacao = $linha['observacao'];
										}
									}	
								echo "<input type='hidden' name='id' value='".$id."'/>";
							?>

							<input type="hidden" name="operacao" value="alterarLembrete"/>
							<div class="form-group">
								<label for="data">Data:</label>
								<?php echo "<input type='text' class='form-control' name='data' id='data' placeholder='Digite a Data do Lembrete' value='".$data."' required>"?>
							</div>
							<div class="form-group">
								<label for="descricao">Descrição:</label>
								<?php echo "<input type='text' class='form-control' name='descricao' placeholder='Digite a Descrição do Lembrete' value='".$descricao."' required>"?>
							</div>
							<div class="form-group">
								<label for="observacao">Observação:</label>
								<?php echo "<input type='text' class='form-control' name='observacao' placeholder='Digite a Observação do Lembrete' value='".$observacao."'>"?>
							</div>
							<br>
							<div style="text-align: center;"><button type="submit" class="btn btn-success" value="alterarTarefa">Alterar Lembrete</button></div>
							<br><p class="text-center" style="font-size: 17px">Campos Data e Descrição são Obrigatórios.</p>
						</form>	
					</div>
				</div>
				<script src="js/jquery.min.js" type="text/javascript"></script>
		        <script src="js/bootstrap.js"></script>
				<script src="js/jquery.js" type="text/javascript"></script>
				<script src="js/jquery.maskedinput.js" type="text/javascript"></script>
				<script src="js/jsProgWeb.js" type="text/javascript"></script>			
			</body>
		</html>	
	<?php
	}
	else{
		echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=index.php'>";
	}
?>