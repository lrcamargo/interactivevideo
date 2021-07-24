<?php
	include('conexao.php');

	$idVideo = $_GET['id'];

	try {
		$buscaVideo = $conn->prepare('SELECT * FROM video WHERE idVideo = ?');
		$buscaVideo->bindValue(1,$idVideo);

		$buscaVideo->execute();
		while($busca = $buscaVideo->fetch(PDO::FETCH_ASSOC)) {
			$src = $busca['localArquivo'];
			$titulo = $busca['identificacao'];
			$desc = $busca['descricao'];
		}
	} catch (PDOException $e) {
		echo "Erro: " . $e;
	}


?>
<!DOCTYPE html>
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
		<div class="row videoArea">
			<video id="video1" controls autoplay muted>
				<source src="<?php echo $src; ?>" type="video/mp4">
				Seu navegador não suporta o vídeo.
			</video>
		</div>
		<div class="row descArea">
			<h5><?php echo $titulo;?></h5>
			<p><?php echo $desc; ?></p>

			<span>Tempo atual: </span><div class="current">0:00</div>
			<span>Tempo total: </span><div class="duration">0:00</div>
		</div>
		</div> <!--container end-->
	<?php
		$i = 0;
		$c = 0;
		try {
			$buscaP = $conn->prepare("SELECT * FROM perguntas WHERE idVideo = ?");
			$buscaP->bindValue(1,$idVideo);

			$buscaP->execute();

			while($perguntas = $buscaP->fetch(PDO::FETCH_ASSOC)) {
				$c = $c+1;
				echo "<div class='lightbox question q".$i."' id='".$perguntas['tempo']."'>";
					echo "<h4>Questão 0".$c."</h4>";
					echo "<p>".$perguntas['pergunta']."</p>";
					echo "<br/>";
					if($perguntas['correta']=='A') {
						echo "<a href='#' class = 'button longBtns goodChoice'>".$perguntas['opcaoA']."</a>";
					} else {
						echo "<a href='#' class = 'button longBtns badChoice'>".$perguntas['opcaoA']."</a>";
					}
					if($perguntas['correta']=='B') {
						echo "<a href='#' class = 'button longBtns goodChoice'>".$perguntas['opcaoB']."</a>";
					} else {
						echo "<a href='#' class = 'button longBtns badChoice'>".$perguntas['opcaoB']."</a>";
					}
					if($perguntas['correta']=='C') {
						echo "<a href='#' class = 'button longBtns goodChoice'>".$perguntas['opcaoC']."</a>";
					} else {
						echo "<a href='#' class = 'button longBtns badChoice'>".$perguntas['opcaoC']."</a>";
					}
					if($perguntas['correta']=='D') {
						echo "<a href='#' class = 'button longBtns goodChoice'>".$perguntas['opcaoD']."</a>";
					} else {
						echo "<a href='#' class = 'button longBtns badChoice'>".$perguntas['opcaoD']."</a>";
					}
				echo "</div>";
				$i = $i+1;
			}
		} catch(PDOException $e) {
			echo "Erro: " . $e;
		}
	?>
	</div>
</body>
</html>

