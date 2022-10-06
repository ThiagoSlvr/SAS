<!DOCTYPE html>
<?php

session_start();

$server = "localhost";
$db = "sas";
$user = "root";
$pass = "";

$email = $_SESSION['id'];

$conn = new PDO("mysql:host=$server;dbname=$db", $user, $pass);

$sql = "SELECT * FROM med WHERE email = '$email'";
$result = $conn->query($sql);
$usuario = $result->fetchall();

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

        <form action="../functions/cadastra_med.php" method="POST">
            <fieldset id = 'field' disabled= 'disabled'>
                <label for="Nome">Nome</label>
                <input type="text" name='Nome' value=<?php echo $usuario[0]['name'];?>><br>

                <label for="Senha">Senha</label>
                <input type="text" name='Senha' value=<?php echo $usuario[0]['password'];?>><br>

                <label for="Endereco">Endereço</label>
                <input type="text" name='Endereco' value="<?php echo $usuario[0]['address'];?>"><br>

                <label for="Email">Email</label>
                <input type="text" name='Email' value=<?php echo $usuario[0]['email'];?>><br>

                <label for="Telefone">Telefone</label>
                <input type="text" name='Telefone' value=<?php echo $usuario[0]['phone'];?>><br>

                <label for="Especialidade">Especialidade</label>
                <input type="text" name='Especialidade' value=<?php echo $usuario[0]['speciality'];?>><br>

                <label for="CRM">CRM</label>
                <input type="text" name='CRM' value=<?php echo $usuario[0]['crm'];?>><br>

                <button type="submit" hidden id='save' class = 'botao'>Save changes</button>
            </fieldset>
        </form>
        <button onclick="edit()" id = 'edit' class = 'botao'> EDIT</button>
    </section>
    <footer id='footer'>Projeto Sistemas para Internet II - 2022</footer>
</body>

</html>