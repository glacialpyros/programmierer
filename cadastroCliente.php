<?php
	require_once "conexaoBanco.php";
	
	if($usuario->usuarioLogado()){
		$usuario->redirecionar("home.php");
	}
	
	if(isset($_POST["btnCadastrar"])){
		$nome = $_POST["nome"];
		$email = $_POST["email"];
		$senha = $_POST["senha"];
		
		try{
			if($usuario->buscarUsuarioPorEmail($email)){
				$erro = "erro";
			} else {
				if($usuario->registrarUsuario($nome, $email, $senha)){
					$usuario->redirecionar("sucesso.php?id=1");
				}
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
					<form action="cadastroCliente.php" method="post" class="form-horizontal">
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
							<label for="nome" class="col-lg-2 control-label ">Nome:</label>
							<div class="col-lg-10">
								<input type="text" class="form-control" name="nome" id="nome" placeholder="Digite seu nome" required focus>
							</div>
						</div><!-- Fim do grupo de formulario-->
						<!-- Grupo de formulario-->
						<div class="form-group">
							<label for="email" class="col-lg-2 control-label ">Email:</label>
							<div class="col-lg-10">
								<input type="email" class="form-control" name="email" id="email" placeholder="Digite seu email" required>
							</div>
						</div><!-- Fim do grupo de formulario-->
						<!-- Grupo de formulario-->
						<div class="form-group">
							<label for="senha" class="col-lg-2 control-label ">Senha:</label>
							<div class="col-lg-10">
								<input type="password" class="form-control" name="senha" id="senha" placeholder="Digite sua senha" required>
							</div>
						</div><!-- Fim do grupo de formulario-->
						<div class="form-group">
							<div class="col-lg-8 col-lg-offset-2">
								<button type="submit" name="btnCadastrar" class="btn btn-info">Cadastrar</button>
								<a href="index.php" class="btn btn-info">Voltar</a>
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
	
</body>
</html>
