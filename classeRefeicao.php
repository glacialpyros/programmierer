<?php
	class REFEICAO{
		
		private $bancoConexao;
		
		function __construct($conexao){
			$this->bancoConexao = $conexao;
		}

		
		public function buscarRefeicoes(){
			$smtm = $this->bancoConexao->prepare("SELECT * FROM refeicoes");
			$smtm->execute();
			
			if($smtm->rowCount() > 0){
				return $smtm;
			} else {
				return null;
			}
		}
	}
	
	
	
?>