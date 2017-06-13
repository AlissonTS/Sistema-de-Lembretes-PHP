<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">

		<link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
		<link rel="icon" type="image/png" href="icone/notas.png" />
	    <title>Controlador</title>
	</head>
	<body>
		<div class="row">
			<div class="col-md-6 col-md-offset-3"> 
				<?php
					include 'ConexaoBD.class.php';
					include 'Lembrete.class.php';

					session_start();	

					if (isset($_SESSION['nome']) and isset($_SESSION['senha'])){		
						$id = $_GET["id"];

						$lembrete = new Lembrete();
						$lembrete->id = $id;

						$lembrete->excluir();
					}

					echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=lembretes.php'>";
				?>
			</div>
		</div>
		<script src="js/jquery.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.js"></script>
		<script src="js/jquery.js" type="text/javascript"></script>
		<script src="js/jquery.maskedinput.js" type="text/javascript"></script>		
	</body>
</html>	