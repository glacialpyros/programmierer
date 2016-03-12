<?php
	require_once "conexaoBanco.php";
	
	if(!$usuario->usuarioLogado()){
		$usuario->redirecionar("index.php");
	}
	
	$retorno = $refeicao->buscarRefeicoes();
	
	if(isset($_POST["btnCadastrar"])){
		$data = $_POST["data"];
		$idRefeicao = $_POST["refeicao"];
		$quantidadePessoas = $_POST["quantidadePessoas"];
		$descricao = $_POST["descricao"];
		
		$arrayData = explode("/",$data);
		$data = $arrayData[2]."/".$arrayData[1]."/".$arrayData[0];
		
		if($idRefeicao == 1){
			$data .= " 10:00:00";
		} elseif ($idRefeicao == 2){
			$data .= " 15:00:00";
		} else {
			$data .= " 23:00:00";
		}
		
		try{
			if($reserva->cadastrarReserva($data, $quantidadePessoas, $descricao, $_SESSION["idUsuario"], $idRefeicao)){
				$usuario->redirecionar("sucesso.php?id=2");
			}
		} catch(Exception $e){
			echo $e->getMessage();
		}
	}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	
	<meta charset="utf-8">
	<title>Programmierer LTDA</title>
	<meta name="description" content="Programmierer LTDA">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
	<style>
		body{
			padding-top: 40px;
		}
	</style>
</head>


<body>
	
	<!-- Container de contato-->
	<div class="container">
		<section>
			<!-- Header de contato-->
			<div class="page-header" id="contato">
				<h2>Cadastrar</h2>
			</div><!-- Fim do header de contato-->
			<!-- Linha -->
			<div class="row">
				<div class="col-lg-8">
					<form action="cadastroReserva.php" method="post" class="form-horizontal">
						<?php
							if(isset($erro)){
						?>
							<!-- Grupo de formulario-->
						<div class="form-group">
							<label for="erro" class="col-lg-2 control-label ">Email já cadastrado!</label>
						</div><!-- Fim do grupo de formulario-->
						<?php
							}
						?>
						<!-- Grupo de formulario-->
						<div class="form-group">
							<label for="data" class="col-lg-2 control-label ">Data:</label>
							<div class="col-lg-10">
								<input class="form-control" name="data" id="data" placeholder="Escolha uma data" data-provide="datepicker" required focus>
							</div>
						</div><!-- Fim do grupo de formulario-->
						<!-- Grupo de formulario-->
						<div class="form-group">
							<label for="quantidadePessoas" class="col-lg-2 control-label ">Horário da refeição:</label>
							<div class="col-lg-10">
								<select name="refeicao">
									<?php 
										while($linha = $retorno->fetch(PDO::FETCH_ASSOC)) {
											echo "<option value='".$linha["id"]."'>".utf8_encode($linha["nome"])."</option>";
										}
									?>
								</select>
							</div>
						</div><!-- Fim do grupo de formulario-->
						<!-- Grupo de formulario-->
						<div class="form-group">
							<label for="quantidadePessoas" class="col-lg-2 control-label ">Quantidade de Pessoas:</label>
							<div class="col-lg-10">
								<input type="quantidadePessoas" class="form-control" name="quantidadePessoas" id="quantidadePessoas" placeholder="Digite a quantidade de pessoas" required>
							</div>
						</div><!-- Fim do grupo de formulario-->
						<!-- Grupo de formulario-->
						<div class="form-group">
							<label for="descricao" class="col-lg-2 control-label ">Descrição:</label>
							<div class="col-lg-10">
								<input type="text" class="form-control" name="descricao" id="descricao" placeholder="Digite uma descrição">
							</div>
						</div><!-- Fim do grupo de formulario-->
						<div class="form-group">
							<div class="col-lg-8 col-lg-offset-2">
								<button type="submit" name="btnCadastrar" class="btn btn-info">Cadastrar</button>
								<a href="reservas.php" class="btn btn-info">Voltar</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</section>
	</div><!-- Fim do container de contato-->
	
	<!-- Footer-->
	<footer>
		<hr>
		<!-- Container footer-->
		<div class="container text-center">
			<!-- Container inscrever-->
			<ul class="list-inline">
				<li><a href="" >Twitter</a></li>
				<li><a href="" >Facebook</a></li>
				<li><a href="" >Youtube</a></li>
			</ul>
			
			<p>&copy; Copyright @ Programmierer LTDA 2016</p>
		</div><!-- Fim do container footer-->
	</footer>
	
	<script src="js/jquery-1.12.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
		$(document).ready(function() {
			$('#data').datepicker({
				format: "dd/mm/yyyy"
			});
		});
	</script>
	
</body>
</html>
