<?php

    session_start();

    function cadastra($conn){
        
        $sql = "INSERT INTO med (name, password, address, email, phone, speciality, crm, accounttype) VALUES
        (:n, :p, :a, :e, :ph, :s, :c, 'med');";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':n', $_POST['name']);
        $stmt->bindParam(':p', $_POST['password']);
        $stmt->bindParam(':a', $_POST['address']);
        $stmt->bindParam(':e', $_POST['email']);
        $stmt->bindParam(':ph', $_POST['phone']);
        $stmt->bindParam(':s', $_POST['speciality']);
        $stmt->bindParam(':c', $_POST['crm']);

        $stmt->execute();
        return;
    };

    function atualiza($conn){

        $email = $_SESSION['id'];

        print_r ($_POST);

        $sql = "UPDATE med SET name= :n, password=:p, address=:a, email=:e, phone=:ph, speciality=:s, crm=:c WHERE email = '$email';";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':n', $_POST['Nome']);
        $stmt->bindParam(':p', $_POST['Senha']);
        $stmt->bindParam(':a', $_POST['Endereco']);
        $stmt->bindParam(':e', $_POST['Email']);
        $stmt->bindParam(':ph', $_POST['Telefone']);
        $stmt->bindParam(':s', $_POST['Especialidade']);
        $stmt->bindParam(':c', $_POST['CRM']);

        $stmt->execute();
        return;
    };

    $server = "localhost";
    $db = "sas";
    $user = "root";
    $pass = "";

    $conn = new PDO("mysql:host=$server;dbname=$db", $user, $pass);

    $email = $_SESSION['id'];
    $sql = "SELECT * FROM med WHERE email = '$email'";
    $result = $conn->query($sql);
    $row = $result->fetchAll();

    if (!empty($row)) {

        atualiza($conn);
        $_SESSION['id'] = $_POST['Email'];
        header('location: ../views/med_conta.php');
        exit;
        
    }

    $sql = "SELECT COUNT(*) FROM med";
    $result = $conn->query($sql);
    
    $quant_init = $row[0]['0'];

    cadastra($conn);
    
    $result = $conn->query($sql);
    $row = $result->fetchAll();    
    $quant_fim = $row[0]['0'];

    if ($quant_init == $quant_fim){
        $_SESSION['med'] = False;
    }
    else{
        $_SESSION['med'] = True;
    };

    header('location: ../views/cadastro_med.php');
?>