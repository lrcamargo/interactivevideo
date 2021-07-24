<?php
    include('conexao.php');

    $nome = $_POST['identificacao'];
    $descricao = $_POST['descricao'];

    $uploaddir = './media/';
    //$uploadfile = $uploaddir . basename($_FILES['video']['name']);
    $extensao = explode(".", $_FILES['video']['name']);
    $uploadfile = $uploaddir . $nome . "." . $extensao[1];

    if (move_uploaded_file($_FILES['video']['tmp_name'], $uploadfile)) {
        try {
            $videoUpload = $conn->prepare('INSERT INTO video(identificacao,localArquivo,descricao,autor) VALUES (?,?,?,?)');
            $videoUpload->bindValue(1,$nome);
            $videoUpload->bindValue(2,$uploadfile);
            //Mudar para usuário logado
            $videoUpload->bindValue(3,$descricao);
            $videoUpload->bindValue(4,"1");
               
            $videoUpload->execute();
        
            if($videoUpload->rowCount() > 0) {
                header('Location: index.php');
                //echo "Cadastrado";
                //echo "Arquivo válido e enviado com sucesso.\n";
            } else {
                echo "Erro";
            }
            
        } catch(PDOException $e) {
            echo 'Erro: ' . $e->getMessage();
                //Editar após testes:
                //header('Location: index.php?err='.$e->getMessage());
        }
    } else {
        echo "Possível ataque de upload de arquivo!\n";
    }


?>
