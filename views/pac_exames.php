<!DOCTYPE html>
<?php
session_start();

?>
<html lang="pt-br">

<head>
    <title>Cadastros</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style/style.css">
    <script src="../js/script.js"></script>

</head>

<body id=pacBody>

    <header>

        <nav id="barraNavegacao">

            <button onclick="location.href='pac_consulta.php' " type="button">Ver consultas</button>
            <button onclick="location.href='pac_exames.php' " type="button">Ver exames</button>

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
            
            $sql = "SELECT COUNT(*) FROM exames WHERE data LIKE '$year-$month-%' AND idpac = '$email'";
            $result = $conn->query($sql);
            $quant = $result->fetchall();
            $quant = $quant[0]['0'];

            echo "QUANTIDADE DE EXAMES NESTE MES FOI DE: $quant";

            $sql = "SELECT COUNT(*) FROM exames WHERE data LIKE '$year-%' AND idpac = '$email'";
            $result = $conn->query($sql);
            $quant = $result->fetchall();
            $quant = $quant[0]['0'];

            echo "<br>QUANTIDADE DE EXAMES NESTE ANO FOI DE: $quant";

            $contador = 0;
            for ($num = 1;$num<=12;$num++){
                $str = '0'.strval($num);
                $sql = "SELECT COUNT(*) FROM exames WHERE data LIKE '$year-$str-%' AND idpac = '$email'";
                $result = $conn->query($sql);
                $quant = $result->fetchall();
                $contador += floatval($quant[0]['0']);
            }

            echo "<br>QUANTIDADE MEDIA MENSAL DE EXAMES FOI DE: ". round($contador/12, 3);
            
            $sql = "SELECT * FROM exames WHERE idpac = '$email'";
            $result = $conn->query($sql);
            $list_exam = $result->fetchall();

            for ($num=0;$num <count($list_exam);$num++) {

                $date = $list_exam[$num]['data'];
                $lab = $list_exam[$num]['lab'];
                $pac = $list_exam[$num]['pac'];
                $type = $list_exam[$num]['type'];
                
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
                    <td>Tipo de Exame: </td>
                    <td>$pac</td>
                </tr>
                <tr>
                    <td>Resultado do Exame: </td>
                    <td>$type</td>
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