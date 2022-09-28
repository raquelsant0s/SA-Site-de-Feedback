<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LUXURIOUS SIN</title>
    <link rel='stylesheet' type='text/css' media='screen' href='suporte.css'>

</head>

<body link="black" alink="black" vlink="black">

    <header>
        <div class="logo"></div>
        <ul>
            <li> <a href="../../"> HOME </a> </li>
            <li> <a href="./suporte.php"> SOBRE </a> </li>
            <li> <a href="../../controller/UsuarioController.php?logout=true"> LOGOUT </a> </li>
            
        </ul>
    </header>
    
    <div id="center">

        <section id="nome">
            <h2> SOBRE & CONTATO </h2>
        </section>
       

        <label> Nome Completo: <font color="red">*</font></label>
        <input type="text" id="nome" name="nome" placeholder="Digite seu nome" required/>
        <br/><br/>

        <label> Digite seu e-mail: <font color="red">*</font></label>
        <input type="email" id="e-mail" name="e-mail"  placeholder="Digite seu E-mail" required />
        <br/><br/>

        <label>Deixe seu Telefone: <font color="red">*</font></label>
        <input type="tel" id="telefone" name="telefone"  placeholder="Digite seu Telefone" />
        <br/><br/>

        <label> Deixe um comentário: <font color="red">*</font></label><br/><br/><br/>
        <textarea id="coment" maxlength="240" placeholder="Máximo 240 caracteres" required></textarea>
        <br/><br/>

       

        </section>

                 <input type="submit" id="enviar" name="enviar" value="ENVIAR" /> 
                 <button> <a href="../home/index.html" style="text-decoration:none;"> VOLTAR </a> </button>

                 <br><br>

                <section class="row" id="sup">
                    <p><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                      </svg> E-mail:adm@lux.com
                    <id="logoredes"><ion-icon name="logo-instagram"></ion-icon>@luxuriossinadm
                    <id="logoredes"><ion-icon name="logo-facebook"></ion-icon>Luxurios Sin
                    <id="logoredes"><ion-icon name="logo-twitter"></ion-icon>LSS</p>
                </section>

    </div>

</body>

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"> </script>

</html>


<style type="text/css">

* {
    margin: 0;
    padding: 0;
    border: none;
    text-decoration: none;
    box-sizing: border-box;
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
    margin-left: 15px;
    font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
}

#coment{
    border: 1px solid #000000;
    border-radius: 10px;
    outline: none;
    resize: none;
    /* background-color: red; */
}

#acert{
    align-items: center;
    margin-right: 50px;
}

form{
    margin-right: 50px;
}

#center{
    margin-left: 600px;
    margin-top: 10px;
}

textarea{
    width: 250px;
    height: 150px;
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

#sup{
    margin-right: 300px;
    justify-items: center;
}

button{
    margin-top: 15px;
    border: 5px solid white;
}
</style>