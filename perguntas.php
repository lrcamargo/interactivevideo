<?php
    include('conexao.php');

    $video = $_GET['video'];
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
        <div class='container'>
            <h4 style="text-align: center;">Adicionar pergunta</h4>
            <br/>
            <form action="addPergunta.php" method="post" enctype="multipart/form-data">
                Pergunta:
                <input type="text" name="pergunta" class='u-full-width'>
                <br/>
                Alternativa A:
                <input type="text" name="opcaoA">
                <br/>
                Alternativa B:
                <input type="text" name="opcaoB">
                <br/>
                Alternativa C:
                <input type="text" name="opcaoC">
                <br/>
                Alternativa D:
                <input type="text" name="opcaoD">
                <br/>
                Qual a alternativa correta:
                <select name='correta'>
                    <option value='A'>Letra A</option>
                    <option value='B'>Letra B</option>
                    <option value='C'>Letra C</option>
                    <option value='D'>Letra D</option>
                </select>
                <br/>
                Tempo do vídeo que a pergunta deverá aparecer:
                <input type="text" name="tempo">
                <input type="hidden" name="video" value="<?php echo $video; ?>">
                <br/>
                <input type="submit" value="Adicionar pergunta" class='button button-primary'/>
            </form>
        </div>
    </body>
</html>