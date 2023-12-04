<?php
    if(!empty($_GET['id_produto']))
    {
        include_once('config.php');

        $id_produto = $_GET['id_produto'];

        $sqlSelect = "SELECT *  FROM produto WHERE id_produto=$id_produto";

        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0)
        {
            $sqlDelete = "DELETE FROM produto WHERE id_produto=$id_produto";
            $resultDelete = $conexao->query($sqlDelete);
        }
    }
    header('Location: listarProdutos.php');
?>