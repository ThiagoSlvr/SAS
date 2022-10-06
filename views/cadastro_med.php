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

<body id="admBody">

    <header>

        <nav id="barraNavegacao">

            <button onclick="location.href='cadastro_pac.php' " type="button">Cadastrar paciente</button>
            <button onclick="location.href='cadastro_lab.php' " type="button">Cadastrar laboratorio</button>
            <button onclick="location.href='cadastro_med.php' " type="button">Cadastrar medico</button>

        </nav>
    </header>
    <section>
    <?php
        if (isset($_SESSION['med'])):
            if ($_SESSION['med'] == True):
        ?>

        <script>
            window.alert("Cadastro feito com sucesso");
        </script>

        <?php
            endif;
            if ($_SESSION['med'] == False):
        ?>

        <script>
                window.alert("Cadastro falhou");
        </script>
        
        <?php
            endif;
        endif;
        unset($_SESSION['med']);
        ?>
        <div class = 'div_form'>
            <form id='stand_form' action="../functions/cadastra_med.php" method="post">
                Nome: <input type="text" name='name' required>
                <br>
                Senha: <input type="text" name='password' required>
                <br>
                Endereço: <input type="text" name='address' required>
                <br>
                Telefone: <input type="text" name='phone' required>
                <br>
                E-mail: <input type="email" name='email' required>
                <br>
                Especialidade: <input type="text" name='speciality' required>
                <br>
                CRM: <input type="text" name='crm' required>
                <br>
                <button type="submit" class = 'botao'>Enviar</button>
            </form>
        </div>
    </section>
    <footer id='footer'>Projeto Sistemas para Internet II - 2022</footer>
</body>

</html>