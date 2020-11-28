<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/frontend css/home.css">
    <link rel="stylesheet" href="css/frontend css/main.css">    
    <link rel="stylesheet" href="css/frontend css/rodape.css">
</head>
<body>

    <?php include('main.php') ?>
 
        <div id="cont-topo">

            <div id="cont-cadastro">

                <form action="cadastro.php" method="post">
                    <ul>
                        <li><p>Cadastrar-se</p></li>
                        <li><input type="text" id="nome" name="nome" required="required" placeholder="Nome Completo"></li>
                        <li><input type="email" id="email" name="email" required="required" placeholder="Email"></li>
                        <li><input type="password" name="senha"  id="senha" required="required" placeholder="Senha"></li>
                        <li><input type="password" name="senha2" id="senha2" required="required" placeholder="Confirmar Senha"></li>
                        <li><button type="submit" id="confirm">cadastrar</button></li>
                    </ul>       
                </form>

            </div>          
        </div>

        <div id="avalUsers-cont">
            <div id="avalUser-foto">
                <img src="./img/contratantes img/senhora.png" alt="">
            </div>
            <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt 
                out labore et dolore magna aliqua."</p>
        </div>
            

        <?php include('rodape.php') ?>
</body>
</html>