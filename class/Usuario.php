<?php
	
	class Usuario{

		private $id;
		private $nome;
		private $senha;

		public function getId(){
			return $this->id;
		}

		public function setId($value){

			$this->id = $value;
		}

		public function getNome(){
			return $this->nome;
		}

		public function setNome($value){
			$this->nome = $value;
		}

		public function getSenha(){
			return $this->senha;
		}

		public function setSenha($value){
			$this->senha = $value;
		}

		public function loadByID($id){

			$sql = new Sql();

			$results = $sql->select("SELECT * FROM teste WHERE id = :ID", array(":ID"=>$id));

			if(count($results) > 0){
				
				$row = $results[0];

				$this->setId($row['id']);
				$this->setNome($row['nome']);
				$this->setSenha($row['senha']);

			}
		}

		public function __toString(){

			return json_encode(array(
			"id"=>$this->getId(),
			"nome"=>$this->getNome(),
			"senha"=>$this->getSenha()
			));
		}
	}

?>