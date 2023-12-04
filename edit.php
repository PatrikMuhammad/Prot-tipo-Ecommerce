<?php

include_once('config.php');

if(!empty($_GET['id_usuario']))
{
    $id_usuario = $_GET['id_usuario'];
    $sqlSelect = "SELECT * FROM usuario WHERE id_usuario=$id_usuario";
    $result = $conexao->query($sqlSelect);
    if($result->num_rows > 0)
    {
        while($user_data = mysqli_fetch_assoc($result))
        {
            $nome = $user_data['nome'];
            $email = $user_data['email'];
            $telefone = $user_data['telefone'];
            $senha = $user_data['senha'];
        }
    }
    else
    {
        header('Location: listarUsuario.php');
    }
}
else
{
    header('Location: listarUsuario.php');
}


?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição de Usuários</title>
    <link rel="stylesheet" href="cadastro.css">
    <link rel="shortcut icon" href="image/computer.png" type="image/x-icon">
</head>

<body>
    <nav>
        <div class="navbar">
            <div class="max-width">
                <div class="logo">Hub<span>Technology</span></div>
                <ul class="menu">
                    <li><a href="indexRestrito.php">Inicio</a></li>
                    <li><a href="indexRestrito.php">Sobre</a></li>
                    <li><a href="indexRestrito.php">Promoções</a></li>
                    <li><a href="#">Cadastro</a>
                        <ul>
                            <li><a href="#">Produtos</a></li>
                            <li><a href="#">Usuario</a></li>
                        </ul>
                    </li>
                    <li><a href="indexRestrito.php">Sair</a></li>
                </ul>
                <div class="menu-btn">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
            </div>
    </nav>

    <section class="container-card">

        <div class="container">
            <div class="card">
                <form class="form-card" action="saveEdit.php" method="post">
                    <a class="singup">CADASTRO</a>
                    <div class="inputBox1">
                        <input name="nome" type="text" value=<?php echo $nome;?> required="required">
                        <span class="user">Nome</span>
                    </div>

                    <div class="inputBox1">
                        <input name="email" type="text" value=<?php echo $email;?> required="required">
                        <span>Email</span>
                    </div>

                    <div class="inputBox1">
                        <input name="telefone" type="text" value=<?php echo $telefone;?> required="required">
                        <span>Telefone</span>
                    </div>

                    <div class="inputBox1">
                        <input name="senha" type="text" value=<?php echo $senha;?> required="required">
                        <span>Senha</span>
                    </div>
                    <div class="btn-container">
                        <input type="hidden" name="id_usuario" value=<?php echo $id_usuario;?>>
                        <input class="enter update cadastrar-btn" type="submit" name="update" value="SALVAR" id="submit">
                        <input class="enter cancelar cadastrar-btn" type="submit" value="CANCELAR" id="submit" onclick="Cancelar()">
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