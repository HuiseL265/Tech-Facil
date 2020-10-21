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

    <link rel="stylesheet" href="../../css/cssBackend/NavTopoStyle.css">
    <link rel="stylesheet" href="../../css/cssBackend/verificacoes-style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        window.onload = function() {

            logado = document.getElementById("logado-adm");
            exitBtn = document.getElementById("deslogar-adm");
            opcoesUsuario = document.getElementById("opcoes-logado-adm");
            
            logado.addEventListener("click", function(){ 
                if(opcoesUsuario.style.display == "none"){
                    opcoesUsuario.style.display = "flex";
                }else{
                    opcoesUsuario.style.display = "none";
                }
            });

            exitBtn.addEventListener("click",function(){
                window.location.href = "sair.php";
            });

            //Verificar Status para alteração da cor
            var collection = $(".status-ver");

            collection.each(function(index,element) {
                switch(element.innerHTML){
                    case "Pendente":
                    element.classList.add("status-orange");
                    break;

                    case "Negado":
                    element.classList.add("status-red");
                    break;

                    case "Confirmado":
                    element.classList.add("status-green");
                    break;
                }

                /*if(element.innerHTML == "Pendente"){
                    element.classList.add("status-orange");
                }*/
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

    <?php
    require('../actions/connect.php');
    
    if(!$usuarios = mysqli_query($con, "SELECT * FROM `tb_adminssistradores`")){
        //echo "Erro, não foi possível extrair os dados da tabela";
        error_reporting(E_ERROR | E_PARSE);
    }
    
    //criação dos identificados das colunas
    echo   "<div class='table-usuarios-ver'>
            <table>
            <tr>
                <th>ID</th>
                <th>Status</th>
                <th>Nome</th>               
            </tr>";
    
    //realiza a inserção de dados enquanto houver registros.
    //while($usuario = mysqli_fetch_array($usuarios)){
        echo "<tr class=usuario-info>";
            echo "<td class=id-ver> 01 </td>";                
            echo "<td class=status-ver>Confirmado</td>";
            echo "<td class=nome-ver> Vitor Pereira </td>";   
        echo "</tr>"; 

        echo "<tr class=usuario-info>";
            echo "<td class=id-ver> 02 </td>";                
            echo "<td class=status-ver>Pendente</td>";
            echo "<td class=nome-ver> Thiago Frederico </td>";   
        echo "</tr>";

        echo "<tr class=usuario-info>";
            echo "<td class=id-ver> 03 </td>";                
            echo "<td class=status-ver>Negado</td>";
            echo "<td class=nome-ver> Luiz Gustavo </td>";   
        echo "</tr>";
    //}
    echo "</table>";
    echo "</div>";

    ?>

</body>
</html>