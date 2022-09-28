<?php 

session_start();

require_once('../../config/Conexao.php');
require_once('../../dao/ProdutoDao.php');
require_once('../../dao/UserDao.php');
require_once('../../model/Produto.php');

//instancia as classes
$produto = new Produto();
$produtodao = new ProdutoDao();

$login = new UserDao();

$id = $_SESSION['user_session'];

if(!$login->checkLogin()|| $id != 1) {
    header("Location: ../login");
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title> Alterar Produto </title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <script type="text/javascript">
   	
        var mostrarImg = function(event) {
            var ler = new FileReader();
            ler.onload = function(){
                var mostrar = document.getElementById('mostrar');
                mostrar.src = ler.result;
            }
        ler.readAsDataURL(event.target.files[0]);
        }
        
    </script>
</head>

<header>
        <div class="logo"></div>
        <ul>
            <li> <a href="../../"> HOME </a></li>
            <li> <a href="../../controller/UsuarioController.php?logout=true"> LOGOUT</a> </li>
        </ul>
</header>

<body  link="black" alink="black" vlink="black">
<div id="center">
<br/><br/><h2> Alterar Produto </h2><br/><br/>

    <fieldset style="border:1px solid red; width:600px;">

        <?php foreach ($produtodao->editar() as $produto) : ?>
           
            <form action="../../controller/ProdutoController.php" method="post" enctype="multipart/form-data" name="edit">
                <label> Nome: </label>
                <input type="hidden" id="id_alter" name="id_alter" value="<?= $produto->getID() ?>" />
                <input type="text" id="nome" name="nome" value="<?= $produto->getNome() ?>" required />
                <br/> <br/>
                <label> Preço: </label>
                <input type="text" id="valor" name="valor" value="<?= $produto->getValor() ?>" required />
                <br/> <br/>
                <label> Marca: </label>
                <input type="text" id="marca" name="marca" value="<?= $produto->getMarca() ?>" required />
                <br/> <br/>
                <label> Imagem: </label> <br/>
                <img id="mostrar" alt=""> <br/>
                <input type="hidden" id="del_img" name="del_img" value="<?= $produto->getImg() ?>"/>
                <input type="file" name="img" id="img" required onchange="mostrarImg(event)">
                <br/> <br/>
                <input type="submit" id="alterar" name="alterar" value="ALTERAR" />
                <button> <a href="./listar.php" style="text-decoration:none;"> VOLTAR </a> </button>
            </form>
        <?php endforeach ?>
    </fieldset>
</div>
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

#mostrar {
             width: 140px;
             height: 120px;
             margin: 10px;
             border: 1px dashed #CCC;
         }

    img {
    width: 100px;
    height: 80px;
    }

    #center{
    margin-left: 300px;
    margin-top: 10px;
    justify-content: space-evenly;
}

    .logo {
    width: 100px; 
    background-image: url("../listar/logo.png");
    height: 5px;
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

label{
    padding: 30px;
}

input[type="submit"]{
    height: 30px;
    width: 110px;
    background-color: lightgreen;
}

button{
    height: 30px;
    width: 110px;
    background-color: lightcoral;
}

input[type="text"]{
    border-bottom: 1px solid #000000;
    outline: none;
    width: 200px;
}



        </style>