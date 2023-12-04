<?php

    require_once'usuarios.php';
    $usuario = new Usuario;
    $usuario->conectar();


    if(isset($_POST['email']))
    {
        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);

        echo'logou?';

        if(!empty($email) && !empty($senha))
        {
           if($usuario->logar($email,$senha))
           {
            header("location: indexRestrito.php");
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
    <title>Login</title>
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
                    <a class="singup">Login</a>

                    <div class="inputBox1">
                        <input name="email" type="text" required="required">
                        <span>Email</span>
                    </div>

                    <div class="inputBox1">
                        <input name="senha" type="password" required="required">
                        <span>Senha</span>
                    </div>

                    <div class="link-cadastro">
                        <span>Não Possui cadastro?<a href="cadastroCliente.php">Cadastre-se</a></span>
                    </div>

                    <div class="btn-container">
                        <button type="submit" name="btn_cadastrar" class="login-btn" >LOGIN</button>
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