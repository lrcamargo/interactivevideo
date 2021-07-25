<!DOCTYPE html>
<?php
	include('conexao.php');

	session_start();
    
    if((!isset ($_SESSION['user']) == true)) {
        unset($_SESSION['user']);
        unset($_SESSION['id']);
        header('location:index.php');    
    }
    
    $logado = $_SESSION['user'];
	$id = $_SESSION['id'];
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
		<h5>Escolha o vídeo que deseja assistir:</h5>
		<br/>
		<ul>
			<?php
				try {
					$buscaVideos = $conn->prepare("SELECT * FROM video WHERE autor = ?");
					$buscaVideos->bindValue(1,$id);

					$buscaVideos->execute();

					while($row = $buscaVideos->fetch(PDO::FETCH_ASSOC)) {
						echo "<li><a href='videos.php?id=".$row['idVideo']."' class='button'>".$row['identificacao']."</a>    <a href='perguntas.php?video=".$row['idVideo']."' class='button button-primary btnAdd'>+ Adicionar perguntas </a></li>";
					}
				} catch (PDOException $e) {
					echo "Erro: " . $e;
				}
			?>
		</ul>
		<br/>
		<h5> Ou adicione um novo vídeo:	</h5>
		<br/>
		<a href="adiciona.php" class='button button-primary'>Adicionar</a>
		<br/>
		<h5> Ou crie uma atividade com múltiplos vídeos:	</h5>
		<br/>
		<a href="#" class='button button-primary'>Criar</a>
		</div>
		
	</div> <!--container end-->
	
</body>
</html>

