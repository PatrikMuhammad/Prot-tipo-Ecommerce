<?php
class Usuario{
    var $conexao;

    public function conectar(){
        $dbname = 'dev_web_estacio';
        $host = 'localhost';
        $user = 'root';
        $pass = '';

        try{
            $this->conexao = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
            $this->conexao->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            // echo "Conectou";
        } catch(PDOException $msgEx){
            throw new Exception("erro na conexão".
            $msgEx->getMessage());
        }
    }

    public function cadastrar($nome,$email,$telefone,$senha){
        $sql = $this->conexao->prepare("INSERT INTO usuario(nome, email, telefone, senha)VALUES (:n, :e, :t, :s) ");
        $sql->bindValue(":n", $nome);
        $sql->bindValue(":e", $email);
        $sql->bindValue(":t", $telefone);
        $sql->bindValue(":s", $senha);
        $sql->execute();
        
    }


    public function emailCadastrado($email){
        try{
            $sql = "SELECT * FROM usuario WHERE email = :email";
            $dados= $this->conexao->prepare($sql);
            $dados->bindParam(':email',$email);
            $dados->execute();

            return $dados->rowCount()>0;

        }catch(PDOException $erro){
            throw new Exception('Erro na consulta: '.$erro->getMessage());
        }
    }

    public function get_dados(){
        try{
            $sql = $this->conexao->query("SELECT* FROM usuario");
            if($sql->rowCount()>0){
                $dados =$sql->fetchAll(PDO::FETCH_ASSOC);
                return $dados;
            }else{
                return false;
            }
        }catch(PDOException $msgEx){
            throw new Exception('Erro na Consulta no Banco de Dados'
            .$msgEx->getMessage());
        }
    }

    public function logar($email, $senha)
    {
        $sql = $this->conexao->prepare("SELECT id_usuario FROM usuario WHERE email= :e AND senha = :s");
        $sql->bindValue(":e",$email);
        $sql->bindValue(":s",$senha);
        $sql->execute();

        if($sql->rowCount()>0)
        {
            $dados = $sql->fetch();
            session_start();
            $_SESSION['id_usuario']=$dados['id_usuario'];
            return true;
        }
        else
        {
            return false;
        }
    }



}

class Produto{
    private $conexao;

    public function conectar(){
        $dbname = 'dev_web_estacio';
        $host = 'localhost';
        $user = 'root';
        $pass = '';

        try{
            $this->conexao = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
            $this->conexao->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            // echo "Conectou";
        } catch(PDOException $msgEx){
            throw new Exception("erro na conexão".
            $msgEx->getMessage());
        }
    }
    public function cadastrarProduto($nome_produto,$descricao_produto,$valor_produto){
        $sql = $this->conexao->prepare("INSERT INTO produto(nome_produto, descricao_produto, valor_produto)VALUES (:np, :dp, :vp) ");
        $sql->bindValue(":np", $nome_produto);
        $sql->bindValue(":dp", $descricao_produto);
        $sql->bindValue(":vp", $valor_produto);
        $sql->execute();
    }

    public function produtoCadastrado($nome_produto){
        try{
            $sql = "SELECT * FROM produto WHERE nome_produto = :nome_produto";
            $dados= $this->conexao->prepare($sql);
            $dados->bindParam(':nome_produto',$nome_produto);
            $dados->execute();

            return $dados->rowCount()>0;

        }catch(PDOException $erro){
            throw new Exception('Erro na consulta: '.$erro->getMessage());
        }
    }
}



?>