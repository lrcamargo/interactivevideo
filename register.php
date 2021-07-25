<?php
    include('conexao.php');
    
    $user = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['senha']; 

    try {
        $register = $conn->prepare("INSERT INTO usuarios (username, email, senha) VALUES (?,?,?)");
        $register->bindValue(1,$user);
        $register->bindValue(2,$email);
        $register->bindValue(3,$pass);

        $register->execute();

        if($register->rowCount() > 0) {
            echo "Cadastrado";
        } else {
            echo "Erro";
        }
    } catch(PDOException $e) {
        echo 'Erro: '. $e->getMessage();
    }
?>