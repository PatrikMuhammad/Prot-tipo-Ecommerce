<?php
require'usuarios.php';
$cadastrarProduto = new Produto;
$cadastrarProduto->conectar();



if(isset($_POST['btn_cadastrar_produto']))
{
    if(isset($_POST['nome_produto'],$_POST['descricao_produto'],$_POST['valor_produto']))
    {

    $nome_produto = $_POST['nome_produto'];
    $descricao_produto =$_POST['descricao_produto'];
    $valor_produto = $_POST['valor_produto'];
    }
    //verificar se o produto ja está cadastrado

    if($cadastrarProduto->produtoCadastrado($nome_produto))
    {
        echo"Produto já cadastrado!";
        exit;
    }else
    {
        if($cadastrarProduto->cadastrarProduto($nome_produto, $descricao_produto, $valor_produto)){
            // echo"Produto cadastrado com sucesso!";
            header("location: cadastroProduto.php");
            exit;
        }else{
            header("location: cadastroProduto.php");
            // echo"Erro ao cadastrar";
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
    <title>Cadastro de Produtos</title>
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
                    <li><a href="listarUsuarios.php">Listar</a>
                        <ul>
                            <li><a href="listarProdutos.php">Produtos</a></li>
                            <li><a href="listarUsuarios.php">Usuario</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Cadastro</a>
                        <ul>
                            <li><a href="cadastroProduto.php">Produtos</a></li>
                            <li><a href="cadastroRestrito.php">Usuario</a></li>
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
                <form class="form-card" action="#" method="post">
                    <a class="singup">PRODUTO</a>
                    <div class="inputBox1">
                        <input name="nome_produto" type="text" required="required">
                        <span class="user">Nome</span>
                    </div>

                    <div class="inputBox1">
                        <input name="descricao_produto" type="text" required="required">
                        <span>Descrição</span>
                    </div>

                    <div class="inputBox1">
                        <input name="valor_produto" type="text" required="required">
                        <span>Valor</span>
                    </div>

                    <div class="btn-container">
                        <input class="enter cadastrar-btn" type="submit" value="CADASTRAR" name="btn_cadastrar_produto">
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