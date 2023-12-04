<?php
    // session_start();
    include_once('config.php');
    // print_r($_SESSION);
    // if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true))
    // {
    //     unset($_SESSION['email']);
    //     unset($_SESSION['senha']);
    //     header('Location: login.php');
    // }
    // $logado = $_SESSION['email'];
    // if(!empty($_GET['search']))
    // {
    //     $data = $_GET['search'];
    //     $sql = "SELECT * FROM produto WHERE id_produto LIKE '%$data%' or nome_produto LIKE '%$data%' or descricao_produto LIKE '%$data%' ORDER BY id_produto DESC";
    // }
    // else
    // {
    $sql = "SELECT * FROM produto ORDER BY id_produto DESC";
    // }
    $result = $conexao->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Produtos</title>
    <link rel="stylesheet" href="cadastro.css"><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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
                    <li><a href="listarUsuarios.php">Listar</a></li>
                    <li><a href="#">Cadastro</a>
                        <ul>
                            <li><a href="cadastroProduto.php">Produtos</a></li>
                            <li><a href="cadastroRestrito.php">Usuario</a></li>
                        </ul>                    
                    </li>
                    <li><a href="indexRestrito.php  ">Voltar</a></li>
                </ul>
                <div class="menu-btn">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
            </div>
    </nav>
    <style>
        body{
            background-color: #222;
        }
        a{
            text-decoration: none;
        }
        html 
        {
            height: 100%;
            min-height: 100%;
        }

        body 
        {
            display: flex;
            flex-direction: column;
            min-height: 100%;
        }

        footer {
            margin-top: auto;
        }   
    </style>

    <div class="m-5">
        <table class="table text-white table-bg">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nome Produto</th>
                    <th scope="col">Descricao Produto</th>
                    <th scope="col">Valor Produto</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <section class="lista">
                    <?php
                        while($user_data = mysqli_fetch_assoc($result)) 
                        {
                            echo "<tr>";
                            echo "<td>".$user_data['id_produto']."</td>";
                            echo "<td>".$user_data['nome_produto']."</td>";
                            echo "<td>".$user_data['descricao_produto']."</td>";
                            echo "<td>".$user_data['valor_produto']."</td>";
                            echo "<td>

                            <a class='btn btn-sm btn-primary' href='editProduto.php?id_produto=$user_data[id_produto]' title='Editar'>EDITAR</a>
                            <a class='btn btn-sm btn-danger' href='deleteProduto.php?id_produto=$user_data[id_produto]' title='Deletar'>DELETAR</a>
                                </td>";
                            echo "</tr>";
                        }
                    ?>
                </section>

            </tbody>
        </table>
    </div>

    <!--sessão  footer-->
    <footer class="ftr-lista">
        <span>Criado por <a href="#">HubTecnology</a> | Todos os direitos reservado 2023
        </span>
    </footer>

    <script src="script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>