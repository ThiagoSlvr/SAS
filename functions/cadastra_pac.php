<?php

    session_start();

    function cadastra($conn){

        $sql = "INSERT INTO pac (name, password, address, email, phone, gender, age, cpf, accounttype) VALUES
        (:n, :pw, :ad, :e, :p, :g, :a, :c, 'pac');";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':n', $_POST['name']);
        $stmt->bindParam(':pw', $_POST['password']);
        $stmt->bindParam(':ad', $_POST['address']);
        $stmt->bindParam(':e', $_POST['email']);
        $stmt->bindParam(':p', $_POST['phone']);
        $stmt->bindParam(':g', $_POST['gender']);
        $stmt->bindParam(':a', $_POST['age']);
        $stmt->bindParam(':c', $_POST['cpf']);

        $stmt->execute();
        return;
    };

    $server = "localhost";
    $db = "sas";
    $user = "root";
    $pass = "";
    
    $conn = new PDO("mysql:host=$server;dbname=$db", $user, $pass);
    $sql = "SELECT COUNT(*) FROM pac";
    $result = $conn->query($sql);
    $row = $result->fetchAll();
    $quant_init = $row[0]['0'];

    cadastra($conn);

    $result = $conn->query($sql);
    $row = $result->fetchAll();    
    $quant_fim = $row[0]['0'];

    if ($quant_init == $quant_fim){
        $_SESSION['pac'] = False;
    }
    else{
        $_SESSION['pac'] = True;
    };
    
    header('location: ../views/cadastro_pac.php');
?>