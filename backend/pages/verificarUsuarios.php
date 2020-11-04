<?php
require("../actions/SQL Server/connectsql.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificar Usuarios</title>

    <link rel="stylesheet" href="../../css/cssBackend/topo.css">
    <link rel="stylesheet" href="../../css/cssBackend/tableUsers.css">
    <link rel="stylesheet" href="../../css/cssBackend/verifyUsers.css">
    
    <script>
        window.onload = function() {

            exitBtn = document.getElementById("deslogar-adm");

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
            });

        };
    </script>
</head>
<body>

<?php
include("topo.php");
?>
    
    <?php
        
    if(!$prestadores = sqlsrv_query($con, "SELECT * FROM Tb_Verificacao
    INNER JOIN Tb_PrestadorDeServico
    ON Tb_PrestadorDeServico.idVerificacao = Tb_Verificacao.idVerificacao
    LEFT JOIN Tb_Usuario
    ON Tb_Usuario.idUsuario = Tb_PrestadorDeServico.idUsuario")){
        echo "Erro, não foi possível extrair os dados da tabela";
        error_reporting(E_ERROR | E_PARSE);
    }else{

     //criação dos identificados das colunas
    echo   "<div class='table-list'>
    <table>
    <tr style=background-color:#3aa47e;>
        <th>ID</th>
        <th>Nome</th>
        <th>CPF</th>               
        <th>STATUS</th>               
    </tr>";

        //realiza a inserção de dados enquanto houver registros.
        while($prestador = sqlsrv_fetch_array($prestadores, SQLSRV_FETCH_ASSOC)){
        echo "<tr class=table-info>";
            echo "<td class=id-ver> ". $prestador['idPrestador'] ." </td>";                
            echo "<td class=nome-ver style=width:150px;>". $prestador['Nome'] ."</td>";
            echo "<td> ". $prestador['CPF'] ." </td>";  
            echo "<td class=status-ver style=font-weight:bold;width:100px;>Pendente</td>"; 
        echo "</tr>"; 
        }

    echo "</table>";
    echo "</div>";   
    }

    ?>

    <div class="popup-ver">

    </div>

</body>
</html>