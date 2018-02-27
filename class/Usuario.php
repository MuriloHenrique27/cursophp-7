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

				$this->setData($results[0]);

			}
		}

		public static function getList(){

			$sql = new Sql();

			return $sql->select("SELECT * FROM teste ORDER BY nome");
		}

		public static function search($nome){

			$sql = new Sql();

			return $sql->select("SELECT * FROM teste WHERE nome LIKE :SEARCH ORDER BY nome", array(':SEARCH'=>"%".$nome."%"));
		}

		public function login($login, $senha){

			$sql = new Sql();

			$results = $sql->select("SELECT * FROM teste WHERE senha = :PASSWORD AND nome = :LOGIN", array(":LOGIN"=>$login, ":PASSWORD"=>$senha));

			if(count($results) > 0){

				$this->setData($results[0]);

			}else{
				throw new Exception("Login ou Senha não conferem");
				
			}
		}

		public function setData($data){

			$this->setId($data['id']);
			$this->setNome($data['nome']);
			$this->setSenha($data['senha']);
		}

		public function insert(){
			$sql = new Sql();

			$results = $sql->select("CALL sp_teste_insert(:LOGIN, :PASSWORD)", array(":LOGIN"=>$this->getNome(), ":PASSWORD"=>$this->getSenha()));

			if (count($results) > 0 ) {
				
				$this->setData($results[0]);
			}
		}

		public function update($nome, $senha){

			$this->setNome($nome);
			$this->setSenha($senha);

			$sql = new Sql();

			$sql->query("UPDATE teste SET nome = :LOGIN, senha = :PASSWORD WHERE id = :ID", array(":LOGIN"=>$this->getNome(), ":PASSWORD"=>$this->getSenha(), ':ID'=>$this->getID()));
		}

		public function __construct($nome = "", $senha = ""){

			$this->setNome($nome);
			$this->setSenha($senha);
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