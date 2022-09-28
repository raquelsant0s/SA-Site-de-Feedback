<?php 

session_start();

require_once('../../config/Conexao.php');
require_once('../../dao/UserDao.php');
require_once('../../model/Usuario.php');

//instancia as classes
$usuario = new Usuario();
$userdao = new UserDao();

$login = new UserDao();

$id = $_SESSION['user_session'];

if(!$login->checkLogin() || $id != 1) {
    header("Location: ../login");
}

?>

<script>

    function deletar() {
        ok = confirm("Tem certeza que deseja deletar estes dados??");
        if(ok){
            return true;
        } else {
            return false;
        }
    }

</script>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title> Listar Usuários </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>

    <header>
        <div class="logo"></div>
        <ul>
            <li> <a href="../../"> HOME </a></li>
            <li> <a href="../../controller/UsuarioController.php?logout=true"> LOGOUT</a> </li>
        </ul>
    </header>

    <body>
    <div id="center">
    <br/><br/><h2> Listar Usuários </h2><br/><br/>

        <table border="0" style="border:1px solid black; width:800px; height: 200px;">
            <tr style="background-color:red;">
                <th>ID</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>E-mail</th>
                <th>Sexo</th>
                <th colspan="2">Ações</th>
            </tr>
            <?php foreach ($userdao->listar() as $usuario) : ?>
            <tr>
                <td><?= $usuario->getID() ?></td>
                <td><?= $usuario->getNome() ?></td>
                <td><?= $usuario->getCPF() ?></td>
                <td><?= $usuario->getEmail() ?></td>
                <td><?= $usuario->getSexo()?></td>
                <td style="text-align:center;">
                    <form action="../../controller/UsuarioController.php" method="post" name="del">
                        <input type="hidden" id="id_del" name="id_del" value="<?= $usuario->getID() ?>"/>
                        <input type="submit" id="excluir" name="excluir" value="EXCLUIR" style="margin-bottom:-15px; background-color:red;" onclick="return deletar()"/>
                    </form>
                </td>
                <td style="text-align:center;"> 
                    <form action="../alterar/" method="post" name="edit">
                        <input type="hidden" id="id_edit" name="id_edit" value="<?= $usuario->getID() ?>"/>
                        <input type="submit" id="editar" name="editar" value="EDITAR" style="margin-bottom:-15px; background-color:#2E3;"/>
                    </form>
                </td>
            </tr>
            <?php endforeach ?>
        </table>
    </body>
    </div>
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
</style>