<?php 

// Criação da classe Usuario com o CRUD

class AvaliacaoDao {

    public function criarA(Avaliacao $avaliacao) {
         try {

            $sql = "INSERT INTO feedback (id_cliente, id_produto, estrelas, descricao) VALUES (:id_cliente, :id_produto, :estrela, :comentario)";

            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(":id_cliente", $avaliacao->getIDC(), PDO::PARAM_INT);
            $stmt->bindValue(":id_produto", $avaliacao->getIDP(), PDO::PARAM_INT);
            $stmt->bindValue(":estrela", $avaliacao->getEstrela(), PDO::PARAM_INT);
            $stmt->bindValue(":comentario", $avaliacao->getDescricao(), PDO::PARAM_STR);

            return $stmt->execute();
           } catch (PDOException $e) {
            echo "Erro ao Inserir avaliacao <br>" . $e->getMessage() . '<br>';
          }
    }

    public function listarA() {
        try {
            $sql = "SELECT * FROM feedback";
            // WHERE id_produto = :id_produto
            $stmt = Conexao::getConexao()->query($sql);
            $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $list = array();

            foreach ($lista as $linha) {
                $list[] = $this->listaAvaliacao($linha);
            }

            return $list;

        } catch (PDOException $e) {
            echo "Ocorreu um erro ao tentar Buscar Todos." . $e->getMessage();
        }
    }


     
    private function listaAvaliacao($linhas) {

        $avaliacao = new Avaliacao();
        $avaliacao->setIDC($linhas['id_cliente']);
        $avaliacao->setIDP($linhas['id_produto']);
        $avaliacao->setEstrela($linhas['estrelas']);
        $avaliacao->setDescricao($linhas['descricao']);
        
        return $avaliacao;
    }

    public function listaF() {
        try {
            $sql = "SELECT * FROM feedback WHERE id_produto = :id_produto";
            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(":id_produto", $_POST['id_feed'] , PDO::PARAM_INT);
            $stmt->execute();
            $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $list = array();

            foreach ($lista as $linha) {
                $list[] = $this->listaAvaliacao($linha);
            }

            return $list;

        } catch (PDOException $e) {
            echo "Ocorreu um erro ao tentar buscar avaliação." . $e->getMessage();
        }

    }

}

?>