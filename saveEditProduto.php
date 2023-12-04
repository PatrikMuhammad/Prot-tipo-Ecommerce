<?php

include_once('config.php');
    if(isset($_POST['update-produto']))
    {
        $id_produto= $_POST['id_produto'];
        $nome_produto = $_POST['nome_produto'];
        $descricao_produto = $_POST['descricao_produto'];
        $valor_produto = $_POST['valor_produto'];

        $sqlInsert = "UPDATE produto 
        SET nome_produto='$nome_produto',descricao_produto='$descricao_produto',valor_produto='$valor_produto'
        WHERE id_produto=$id_produto";
        $result = $conexao->query($sqlInsert);
        print_r($result);
    }
    header('Location: listarProdutos.php');

?>
