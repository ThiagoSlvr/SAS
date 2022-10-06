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
        if (isset($_SESSION['cadastro'])):
            if ($_SESSION['cadastro'] == True):
        ?>

        <script>
            window.alert("Cadastro feito com sucesso");
        </script>

        <?php
            endif;
            if ($_SESSION['cadastro'] == False):
        ?>

        <script>
                window.alert("Cadastro falhou");
        </script>
        
        <?php
            endif;
        endif;
        unset($_SESSION["cadastro"]);
        ?>

        <div class = 'div_form'>
            <form id='stand_form' action="../functions/cadastra_consulta.php" method="post">
                Data: <input type="text" name='date' required>
                <br>
                Médico: <input type="text" name='med' required>
                <br>
                Paciente: <input type="text" name='pac' required>
                <br>
                Email paciente: <input type="text" name='email_pac' required>
                <br>
                Receita: <input type="text" name='receita' required>
                <br>
                Observações: <textarea type="text" name='obs' id= 'med_obs' rows="5" required></textarea>
                <br>
                <button type="submit" class = 'botao'>Enviar</button>
            </form>
        </div>
    </section>
    <footer id='footer'>Projeto Sistemas para Internet II - 2022</footer>
</body>

</html>