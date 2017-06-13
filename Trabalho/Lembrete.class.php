<?php
	// include 'ConexaoBD.class.php';	

	class Lembrete{
		public $id;
		public $chave;
		public $data;
		public $descricao;
		public $observacao;

		function inserir(){
			$bd = new ConexaoBD;
			$sql = "INSERT INTO LEMBRETE(chave, data, descricao, observacao) VALUES('$this->chave', 
			'$this->data', '$this->descricao', '$this->observacao')";
			$bd->conectar();
			$bd->query($sql);
			$bd->fechar();
		}

		function mostrar(){
			$bd = new ConexaoBD;
			$sql = "SELECT * FROM LEMBRETE WHERE chave='$this->chave'";
			$bd->conectar();
			return $bd->query($sql);
			$bd->fechar();
		}

		function mostrarLembrete(){
			$bd = new ConexaoBD;
			$sql = "SELECT * FROM LEMBRETE WHERE id='$this->id'";
			$bd->conectar();
			return $bd->query($sql);
			$bd->fechar();
		}

		function pesquisarLembrete($pesquisa){
			$bd = new ConexaoBD;
			$sql = "SELECT * FROM LEMBRETE WHERE chave='$this->chave' and data LIKE '%$pesquisa%' or descricao LIKE'%$pesquisa%' or observacao LIKE '%$pesquisa%'";
			// $sql = "SELECT * FROM LEMBRETE WHERE chave='$this->chave' and descricao='$pesquisa'";
			$bd->conectar();
			return $bd->query($sql);
			$bd->fechar();
		}

		function excluir(){
			$bd = new ConexaoBD;
			$sql = "DELETE FROM LEMBRETE WHERE id='$this->id'";
			$bd->conectar();
			$bd->query($sql);
			$bd->fechar();
		}

		function atualizar(){
			$bd = new ConexaoBD;
			$sql = "UPDATE LEMBRETE SET data='$this->data', descricao='$this->descricao', observacao='$this->observacao' WHERE id='$this->id'";
			$bd->conectar();
			$bd->query($sql);
			$bd->fechar();
		}
	}
?>