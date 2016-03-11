<?php
	session_start();
	
	define("HOST","localhost");
	define("USUARIO","root");
	define("SENHA","");
	define("BANCO","programmierer");
	
	try{
		$conexao = new PDO("mysql:host=".HOST.";dbname=".BANCO, USUARIO, SENHA);
		$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
	} catch(Exception $e){
		echo $e->getMessage();
	}
	
	include_once 'classeUsuario.php';
	
	$usuario = new USUARIO($conexao);
?>