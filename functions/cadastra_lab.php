<?php

    session_start();

    function cadastra($conn){

        $sql = "INSERT INTO lab (name, password, address, email, phone, examtype, cnpj, accounttype) VALUES
        (:n, :p, :a, :e, :ph, :ex, :c, 'lab');";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':n', $_POST['name']);
        $stmt->bindParam(':p', $_POST['password']);
        $stmt->bindParam(':a', $_POST['address']);
        $stmt->bindParam(':e', $_POST['email']);
        $stmt->bindParam(':ph', $_POST['phone']);
        $stmt->bindParam(':ex', $_POST['examtype']);
        $stmt->bindParam(':c', $_POST['cnpj']);

        $stmt->execute();

        return;
    };

    function atualiza($conn){

        $email = $_SESSION['id'];

        $sql = "UPDATE lab SET name= :n, password=:p, address=:a, email=:e, phone=:ph, examtype=:ex, cnpj=:c WHERE email = '$email';";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':n', $_POST['Nome']);
        $stmt->bindParam(':p', $_POST['Senha']);
        $stmt->bindParam(':a', $_POST['Endereco']);
        $stmt->bindParam(':e', $_POST['Email']);
        $stmt->bindParam(':ph', $_POST['Telefone']);
        $stmt->bindParam(':ex', $_POST['Tipos_exames']);
        $stmt->bindParam(':c', $_POST['CNPJ']);

        $stmt->execute();
        return;
    };

    $server = "localhost";
    $db = "sas";
    $user = "root";
    $pass = "";

    $conn = new PDO("mysql:host=$server;dbname=$db", $user, $pass);

    $email = $_SESSION['id'];

    echo $_SESSION['id'];

    $sql = "SELECT * FROM lab WHERE email = '$email'";
    $result = $conn->query($sql);
    $row = $result->fetchAll();

    if (!empty($row)){

        atualiza($conn);
        $_SESSION['id'] = $_POST['Email'];
        header('location: ../views/lab_conta.php');
        exit;
    }

    $count = 0;
    $allexams = '';
    $already_used = array();
    $tamanho = sizeof($_POST)-6;

    while ($count < $tamanho) {
        if (in_array($_POST['examtype'.strval($count)], $already_used)) {
            $count +=1;
        }
        else {
            $already_used[] = $_POST['examtype'.strval($count)];
            $allexams .= $_POST['examtype'.strval($count)]. ';';
            $count +=1;
        }
        
    }

    $sql = "SELECT COUNT(*) FROM lab";
    $result = $conn->query($sql);
    
    $quant_init = $row[0]['0'];

    $_POST['examtype'] = $allexams;
    cadastra($conn);

    $result = $conn->query($sql);
    $row = $result->fetchAll();    
    $quant_fim = $row[0]['0'];

    if ($quant_init == $quant_fim){
        $_SESSION['lab'] = False;
    }
    else{
        $_SESSION['lab'] = True;
    };
    header('location: ../views/cadastro_lab.php');


?>