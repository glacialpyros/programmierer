<?php
	class USUARIO{
		
		private $bancoConexao;
		
		function __construct($conexao){
			$this->bancoConexao = $conexao;
		}
		
		public function buscarUsuarioPorEmail($email){
			try{
				$smtm = $this->bancoConexao->prepare("SELECT * FROM usuarios WHERE email = :email");
				$smtm->execute(array(":email"=>$email));
				
				if($smtm->rowCount() > 0){
					return true;
				} else {
					return false;
				}
			} catch(Exception $e){
				echo $e->getMessage();
			}
		}
		
		public function buscarUsuarioPorId($id){
			$smtm = $this->bancoConexao->prepare("SELECT * FROM usuarios WHERE id = :id");
			$smtm->execute(array(":id"=>$id));
			$retorno = $smtm->fetch(PDO::FETCH_ASSOC);
			return $retorno;
		}
		
		public function registrarUsuario($nome, $email, $senha){
			try{
				$smtm = $this->bancoConexao->prepare("INSERT INTO usuarios(nome,email,senha) VALUES(:nome, :email, :senha)");
				$smtm->execute(array(":nome"=>$nome,":email"=>$email,":senha"=>$senha));
				print_r($smtm);
				exit();
				return $smtm;
			} catch(Exception $e){
				echo $e->getMessage();
			}
		}
		
		public function login($email, $senha){
			try{
				$smtm = $this->bancoConexao->prepare("SELECT * FROM usuarios WHERE email = :email AND senha = :senha");
				$smtm->execute(array(":email"=>$email,":senha"=>$senha));
				$retorno = $smtm->fetch(PDO::FETCH_ASSOC);
				if($smtm->rowCount() > 0){
					$_SESSION["idUsuario"] = $retorno["id"];
					return true;
				} else {
					return false;
				}
			} catch(Exception $e){
				$e->getMessage();
			}
		}
		
		public function usuarioLogado(){
			if(isset($_SESSION["idUsuario"])){
				return true;
			}
		}
		
		public function redirecionar($url){
			header("Location: {$url}");
		}
		
		public function logout(){
			session_destroy();
			unset($_SESSION["idUsuario"]);
			return true;
		}
	}
	
	
	
?>