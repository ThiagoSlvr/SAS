<?php
    session_start();

    function cadastra($conn){
        $date = str_replace("/", "-", $_POST['data']);
        $sql = "INSERT INTO exames (data, idlab, lab, idpac, pac, type, result) VALUES
        (:d, :il, :l, :ip, :p, :t, :r);";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':d', $date);
        $stmt->bindParam(':il', $_SESSION['id']);
        $stmt->bindParam(':l', $_POST['lab']);
        $stmt->bindParam(':ip', $_POST['email_pac']);
        $stmt->bindParam(':p', $_POST['pac']);
        $stmt->bindParam(':t', $_POST['type']);
        $stmt->bindParam(':r', $_POST['result']);

        $stmt->execute();
        return;
    };

    $server = "localhost";
    $db = "sas";
    $user = "root";
    $pass = "";

    $conn = new PDO("mysql:host=$server;dbname=$db", $user, $pass);
    $sql = "SELECT COUNT(*) FROM exames";
    
    $result = $conn->query($sql);
    $row = $result->fetchAll();
    $quant_init = $row[0]['0'];
    cadastra($conn);

    $result = $conn->query($sql);
    $row = $result->fetchAll();    
    $quant_fim = $row[0]['0'];

    if ($quant_init == $quant_fim){
        $_SESSION['exames'] = False;
    }
    else{
        $_SESSION['exames'] = True;
    };

    header('location: ../views/cadastro_exam.php');
?>