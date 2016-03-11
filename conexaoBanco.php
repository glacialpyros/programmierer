<?php
	session_start();
	
	error_reporting(E_ALL);
	ini_set('display_errors',1);
	ini_set('html_errors', 1);
	
	session_start();
	
	define("HOST", getenv('OPENSHIFT_MYSQL_DB_HOST'));
	//define("PORTA", getenv('OPENSHIFT_MYSQL_DB_PORT'));
	define("USUARIO", getenv('OPENSHIFT_MYSQL_DB_USERNAME'));
	define("SENHA", getenv('OPENSHIFT_MYSQL_DB_PASSWORD'));
	define("BANCO", getenv('OPENSHIFT_GEAR_NAME'));
	
	echo "HOST: ".HOST." USUARIO: ".USUARIO." SENHA: ".SENHA." BANCO".BANCO;
	
	echo "<br>";
	
	try{
		$conexao = new PDO("mysql:host=".HOST.";dbname=".BANCO, USUARIO, SENHA);
		$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
	} catch(Exception $e){
		echo $e->getMessage();
	}
	
	/*
	define("HOST","localhost");
	define("USUARIO","root");
	define("SENHA","");
	define("BANCO","programmierer");
	
	try{
		$conexao = new PDO("mysql:host=".HOST.";dbname=".BANCO, USUARIO, SENHA);
		$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
	} catch(Exception $e){
		echo $e->getMessage();
	}*/
	
	include_once 'classeUsuario.php';
	
	$usuario = new USUARIO($conexao);
?>