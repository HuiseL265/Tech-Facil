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

        function slcPrestador(id){
            document.getElementById("popup-ver").style.display = "grid";
            
            var nome = document.querySelector("#prestador"+id+" .nome-ver").innerHTML;
            var status = document.querySelector("#prestador"+id+" .status-ver").innerHTML;
            var email = document.querySelector("#prestador"+id+" .email-ver").innerHTML;
            var cpf = document.querySelector("#prestador"+id+" .cpf-ver").innerHTML;

                document.querySelector(".nome-prest").innerHTML = nome;
                document.querySelector(".status-prest").innerHTML = status;

                document.querySelector("#info-prest #nome-prest").innerHTML = nome;
                document.querySelector("#info-prest #email-prest").innerHTML = email;
                document.querySelector("#info-prest #cpf-prest").innerHTML = cpf;

            nome = nome.split(" ");
            document.querySelector("#foto-prest img").src = "../../img/prestadores/ver_" + id + nome[0] + ".png";
        }

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
    ON Tb_Usuario.idUsuario = Tb_PrestadorDeServico.idUsuario
    LEFT JOIN Tb_Contato
    ON Tb_Usuario.idUsuario = Tb_Contato.idUsuario")){
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
        echo "<tr class=table-info onclick=slcPrestador(". $prestador['idPrestador'] .") id=prestador".$prestador['idPrestador'].">";
            echo "<td class=id-ver> ". $prestador['idPrestador'] ." </td>";                
            echo "<td class=nome-ver style=width:150px;>". $prestador['Nome'] ."</td>";
            echo "<td class=cpf-ver> ". $prestador['CPF'] ." </td>";  
            echo "<td class=status-ver style=font-weight:bold;width:100px;>". $prestador['Status'] ."</td>"; 
            
            echo "<td class='no-see email-ver'>". $prestador['Email'] ."</td>";
        echo "</tr>"; 
        }

    echo "</table>";
    echo "</div>";   
    }

    ?>

    <div id="popup-ver">
        <div id="foto-prest">
            <img src="" alt="foto do prestador">
            <p class="nome-prest" style="font-weight: bold;"></p>
            <p class="status-prest" style="text-transform: capitalize;"></p>
        </div>
        <div id="info-prest">
            <table>
                <tr>
                    <td>Nome: </td>
                    <td><p id="nome-prest"></p></td>                    
                </tr>

                <tr>
                    <td>Email: </td>
                    <td><p id="email-prest"></p></td>                    
                </tr>

                <tr>
                    <td>CPF: </td>
                    <td><p id="cpf-prest"></p></td>                    
                </tr>
            </table>            
        </div>
    </div>

</body>
</html>