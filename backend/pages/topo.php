<?php
 session_start();

 if(!isset($_SESSION['nomeAdm'])){
    header('location:./login-adm.php');
 };
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../../css/cssBackend/topo.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        window.onload = function() {

            logado = document.getElementById("logado-adm");
            exitBtn = document.getElementById("deslogar-adm");
            opcoesUsuario = document.getElementById("opcoes-logado-adm");
            
            logado.addEventListener("click", function(){ 
                $('#opcoes-logado-adm').toggleClass('opcoes-logado-adm-enabled');
            });

            exitBtn.addEventListener("click",function(){
                window.location.href = "../actions/sair.php";
            });

        };
    </script>
</head>
<body>
    
    <div id="container-topo">
        <ul id="nav-topo">
            <li><a href="home-adm.php">Home</a></li>
            <li><a href="listarUsers.php">Usuários</a></li>
            <li><a href="listarFreelancers.php">Freelancers</a></li>
            <li><a href="verificarUsuarios.php">Verificar FL</a></li>
        </ul>

        <div id="logado-adm">
            <p>
                <?php echo $_SESSION['nomeAdm'] ?>
            </p>

            <div id="logado-foto"></div>

            <div id="opcoes-logado-adm">
                <ul>
                    <li id="deslogar-adm">Sair</li>
                </ul>
            </div>
        </div>
    </div>

</body>
</html>