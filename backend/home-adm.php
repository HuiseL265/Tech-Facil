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

    <link rel="stylesheet" href="../css/CssBackend/NavTopoStyle.css">

    <script>
        window.onload = function() {

            logado = document.getElementById("logado-adm");
            exitBtn = document.getElementById("deslogar-adm");
            
            logado.addEventListener("click", function(){ 
                document.getElementById("opcoes-logado-adm").style.display = "flex";
            });

            exitBtn.addEventListener("click",function(){
                window.location.href = "sair.php";
            });

        };
    </script>
</head>
<body>
    
    <div id="container-topo">
        <ul id="nav-topo">
            <li>Home</li>
            <li>Usuários</li>
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