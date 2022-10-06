<!DOCTYPE html>
<?php
session_start();

$server = "localhost";
$db = "sas";
$user = "root";
$pass = "";

$email = $_SESSION['id'];

$conn = new PDO("mysql:host=$server;dbname=$db", $user, $pass);

$sql = "SELECT * FROM lab WHERE email = '$email'";
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

<body id='labBody'>

    <header>

        <nav id="barraNavegacao">

            <button onclick="location.href='lab_conta.php' " type="button">Minha conta</button>
            <button onclick="location.href='cadastro_exam.php' " type="button">Criar exames</button>
            <button onclick="location.href='lab_exames.php' " type="button">Ver exames</button>

        </nav>

    </header>
    <section>

        <form action="../functions/cadastra_lab.php" method="POST">
            <fieldset disabled= 'disabled' id = 'field'>
                <label for="Nome">Nome</label>
                <input type="text" name='Nome' value="<?php echo $usuario[0]['name'];?>"><br>

                <label for="Senha">Senha</label>
                <input type="text" name='Senha' value=<?php echo $usuario[0]['password'];?>><br>

                <label for="Endereco">Endereço</label>
                <input type="text" name='Endereco' value="<?php echo $usuario[0]['address'];?>"><br>

                <label for="Email">Email</label>
                <input type="text" name='Email' value=<?php echo $usuario[0]['email'];?>><br>

                <label for="Telefone">Telefone</label>
                <input type="text" name='Telefone' value=<?php echo $usuario[0]['phone'];?>><br>

                <label for="Tipos_exames">Tipos de exame</label>
                <input type="text" name='Tipos_exames' value=<?php echo $usuario[0]['examtype'];?>><br>

                <label for="CNPJ">CRM</label>
                <input type="text" name='CNPJ' value=<?php echo $usuario[0]['cnpj'];?>><br>

                <button type="submit" hidden id='save' class = 'botao'>Save changes</button>
            </fieldset>
        </form>
        <button onclick="edit()" id = 'edit' class = 'botao'> EDIT</button>
    </section>
    <footer id='footer'>Projeto Sistemas para Internet II - 2022</footer>
</body>

</html>