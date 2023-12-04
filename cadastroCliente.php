<?php
require 'usuarios.php';
$usuario = new Usuario;
$usuario->conectar();



if (isset($_POST['btn_cadastrar'])) {
    if (isset($_POST['nome'], $_POST['email'], $_POST['telefone'], $_POST['senha'])) {

        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $senha = $_POST['senha'];
    }
    //verificar se o email ja está cadastrado

    if ($usuario->emailCadastrado($email)) {
        echo "Email já cadastrado!";
        exit;
    } else {
        if ($usuario->cadastrar($nome, $email, $telefone, $senha)) {
            // echo"Usuário cadastrado com sucesso!";
            header("location: login.php");
            exit;
        } else {
            header("location: login.php");
            // echo"Erro ao cadastrar".$erro->getMessage();
            exit;
        }
    }
}

?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuários</title>
    <link rel="stylesheet" href="cadastro.css">
    <link rel="shortcut icon" href="image/computer.png" type="image/x-icon">
</head>

<body>
    <nav>
        <div class="navbar">
            <div class="max-width">
                <div class="logo">Hub<span>Technology</span></div>
                <ul class="menu">
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="index.php">Sobre</a></li>
                    <li><a href="index.php">Promoções</a></li>
                    <li><a href="index.php">Sair</a></li>
                </ul>
                <div class="menu-btn">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
            </div>
    </nav>

    <section class="container-card">

        <div class="container">
            <div class="card">
                <form class="form-card" action="#" method="post">
                    <a class="singup">CLIENTE</a>
                    <div class="inputBox1">
                        <input name="nome" type="text" required="required">
                        <span class="user">Nome</span>
                    </div>

                    <div class="inputBox1">
                        <input name="email" type="text" required="required">
                        <span>Email</span>
                    </div>

                    <div class="inputBox1">
                        <input name="telefone" type="text" required="required">
                        <span>Telefone</span>
                    </div>

                    <div class="inputBox1">
                        <input name="senha" type="password" required="required">
                        <span>Senha</span>
                    </div>
                    <div class="btn-container">
                        <input class="enter cadastrar-btn" type="submit" value="CADASTRAR" name="btn_cadastrar">
                    </div>
                    
                </form>
            </div>
        </div>

    </section>

    <!--sessão  footer-->
    <footer>
        <span>Criado por <a href="#">HubTecnology</a> | Todos os direitos reservado 2023
        </span>
    </footer>

    <script src="script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>