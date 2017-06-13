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
					include 'Usuario.class.php';
					include 'Lembrete.class.php';	

					$operacao = $_POST["operacao"];
					
					if($operacao == "login"){
						$nome = $_POST["nome"];
						$nome = strtoupper($nome);

						$senha = $_POST["senha"];
						$senha = strtoupper($senha);

						$nomeBanco = "null";
						$senhaBanco = "null";
						$idBanco = "null";

						$usuario = new Usuario;
						$usuario->nome = $nome;

						$resultado = $usuario->buscarUsuario();

						while($linha=mysqli_fetch_assoc($resultado)){
							$nomeBanco = $linha['nome'];
							$senhaBanco = $linha['senha'];
							$idBanco = $linha['id'];
						}
						if($nome==$nomeBanco){
							if($senha==$senhaBanco){
								session_start();
								$_SESSION['nome'] = $nomeBanco;
								$_SESSION['senha'] = $senhaBanco;
								$_SESSION['id'] = $idBanco;
								echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=lembretes.php'>";
							}
							else{
								session_start();
								$_SESSION['mensagem']='Senha Incorreta!';
								$_SESSION['local']='index.php';

								echo "<meta http-equiv='refresh' content='0;url=jqueryModal.php?numero=1'>";
							}
						}
						else{ 	
								session_start();
								$_SESSION['mensagem']='Usuário Incorreto!';
								$_SESSION['local']='index.php';

								echo "<meta http-equiv='refresh' content='0;url=jqueryModal.php?numero=1'>";
						}

						// echo 'Nome: ', $nome, ', Senha: ', $senha;
					}
					elseif($operacao == "cadastrarLembrete"){
						session_start();

						$data = $_POST["data"];
						$descricao = $_POST["descricao"];
						$observacao = $_POST["observacao"];

						if (isset($_SESSION['nome']) and isset($_SESSION['senha'])){		
							$lembrete = new Lembrete;

							$lembrete->data = $data;
							$lembrete->descricao = $descricao;
							$lembrete->observacao = $observacao;
							$lembrete->chave = $_SESSION["id"];

							$lembrete->inserir();

							$_SESSION['mensagem']='Lembrete cadastrado com Sucesso!';
							$_SESSION['local']='lembretes.php';

							echo "<meta http-equiv='refresh' content='0;url=jqueryModal.php?numero=1'>";
						}else{
							echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=lembretes.php'>";
						}
						// echo 'Data: ', $data, ', Descrição: ', $descricao, ', Observação: ', $observacao;
					}
					elseif($operacao == "alterarLembrete"){
						session_start();

						$id = $_POST["id"];

						$data = $_POST["data"];
						$descricao = $_POST["descricao"];
						$observacao = $_POST["observacao"];

						if (isset($_SESSION['nome']) and isset($_SESSION['senha'])){		
							$lembrete = new Lembrete;

							$lembrete->data = $data;
							$lembrete->descricao = $descricao;
							$lembrete->observacao = $observacao;
							$lembrete->id = $id;

							$lembrete->atualizar();

							$_SESSION['mensagem']='Lembrete alterado com sucesso!';
							$_SESSION['local']='lembretes.php';
							
							echo "<meta http-equiv='refresh' content='0;url=jqueryModal.php?numero=1'>";
						}else{
							echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=lembretes.php'>";
						}
						// echo 'Data: ', $data, ', Descrição: ', $descricao, ', Observação: ', $observacao;
					}
					else{
						echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=index.php'>";
					}
				?>
			</div>
		</div>
		<script src="js/jquery.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.js"></script>
		<script src="js/jquery.js" type="text/javascript"></script>
		<script src="js/jquery.maskedinput.js" type="text/javascript"></script>		
	</body>
</html>	