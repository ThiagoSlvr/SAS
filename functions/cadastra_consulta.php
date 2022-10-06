<?php
    session_start();

    function cadastra($conn){
        $date = str_replace("/", "-", $_POST['date']);
        $sql = "INSERT INTO consultas (date, idmed, med, idpac, pac, receita, obs) VALUES
        (:d, :im, :m, :ip, :p, :r, :o);";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':d', $date);
        $stmt->bindParam(':im', $_SESSION['id']);
        $stmt->bindParam(':m', $_POST['med']);
        $stmt->bindParam(':ip', $_POST['email_pac']);
        $stmt->bindParam(':p', $_POST['pac']);
        $stmt->bindParam(':r', $_POST['receita']);
        $stmt->bindParam(':o', $_POST['obs']);

        $stmt->execute();
        return;
    };

    $server = "localhost";
    $db = "sas";
    $user = "root";
    $pass = "";
    
    $conn = new PDO("mysql:host=$server;dbname=$db", $user, $pass);
    $sql = "SELECT COUNT(*) FROM consultas";
    $result = $conn->query($sql);
    $row = $result->fetchAll();
    $quant_init = $row[0]['0'];

    cadastra($conn);

    $result = $conn->query($sql);
    $row = $result->fetchAll();    
    $quant_fim = $row[0]['0'];

    if ($quant_init == $quant_fim){
        $_SESSION['cadastro'] = False;
    }
    else{
        $_SESSION['cadastro'] = True;
    };

    header('location: ../views/cadastro_consulta.php');
?>