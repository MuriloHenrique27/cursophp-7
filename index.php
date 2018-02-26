<?php
	
	require_once("config.php");

	$sql = new Sql();

	$usuario = $sql->select("SELECT * FROM teste");

	echo json_encode($usuario);

?>