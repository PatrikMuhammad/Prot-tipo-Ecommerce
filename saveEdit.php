<?php
    // isset -> serve para saber se uma variável está definida
    include_once('config.php');
    if(isset($_POST['update']))
    {
        $id_usuario = $_POST['id_usuario'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $senha = $_POST['senha'];

        $sqlInsert = "UPDATE usuario 
        SET nome='$nome',email='$email',telefone='$telefone',senha='$senha'
        WHERE id_usuario=$id_usuario";
        $result = $conexao->query($sqlInsert);
        print_r($result);
    }
    header('Location: listarUsuarios.php');

?>