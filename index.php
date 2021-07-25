<!DOCTYPE html>
<?php
	include('conexao.php');
?>
<html>
<head>
	<title>Interactive Video</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<!-- jQuery -->
	<script src="js/jquery-1.12.3.min.js"></script>

	<!-- Skeleton CSS & Featherlight -->
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/skeleton.css">
	<link rel="stylesheet" href="css/featherlight.css">
	<script src="js/featherlight.js"></script>

	<!-- Interaction CSS -->
	<link rel="stylesheet" href="css/interaction.css">

	<!-- Interaction js -->
	<script src="js/interaction.js"></script>

	<!-- GreenSock -->
	<script src="js/TweenMax.min.js"></script>

</head>
<body>
	<div class="container"> <!--container start-->
		<div class="row"></div>
		<p><h4 style="text-align: center">Vídeos Interativos</h4></p>
		<br/>
		<h5>Faça login:</h5>
		<br/>
		<form action="login.php" method="post">
			Usuário: <input type="text" name="username">
			Senha: <input type="password" name="senha">
			<input type="submit" value="Login" class="button button-primary">
		</form>
		<br/>
		<h5> Ou cadastre-se</h5>
		<br/>
		<form action="register.php" method="post">
			E-mail: <input type="text" name="email">
			Usuário: <input type="text" name="username">
			Senha: <input type="password" name="senha">
			<input type="submit" value="Registrar" class="button button-primary">
		</form>
		</div>
		
	</div> <!--container end-->
	
</body>
</html>

