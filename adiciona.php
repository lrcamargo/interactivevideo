<!DOCTYPE html>
<?php
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
        <link rel="stylesheet" href="css/interaction.css">
        <script src="js/featherlight.js"></script>

    </head>
    <body>
        <div class="container">
            <h4 style="text-align: center;">Adicionar novo vídeo</h4>
            <br/>
            <span>Tamanho máximo: 8MB</span>
            <br/><br/><br/>
            <form action="adicionar.php" method="post" enctype="multipart/form-data">
                Título do vídeo:
                <br/>
                <input type="text" name="identificacao">
                <br/>
                Descrição do vídeo:
                <br/>
                <textarea name="descricao"></textarea>
                <br/>
                Arquivo:
                <br/>
                <input type="file" name="video">
                <input type="hidden" value=<?php echo $id;?> name="id">
                <br/>
                <input type="submit" value="Enviar arquivo" class='button button-primary'/>
            </form>
        </div>
    </body>
</html>