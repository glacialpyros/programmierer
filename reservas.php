<?php
	require_once "conexaoBanco.php";
	
	if(!$usuario->usuarioLogado()){
		$usuario->redirecionar("index.php");
	}
	
	$retorno = $reserva->buscarReservasPorUsuario($_SESSION["idUsuario"]);
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
				<?php
					if($retorno != null){
						while($linha = $retorno->fetch(PDO::FETCH_ASSOC)) {
				?>
					<!-- Coluna -->
				<div class="col-lg-6">
					<div class="panel panel-default text-center">
						<div class="panel-body">
							<p>
								<span>Refeição: <?php if($linha["idRefeicao"] == 1){ echo "Café da Manhã";} elseif($linha["idRefeicao"] == 2){ echo "Almoço";} else {echo "Jantar";}?></span><span> Data: <?php echo $linha["data"];?></span><span> Quantidade de lugares: <?php echo $linha["quantidadePessoas"];?></span><span> Descrição: <?php echo ((empty($linha["descricao"]))?  "Sem descrição" : $linha["descricao"]);?></span>
							</p>
						</div>
					</div>
				</div><!-- Fim da coluna-->
					<?php 
						} 
					} ?>
					<!-- Coluna -->
					<div class="col-lg-6">
					<div class="panel panel-default text-center">
						<div class="panel-body">
							<a href="cadastroReserva.php" class="btn btn-info">Cadastrar</a>
						</div>
					</div>
				</div><!-- Fim da coluna-->
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
	
</body>
</html>
