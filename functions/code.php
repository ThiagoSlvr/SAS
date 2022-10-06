<?php

    session_start();

    $server = "localhost";
    $db = "sas";
    $user = "root";
    $pass = "";
    
    $conn = new PDO("mysql:host=$server;dbname=$db", $user, $pass);

    $user = $_POST["login"];
    $pass = $_POST["senha"];
    $account = $_POST["tipo"];

    $sql = "SELECT * FROM $account WHERE email = '$user'";

    $result = $conn->query($sql);

    $rows = $result->fetchall();

    // print_r ($rows);

    if ((!empty($result)) and ($pass == $rows[0]["password"])){
        $_SESSION['id'] = $user;
        header('Location: ../views/'.$account.'.php');
        exit;
    }
    
    $_SESSION["autent"] = true;
    header('Location: ../index');
?>