<?php 

// Criação da classe Produto com o CRUD

class ProdutoDao {

    public function criar(Produto $produto) {
        try {

            $sql = "INSERT INTO produto (nome_produto, valor, marca, img) VALUES (:nome_produto, :valor, :marca, :img)";

            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(":nome_produto", $produto->getNome(), PDO::PARAM_STR);
            $stmt->bindValue(":valor", $produto->getValor(), PDO::PARAM_STR);
            $stmt->bindValue(":marca", $produto->getMarca(), PDO::PARAM_STR);

            $nomep = $produto->getNome();
            $imagem = $produto->getImg();
            include '../includes/upload_img.php';
            $stmt->bindValue(":img", $nome_imagem, PDO::PARAM_STR);
            
            return $stmt->execute();

        } catch (PDOException $e) {
            echo "Erro ao Inserir Produto <br>" . $e->getMessage() . '<br>';
        }
    }

    public function listarp() {
        try {
            $sql = "SELECT * FROM produto ";
            $stmt = Conexao::getConexao()->query($sql);
            $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $list = array();

            foreach ($lista as $linha) {
                $list[] = $this->listaProdutos($linha);
            }

            return $list;

        } catch (PDOException $e) {
            echo "Ocorreu um erro ao tentar Buscar Todos." . $e->getMessage();
        }
    }
    
    private function listaProdutos($linhas) {

        $produto = new Produto();
        $produto->setID($linhas['id_produto']);
        $produto->setNome($linhas['nome_produto']);
        $produto->setValor($linhas['valor']);
        $produto->setMarca($linhas['marca']);   
        $produto->setImg($linhas['img']);   

        return $produto;
    }

    public function editar() {
        try {
            $sql = "SELECT * FROM produto WHERE id_produto = :id_produto";
            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(":id_produto", $_POST['id_edit'], PDO::PARAM_INT);
            $stmt->execute();
            $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $list = array();

            foreach ($lista as $linha) {
                $list[] = $this->listaProdutos($linha);
            }

            return $list;

        } catch (PDOException $e) {
            echo "Ocorreu um erro ao tentar buscar o produto." . $e->getMessage();
        }
    }
        public function alterar(Produto $produto) {
            try {
                $sql = "UPDATE produto SET nome_produto = :nome, valor = :valor, marca = :marca, img = :img WHERE id_produto = :id_produto";
          
                $stmt = Conexao::getConexao()->prepare($sql);
                $stmt->bindValue(":id", $produto->getID(), PDO::PARAM_INT);
                $stmt->bindValue(":nome", $produto->getNome(), PDO::PARAM_STR);
                $stmt->bindValue(":valor", $produto->getValor(), PDO::PARAM_STR);
                $stmt->bindValue(":marca", $produto->getMarca(), PDO::PARAM_STR);
                
                $nomep = $produto->getNome();
                $imagem = $produto->getImg();
                include '../includes/upload_img.php';
                $stmt->bindValue(":img", $nome_imagem, PDO::PARAM_STR);
    
                return $stmt->execute();
          
          
            } catch (PDOException $e) {
                echo "Ocorreu um erro ao tentar atualizar Produto." . $e->getMessage();
            }
        

    }

    public function excluirP(Produto $produto) {
        try {

            $sql = "DELETE FROM produto WHERE id_produto = :id_produto";
            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(":id_produto", $produto->getID(), PDO::PARAM_INT);
            return $stmt->execute();

        } catch (PDOException $e) {
            echo "Erro ao Excluir produto" . $e->getMessage();
        }
    }

    public function individual() {
        try {
            $sql = "SELECT * FROM produto WHERE id_produto = :id_produto";
            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(":id_produto", $_POST['id_feed'], PDO::PARAM_INT);
            $stmt->execute();
            $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $list = array();
    
            foreach ($lista as $linha) {
                $list[] = $this->listaProdutos($linha);
            }
    
            return $list;
    
        } catch (PDOException $e) {
            echo "Ocorreu um erro ao tentar buscar produto." . $e->getMessage();
        }
        
    }

}

?>