<!DOCTYPE html>
<html lang="pt-br">
<?php
session_start();
?>

<head>
    <title>Cadastros</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style/style.css">
    <script src="../js/script.js"></script>
</head>

<body id='labBody'>

    <header>

        <nav id="barraNavegacao">

            <button onclick="location.href='lab_conta.php' " type="button">Minha conta</button>
            <button onclick="location.href='cadastro_exam.php' " type="button">Criar exames</button>
            <button onclick="location.href='lab_exames.php' " type="button">Ver exames</button>

        </nav>
    </header>
    <section>
        <?php
            $server = "localhost";
            $db = "sas";
            $user = "root";
            $pass = "";
            
            $email = $_SESSION['id'];
            
            $conn = new PDO("mysql:host=$server;dbname=$db", $user, $pass);

            $month = date('m');            
            $year = '20'. date('y');
            
            $sql = "SELECT COUNT(*) FROM exames WHERE data LIKE '$year-$month-%' AND idlab = '$email'";
            $result = $conn->query($sql);
            $quant = $result->fetchall();
            $quant = $quant[0]['0'];

            echo "QUANTIDADE DE TRABALHO NESTE MES FOI DE: $quant";

            $sql = "SELECT COUNT(*) FROM exames WHERE data LIKE '$year-%' AND idlab = '$email'";
            $result = $conn->query($sql);
            $quant = $result->fetchall();
            $quant = $quant[0]['0'];

            echo "<br>QUANTIDADE DE TRABALHO NESTE ANO FOI DE: $quant";

            $contador = 0;
            for ($num = 1;$num<=12;$num++){
                $str = '0'.strval($num);
                $sql = "SELECT COUNT(*) FROM exames WHERE data LIKE '$year-$str-%' AND idlab = '$email'";
                $result = $conn->query($sql);
                $quant = $result->fetchall();
                $contador += floatval($quant[0]['0']);
            }

            echo "<br>QUANTIDADE MEDIA MENSAL DE TRABALHO FOI DE: ". round($contador/12, 3);
            
            $sql = "SELECT * FROM exames WHERE idlab = '$email'";
            $result = $conn->query($sql);
            $list_exam = $result->fetchall();

            for ($num = 0;$num < count($list_exam);$num++) {
                
                $date = $list_exam[$num]['data'];
                $lab = $list_exam[$num]['lab'];
                $pac = $list_exam[$num]['pac'];
                $type = $list_exam[$num]['type'];
                $result = $list_exam[$num]['result'];
                
                echo 
                "
                <div class= 'tabelas'>
                <fieldset>
                <table>
                <tr>
                    <td>Data: </td>
                    <td>$date</td>
                </tr>
                <tr>
                    <td>Laboratório: </td>
                    <td>$lab</td>
                </tr>
                <tr>
                    <td>Paciente: </td>
                    <td>$pac</td>
                </tr>
                <tr>
                    <td>Tipo: </td>
                    <td>$type</td>
                </tr>
                <tr>
                    <td>Rsultado: </td>
                    <td>$result</td>
                </tr>
                </table>
                </fieldset>
                </div>
                ";

            }


        
        ?>
    </section>
    <footer id='footer'>Projeto Sistemas para Internet II - 2022</footer>
</body>

</html>