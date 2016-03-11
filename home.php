<?php
	require_once "conexaoBanco.php";
	
	if(!$usuario->usuarioLogado()){
		$usuario->redirecionar("index.php");
	}
	
	$dados = $usuario->buscarUsuarioPorId($_SESSION["idUsuario"]);
	
	if(isset($_POST["btnLogout"])){
		if($usuario->logout()){
			$usuario->redirecionar("index.php");
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
				<h2>Olá <?php echo $dados["nome"]; ?></h2>
			</div><!-- Fim do header de contato-->
			
			<!-- Linha -->
			<div class="row">
				<!-- Coluna -->
				<div class="col-lg-6">
					<div class="panel panel-default text-center">
						<div class="panel-body">
							<a href="#" class="btn btn-info">Reservas</a>
							<p>
								Faça uma reserva ou veja uma reserva já existente.
							</p>
						</div>
					</div>
				</div><!-- Fim da coluna-->
				<!-- Coluna -->
				<div class="col-lg-6">
					<div class="panel panel-default text-center">
						<div class="panel-body">
							<a href="#" class="btn btn-info">Ver Refeições</a>
							<p>
								Veja as refeições que o estabelecimento oferece.
							</p>
						</div>
					</div>
				</div><!-- Fim da coluna-->
				<!-- Coluna -->
				<div class="col-lg-6">
					<div class="panel panel-default text-center">
						<div class="panel-body">
							<a href="#" class="btn btn-info">Ver Promoções</a>
							<p>
								Veja as promoções do dia.
							</p>
						</div>
					</div>
				</div><!-- Fim da coluna-->
				<!-- Coluna -->
				<div class="col-lg-6">
					<div class="panel panel-default text-center">
						<div class="panel-body">
							<a href="cadastroCliente.php" class="btn btn-info">Cadastro</a>
							<p>
								Edite seu cadastro.
							</p>
						</div>
					</div>
				</div><!-- Fim da coluna-->
				<!-- Coluna -->
				<div class="col-lg-6">
					<div class="panel panel-default text-center">
						<div class="panel-body">
							<form action="home.php" method="post" class="form-horizontal">
								<button type="submit" name="btnLogout" class="btn btn-info">Logout</button>
								<p>
									Sair do sistema
								</p>
							</form>
						</div>
					</div>
				</div><!-- Fim da coluna-->
			</div><!-- fim da linha-->
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
