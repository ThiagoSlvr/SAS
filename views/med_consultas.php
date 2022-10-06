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

<body id='medBody'>

    <header>

        <nav id="barraNavegacao">

            <button onclick="location.href='med_conta.php' " type="button">Minha conta</button>
            <button onclick="location.href='cadastro_consulta.php' " type="button">Criar consulta</button>
            <button onclick="location.href='med_consultas.php' " type="button">Ver consultas</button>

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
            
            $sql = "SELECT COUNT(*) FROM consultas WHERE date LIKE '$year-$month-%' AND idmed = '$email'";
            $result = $conn->query($sql);
            $quant = $result->fetchall();
            $quant = $quant[0]['0'];

            echo "QUANTIDADE DE TRABALHO NESTE MES FOI DE: $quant";

            $sql = "SELECT COUNT(*) FROM consultas WHERE date LIKE '$year-%' AND idmed = '$email'";
            $result = $conn->query($sql);
            $quant = $result->fetchall();
            $quant = $quant[0]['0'];

            echo "<br>QUANTIDADE DE TRABALHO NESTE ANO FOI DE: $quant";

            $contador = 0;
            for ($num = 1;$num<=12;$num++){
                $str = '0'.strval($num);
                $sql = "SELECT COUNT(*) FROM consultas WHERE date LIKE '$year-$str-%' AND idmed = '$email'";
                $result = $conn->query($sql);
                $quant = $result->fetchall();
                $contador += floatval($quant[0]['0']);
            }

            echo "<br>QUANTIDADE MEDIA MENSAL DE TRABALHO FOI DE: ". round($contador/12, 3);
            
            $sql = "SELECT * FROM consultas WHERE idmed = '$email'";
            $result = $conn->query($sql);
            $list_consult = $result->fetchall();

            for ($num=0;$num<count($list_consult);$num++) {

                $date = $list_consult[$num]['date'];
                $med = $list_consult[$num]['med'];
                $pac = $list_consult[$num]['pac'];
                $receita = $list_consult[$num]['receita'];
                $obs = $list_consult[$num]['obs'];

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
                </tr>
                <tr>
                    <td>Observações: </td>
                    <td>$obs</td>
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