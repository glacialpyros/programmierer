<?php
	class RESERVA{
		
		private $bancoConexao;
		
		function __construct($conexao){
			$this->bancoConexao = $conexao;
		}

		
		public function buscarReservasPorUsuario($id){
			/*$smtm = $this->bancoConexao->prepare("SELECT * FROM reservas WHERE idUsuario = :idUsuario AND data >= :data");
			$smtm->execute(array(":idUsuario"=>$id,":data"=>date("Y/m/d  H:i:s")));*/
			$smtm = $this->bancoConexao->prepare("SELECT * FROM reservas WHERE idUsuario = :idUsuario");
			$smtm->execute(array(":idUsuario"=>$id));
			if($smtm->rowCount() > 0){
				return $smtm;
			} else {
				return null;
			}
		}
		
		public function cadastrarReserva($data, $quantidadePessoas, $descricao,$idUsuario, $idRefeicao){
			try{
				$smtm = $this->bancoConexao->prepare("INSERT INTO reservas(data, quantidadePessoas, descricao, idUsuario, idRefeicao) VALUES(:data, :quantidadePessoas, :descricao, :idUsuario, :idRefeicao)");
				$smtm->execute(array(":data"=>$data,":quantidadePessoas"=>$quantidadePessoas,":descricao"=>$descricao,":idUsuario"=>$idUsuario,":idRefeicao"=>$idRefeicao));
				return $smtm;
			} catch(Exception $e){
				echo $e->getMessage();
			}
		}
	}
	
	
	
?>