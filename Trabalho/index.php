<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">

		<link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
		<link rel="icon" type="image/png" href="icone/notas.png" />
	    <title>Página Inicial - Entre no Sistema</title>
	</head>
	<body>
		<div class="row">
			<div class="col-md-6 col-md-offset-3"> 
				<h1 class="page-header text-center">ADD Lembretes <i class="glyphicon glyphicon-list-alt"></i></h1>
				<p class="text-center" style="font-size: 20px">Possui provas a fazer, trabalhos a entregar, algum evento a comparecer? Adicione seus lembretes aqui!</p>
				<br>
				<h2 class="page-header text-center">Entre no Sistema:</h2>
				<form role="form" method="POST" action="controla.php">
					<input type="hidden" name="operacao" value="login"/>
					<div class="form-group">
						<label for="nome">Nome</label>
						<input type="text" class="form-control" name="nome" placeholder="Digite seu Nome" required>
					</div>
					<div class="form-group">
						<label for="senha">Senha</label>
						<input type="password" class="form-control" name="senha" placeholder="Digite sua Senha" required>
					</div>
					<div style="text-align: center;"><button type="submit" class="btn btn-default" value="Entrar">Entrar</button></div>
				</form>	
			</div>
		</div>
		<script src="js/jquery.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.js"></script>
		<script src="js/jquery.js" type="text/javascript"></script>
		<script src="js/jquery.maskedinput.js" type="text/javascript"></script>		
	</body>
</html>	