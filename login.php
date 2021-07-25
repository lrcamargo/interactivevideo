<?php
    include('conexao.php');

    header('Content-Type: text/html; charset=utf-8');

    session_start();

    $user = $_POST['username'];
    $senha = $_POST['senha'];

    try {
        $login = $conn->prepare("SELECT * FROM usuarios WHERE username = ? AND senha = ?");
        $login->bindValue(1,$user);
        $login->bindValue(2,$senha);

        $login->execute();

        if($login->rowCount() > 0) {
            $result = $login->fetch(PDO::FETCH_ASSOC);
            $_SESSION['user'] = $user;
            $_SESSION['id'] = $result['idUsuario'];
            header('Location: main.php');
        } else {
            echo "Usuário não cadastrado.";
        }
    } catch(PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
?>