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
            
            $sql = "SELECT COUNT(*) FROM consultas WHERE date LIKE '$year-$month-%' AND idpac = '$email'";
            $result = $conn->query($sql);
            $quant = $result->fetchall();
            $quant = $quant[0]['0'];

            echo "QUANTIDADE DE CONSULTAS NESTE MES FOI DE: $quant";

            $sql = "SELECT COUNT(*) FROM consultas WHERE date LIKE '$year-%' AND idpac = '$email'";
            $result = $conn->query($sql);
            $quant = $result->fetchall();
            $quant = $quant[0]['0'];

            echo "<br>QUANTIDADE DE CONSULTAS NESTE ANO FOI DE: $quant";

            $contador = 0;
            for ($num = 1;$num<=12;$num++){
                $str = '0'.strval($num);
                $sql = "SELECT COUNT(*) FROM consultas WHERE date LIKE '$year-$str-%' AND idpac = '$email'";
                $result = $conn->query($sql);
                $quant = $result->fetchall();
                $contador += floatval($quant[0]['0']);
            }

            echo "<br>QUANTIDADE MEDIA MENSAL DE CONSULTAS FOI DE: ". round($contador/12, 3);
            
            $sql = "SELECT * FROM consultas WHERE idpac = '$email'";
            $result = $conn->query($sql);
            $list_consult = $result->fetchall();

            for ($num = 0;$num < count($list_consult);$num++) {
                
                $date = $list_consult[$num]['date'];
                $med = $list_consult[$num]['med'];
                $pac = $list_consult[$num]['pac'];
                $receita = $list_consult[$num]['receita'];
                
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
                    <td>Médico: </td>
                    <td>$med</td>
                </tr>
                <tr>
                    <td>Paciente: </td>
                    <td>$pac</td>
                </tr>
                <tr>
                    <td>Receita: </td>
                    <td>$receita</td>
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