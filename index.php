<!-- 
Nicolas da Silva Daltrozo - 112871
Thiago Chim Silvera - 110668
 -->
<?php
session_start();
$_SESSION['id'] = $_SESSION['id'] ?? null;
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Cadastros</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/style.css">
    <script src="js/script.js"></script>

</head>

<body id=indexBody>

    <section >
    
        <div>
            <h3>Bem vindo ao SAS, digite seu Email, senha e tipo de conta.</h3>
        </div>
        <img id="imgsas" src="assets/sas.jpg" >
            
        <div id='div_log'>
            
            <form id='login' action="functions/code.php" method="post" >
                <?php
                    if (isset($_SESSION["autent"])):
                ?>
                <div id = "errr">
                    <span>LOGIN OU SENHA INVALIDO</span>
                </div>
                <?php

                    endif;
                    unset($_SESSION["autent"]);
                ?>

                <div>
                    <h4>Faça seu login</h4>
                </div>

                <div>
                    Email: <input type="text" name='login' required>
                    <br>
                    Senha: <input type="password" name='senha' required>
                    <br>
                    Tipo: <select name="tipo" required>
                        <option value="adm">Administrador</option>
                        <option value="lab">Laboratorio</option>
                        <option value="med">Medico</option>
                        <option value="pac">Paciente</option>
                    </select>
                    <br>
                    <button type="submit" class = 'botao'>Enviar</button>
                </div>
            </form>
        </div>

    </section>
    <footer id='footer'>Projeto Sistemas para Internet II - 2022</footer>
</body>

</html>