<?php
	
	require_once("config.php");
/*
	$sql = new Sql();

	$usuario = $sql->select("SELECT * FROM teste");

	echo json_encode($usuario);*/

	//Carrega somente um usuário
	/*$root = new Usuario();

	$root->loadByID(3);

	echo $root;*/

	//Carrega uma lista de Usuários
/*
	$lista = Usuario::getList();
	echo json_encode($lista);*/

	//Carrega uma lista de usuários buscando pelo nome;
/*
	$search = Usuario::search("us");
	echo json_encode($search);
*/

	//Carrega um usúario usando o login e a senha
	/*$usuario = new Usuario();
	$usuario->login("user","12345");
	echo $usuario;*/

	//Cadastrando um novo usuário
	/*$aluno = new Usuario("Ejail", "12345");

	$aluno->insert();

	echo $aluno;*/

	//Alterar Usuário
	/*$usuario = new Usuario();

	$usuario->loadByID(7);

	$usuario->update("Ejail Rodrigues", "123456");

	echo $usuario;*/

	//Deletar usuário

	$usuario = new Usuario();

	$usuario->loadByID(3);
	$usuario->delete();

	echo $usuario;

?>