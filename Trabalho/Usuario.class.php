<?php
	include 'ConexaoBD.class.php';

	class Usuario{
		public $id;	
		public $nome;
		public $senha;

		function buscarUsuario(){
			$bd = new ConexaoBD;
			$bd->conectar();
			$query = "SELECT id, nome, senha FROM Usuario WHERE nome='$this->nome'";
			return $bd->query($query);
			$bd->fechar();
		}
	}
?>