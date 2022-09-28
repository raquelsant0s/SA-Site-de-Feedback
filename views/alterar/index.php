<?php 

session_start();

require_once('../../config/Conexao.php');
require_once('../../dao/UserDao.php');
require_once('../../model/Usuario.php');

//instancia as classes
$usuario = new Usuario();
$userdao = new UserDao();

$login = new UserDao();

if(!$login->checkLogin()) {
    header("Location: ../login");
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title> Alterar Usuário </title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>

<header>
        <div class="logo"></div>
        <ul>
            <li> <a href="../../"> HOME </a></li>
            <li> <a href="../../controller/UsuarioController.php?logout=true"> LOGOUT</a> </li>
        </ul>
</header>

<body link="black" alink="black" vlink="black">
<div id="center">
    <br/><br/><h2> Alterar Usuário </h2><br/><br/>

    <fieldset style="border:1px solid red; width:800px;">

        <?php foreach ($userdao->editar() as $usuario) : ?>

            <form action="../../controller/UsuarioController.php" method="post" name="cad">
                <br/><label> Nome: </label>
                <input type="hidden" id="id_edit" name="id_edit" value="<?= $usuario->getID() ?>" />
                <input type="text" id="nome" name="nome" value="<?= $usuario->getNome() ?>" required />
                <br/> <br/>
                <label> CPF: </label>
                <input type="text" id="cpf" name="cpf" value="<?= $usuario->getCPF() ?>" required />
                <br/> <br/>
                <label> E-mail: </label>
                <input type="email" id="mail" name="mail" value="<?= $usuario->getEmail()?>"  required />
                <br/> <br/>
                <label> Sexo: </label>
                <select id="sexo" name="sexo">
                    <option value="">--Selecione--</option>
                    <option value="M" <?php echo $usuario->getSexo() == "M" ? "selected" : ""?>> Masculino </option>
                    <option value="F" <?php echo $usuario->getSexo() == "F" ? "selected" : ""?>> Feminino </option>
                    <option value="O" <?php echo $usuario->getSexo() == "O" ? "selected" : ""?>> Outro </option>
                </select>
                <br/> <br/>
                <label> Nova Senha: </label>
                <input type="password" id="senha" name="senha" required />
                <br/> <br/>
                <input type="submit" id="alterar" name="alterar" value="Alterar" />
                <button> <a href="../listar/" style="text-decoration:none;"> VOLTAR </a> </button>
        </form>
        <?php endforeach ?>
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
}

input[type="email"]{
    border-bottom: 1px solid #000000;
    outline: none;
}

input[type="password"]{
    border-bottom: 1px solid #000000;
    outline: none;
}

        </style>