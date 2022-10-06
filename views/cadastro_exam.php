<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

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
        if (isset($_SESSION['exames'])):
            if ($_SESSION['exames'] == True):
        ?>

        <script>
            window.alert("Cadastro feito com sucesso");
        </script>

        <?php
            endif;
            if ($_SESSION['exames'] == False):
        ?>

        <script>
                window.alert("Cadastro falhou");
        </script>
        
        <?php
            endif;
        endif;
        unset($_SESSION["exames"]);
        ?>

        <div class = 'div_form'>
            <form id='stand_form' action="../functions/cadastra_exam.php" method="post">
                Data: <input type="text" name='data' required>
                <br>
                Laboratório: <input type="text" name='lab' required>
                <br>
                Paciente: <input type="text" name='pac' required>
                <br>
                Email paciente: <input type="text" name='email_pac' required>
                <br>
                Tipo de Exame: <input type="text" name='type' required>
                <br>
                Resultado: <input type="text" name='result' required>
                <br>
                <button type="submit" class = 'botao'>Enviar</button>
            </form>
        </div>
    </section>
    <footer id='footer'>Projeto Sistemas para Internet II - 2022</footer>
</body>

</html>