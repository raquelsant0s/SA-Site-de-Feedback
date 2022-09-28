<?php 

session_start();

require_once('../../config/Conexao.php');
require_once('../../dao/UserDao.php');
require_once('../../model/Usuario.php');
require_once('../../dao/AvaliacaoDao.php');
require_once('../../model/Avaliacao.php');
require_once('../../dao/ProdutoDao.php');
require_once('../../model/Produto.php');

//instancia as classes
$avaliacao = new Avaliacao();
$avaliacaodao = new AvaliacaoDao();

//instancia as classes
$usuario = new Usuario();
$userdao = new UserDao();

$produto = new Produto();
$produtodao = new ProdutoDao();


$login = new UserDao();

$id = $_SESSION['user_session'];

if(!$login->checkLogin()) {
    header("Location: ../login");
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LUXURIOUS SIN</title>
    <script type="text/javascript" src="funcoes.js"></script>
    <link rel='stylesheet' type='text/css' media='screen' href='feedback.css'>
  
</head>


<body link="black" alink="black" vlink="black">

    <header>
        <div class="logo"></div>
        <ul>
            <li> <a href="../../"> HOME </a> </li>
            <li> <a href="../sobre/suporte.php"> SOBRE </a> </li>
            <li> <a href="../../controller/UsuarioController.php?logout=true">LOGOUT </a> </li>
            
            
        </ul>
    </header>

    <?php foreach($produtodao->individual() as $produto) : ?>

    <section id="nome">
        <h2> AVALIAÇÃO , <?= $produto->getNome() ?> </h2>
    </section>

    <?php endforeach ?>

    

    <main class="container" id="avaliacao">
        <article class="row">
        <form action="../../controller/AvaliacaoController.php" method="post" name="avaliacao">
            
            <section>
            
            <br/><br/>
              <label> Nota </label>
              <br/>
              <label><input type="radio" id="estrela" name="estrela" value="1" required/> 1 </label>
              <br/>
              <label><input type="radio" id="estrela" name="estrela" value="2" required/> 2 </label>
              <br/>
              <label><input type="radio" id="estrela" name="estrela" value="3" required/> 3 </label>
              <br/>
              <label><input type="radio" id="estrela" name="estrela" value="4" required/> 4 </label>
              <br/>
              <label><input type="radio" id="estrela" name="estrela" value="5" required/> 5 </label>
            </section>
            <br/>   
            <section id="coment">
            
              <p> Deixe seu comentário:</p><br/>
              <textarea id="comentario" class="coment" name="comentario" cols="45" rows="5" required></textarea><br><br>
              </section>
              <input type="hidden" name="id_cliente" id="id_cliente" value="<?= $id?>" style="height: 100%; width: 100%;"/>
              <input type="hidden" name="id_produto" id="id_produto" value="<?= $produto->getID()?>" style="height: 100%; width: 100%;"/> 
              <input type="submit" name="enviar_avaliacao" id="enviar_avaliacao" value="AVALIAÇÃO"/>
        </form>
        </article>
    </main>
</table>





        <section>

        <table border="1" style="border:1px solid grey; width:800px; color:#000;">
            <tr style="background-color:#000; color: #FFF;">
                <th>Cliente</th><br/>
                <th>Estrelas </th><br/>
                <th>Descrição</th>
            </tr>
            <?php foreach ($avaliacaodao->listaF() as $avaliacao) : 
                if($avaliacao->getIDP() == $produto->getID()) :
                ?>
            <tr>
                <td><?= $avaliacao->getIDC() ?></td>
                <td><?= $avaliacao->getEstrela() ?></td>
                <td><?= $avaliacao->getDescricao() ?></td>
            </tr>
            <?php endif; 
             endforeach ?>
        </table>

        </section>


    <?php foreach ($produtodao->individual() as $produto) : ?>

    <div id="img">
    <img src="../../img/<?= $produto->getImg()?>"
        width="250" height="250"/>
    <?php endforeach ?>



    </body>
</html>

<style type="text/css">

* {
    margin: 0;
    padding: 0;
    border: none;
    text-decoration: none;
    box-sizing: border-box;
}


#img{
    float: right;
    margin-right: 150px;
    margin-top: -650px;
    border: 1px solid goldenrod;
}

.logo {
    width: 120px; 
    background-image: url(img/Logotipo\ de\ moda\ feminino\ elegante\ branco.png);
    height: 120px;
    background-size: 120px 120px;
    background-repeat: no-repeat;

}

header {
    width: 100%;
    height: 125px;
    border: 2px solid #000000;
    /* border-radius: 5px; */
    box-shadow: 4px 5px 6px rgba(10, 12, 11, 0.6);
    margin: auto;
    display: flex;
    justify-content: space-evenly;
    background-color: #000000;
}


header>ul {
    min-width: 50%;
    height: 100%;
    display: flex;
    justify-content: end;
    align-items: center;
    background-color: black;
    /* margin-left: 170px; */
}

header>ul>li {
    font-size: 18px;
    list-style-type: none;
    padding: 0;
    margin: 0 15px;
    float: left;
    /* margin-left: 30px; */
    background-color: black;
}

header>ul>li>a:hover {
    color: rgb(255, 0, 0);
    box-shadow: 1px 1px 1px 1px rgba(255, 0, 0, 0.6);
    border-radius: 1px;
    transition: all, 0.5s;
}

header>ul>li>a {
    color: white;
    font-weight: bolder;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    padding: 15px;
    line-height: 100px;
    background-color:black;
}

#nome{
    margin-top: 50px;
    margin-left: 12px;
    font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
}

h2{
    font-size: 20px;
    margin-left: 30px;
}

#center{
    margin-left: 400px;
    margin-top: 10px;
    font-size: 12px;
    
}

.coment{
    border: 1px solid #000000;
    border-radius: 10px;
    outline: none;
    resize: none;
    /* background-color: red; */
}

input[type=submit]{
    
    margin-top: 40px;
    border: 5px solid white;
    border-radius: 2px solid white;
    margin-left: 100px;
}


a {
    color: black;
    text-decoration: none;
    background-color: transparent;
}

button{
    margin-top: 15px;
    border: 5px solid white;
    border-radius: 2px solid white;
}

#acert{
    align-items: center;
    margin-right: 20px;
}

</style>