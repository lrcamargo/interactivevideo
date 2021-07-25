<?php

    $username = 'user';
    $password = 'pass';

    try {
    $conn = new PDO('mysql:host=localhost;dbname=u326021433_intVideo;28880', $username, $password, array(
        PDO::ATTR_TIMEOUT => 1000, // in seconds
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ));
        //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //$conn->setAttribute(PDO::ATTR_TIMEOUT, 100);
    } catch(PDOException $e) {
        echo 'Erro: ' . $e->getMessage();
    }
?>