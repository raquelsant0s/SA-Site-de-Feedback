<?php 

require_once('../config/Conexao.php');
require_once('../dao/AvaliacaoDao.php');
require_once('../model/Avaliacao.php');

//instancia as classes
$avaliacao = new Avaliacao();
$avaliacaodao = new AvaliacaoDao();

//pega todos os dados passado por POST

$dados = filter_input_array(INPUT_POST);

if(isset($_POST['enviar_avaliacao'])){


$avaliacao->setIDC($dados['id_cliente']);
$avaliacao->setIDP($dados['id_produto']);
$avaliacao->setEstrela($dados['estrela']);
$avaliacao->setDescricao($dados['comentario']);


if($avaliacaodao->criarA($avaliacao)) {
echo "<script>
        alert('Avaliação Cadastrada com Sucesso!!');
        location.href = '../';
      </script>";
}

echo "<script> alert('Erro ao cadastrar avaliação'); </script>";

}

?>