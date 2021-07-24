<?php
    include("conexao.php");

    $pergunta = $_POST['pergunta'];
    $altA = $_POST['opcaoA'];
    $altB = $_POST['opcaoB'];
    $altC = $_POST['opcaoC'];
    $altD = $_POST['opcaoD'];
    $correta = $_POST['correta'];
    $tempo = $_POST['tempo'];
    $video = $_POST['video'];


    try {
        $insereP = $conn->prepare("INSERT INTO perguntas (pergunta,opcaoA,opcaoB,opcaoC,opcaoD,correta,tempo,idVideo) VALUES (?,?,?,?,?,?,?,?)");
        $insereP->bindValue(1,$pergunta);
        $insereP->bindValue(2,$altA);
        $insereP->bindValue(3,$altB);
        $insereP->bindValue(4,$altC);
        $insereP->bindValue(5,$altD);
        $insereP->bindValue(6,$correta);
        $insereP->bindValue(7,$tempo);
        $insereP->bindValue(8,$video);

        $insereP->execute();

        if($insereP->rowCount() > 0) {
            //echo "Cadastrado";
            header('Location: index.php');
        } else {
            echo "Erro";
        }
    } catch(PDOException $e) {
        echo "Erro: " . $e;
    }
?>