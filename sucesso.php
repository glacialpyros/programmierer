<?php
	$id = $_GET["id"];
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
				<h2>Sucesso</h2>
			</div><!-- Fim do header de contato-->
			
			<!-- Linha -->
			<div class="row">
				<div class="col-lg-8">
					<?php
						if($id == 1){
					?>
						<label for="sucesso" class="col-lg-2 control-label ">Usuário cadastrado com sucesso!</label>
						<hr>
						<a href="index.php" class="btn btn-info">Continuar</a>
					<?php
						}
					?>
				</div>
			</div><!-- Fim da linha -->
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
