<!DOCTYPE html>
<?php
session_start();
?>

<html lang="pt-br">

<head>
    <title>Cadastros</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="../js/script.js?newversion"></script>
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
        if (isset($_SESSION['lab'])):
            if ($_SESSION['lab'] == True):
        ?>

        <script>
            window.alert("Cadastro feito com sucesso");
        </script>

        <?php
            endif;
            if ($_SESSION['lab'] == False):
        ?>

        <script>
                window.alert("Cadastro falhou");
        </script>
        
        <?php
            endif;
        endif;
        unset($_SESSION['lab']);
        ?>
        <div class = 'div_form'>
            <form id='stand_form' action="../functions/cadastra_lab.php" method="post">
                Nome: <input type="text" name='name' required>
                <br>
                Senha: <input type="text" name='password' required>
                <br>
                Endereço: <input type="text" name='address' required>
                <br>
                Telefone <input type="text" name='phone' required>
                <br>
                E-mail: <input type="email" name='email' required>
                <br>
                <div id='drop' style="display: block;">
                    Tipos de exame: <select name="examtype0" id ="examtype0" required>
                        <option value="Sangue">Sangue</option>
                        <option value="Raio X">Raio X</option>
                    </select>
                </div>
                <button type='button' onclick="add_drop()" id='adiciona' class = 'botao'>Adicione tipo de exame</button>
                <br>
                CNPJ: <input type="text" name='cnpj' required>
                <br>
                <button type="submit" class = 'botao'>Enviar</button>
            </form>           
            
            
        </div>
    </section>
    <footer id='footer'>Projeto Sistemas para Internet II - 2022</footer>
</body>

</html>