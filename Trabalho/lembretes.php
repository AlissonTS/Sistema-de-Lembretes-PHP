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
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
			<link rel="icon" type="image/png" href="icone/notas.png" />
		    <title>Lista de Lembretes</title>
		    <style>
				table, th, td {
				    border: 1px solid black;
				}
		    </style>
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
					      <a class="navbar-brand" href="cadastroLembrete.php">Add Lembretes <i class="glyphicon glyphicon-list-alt"></i></a>
					    </div>
					    <div class="collapse navbar-collapse" id="myNavbar">
					      <ul class="nav navbar-nav  navbar-right">
					        <li class="active"><a href="lembretes.php">Página Inicial do Usuário</a></li>
					        <li><a href="cadastroLembrete.php">Cadastrar Lembrete</a></li>
					        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
					      </ul>
					    </div>
					  </div>
					</nav>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<h1 class="text-center">Olá 
					<?php
						echo $_SESSION['nome'];	
					?>
					</h1>
				</div>
			</div>
			<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<h1 class="page-header text-center">Lista de Lembretes:</h1>
						<form class="navbar-form" role="search" method="POST" action="pesquisaLembrete.php">
							<div class="input-group">
									<input type="hidden" name="operacao" value="pesquisarLembrete"/>	
									<input type="text" size="40" class="form-control" placeholder="Digite algo sobre o Lembrete" name="pesquisa" required>
									<div class="input-group-btn">
										<button class="btn btn-default" type="submit" value="Pesquisar"><i class="glyphicon glyphicon-search"></i></button>
									</div>
							</div>
						</form>	
						<br>
						<div class="table-responsive">
							<table class="display table text-center table table-bordered">
								<thead>
									<tr>
										<th class="text-center">Data</th>
										<th class="text-center">Descrição</th>
										<th class="text-center">Observações</th>
										<th class="text-center">Ação</th>		
									</tr>
								</thead>
								<tbody>
									<?php
										include 'ConexaoBD.class.php';
										include "Lembrete.class.php";

										if (isset($_SESSION['nome']) and isset($_SESSION['senha'])){		
											$lembrete = new Lembrete;
											$lembrete->chave = $_SESSION['id'];

											$resultado = $lembrete->mostrar();

											if($resultado){
												$num_rows = mysqli_num_rows($resultado);
												// echo $num_rows;

												if($num_rows>0){
													while($linha=mysqli_fetch_assoc($resultado)){
														$id = $linha['id'];
														$data = $linha['data'];
														$descricao = $linha['descricao'];
														$observacao = $linha['observacao'];

														echo "<tr>";
														echo "<td>".$data."</td>";	
														echo "<td>".$descricao."</td>";	
														echo "<td>".$observacao."</td>";	

														echo "<td><a class='btn btn-success'
														href='alteraLembrete.php?id=$id''
														title='Alterar Lembrete'><i class='fa fa-refresh'></i></a><i
														class='fa fa-arrows-h'></i><a class='btn btn-danger'
														href='jqueryModal.php?numero=2&id=$id'
														title='Excluir Lembrete'><i class='fa fa-trash'></i></a></td>";	
														echo "</tr>";
													}
												}else{
														echo "<tr>";
														echo "<td>-----</td>";	
														echo "<td>-----</td>";	
														echo "<td>-----</td>";	

														echo "<td>-----</td>";	
														echo "</tr>";
												}
											}
										}
									?>	
								</tbody>	
							</table>	
						</div>
					</div>	
			</div>
			<script src="js/jquery.min.js" type="text/javascript"></script>
	        <script src="js/bootstrap.js"></script>
			<script src="js/jquery.js" type="text/javascript"></script>
			<script src="js/jquery.maskedinput.js" type="text/javascript"></script>		
			</body>
		</html>			
		
	<?php 
	}
	else{
		echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=index.php'>";
	}
?>