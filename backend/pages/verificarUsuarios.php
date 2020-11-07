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
            //print_r ($prestador);
        echo "<tr class=table-info onclick=slcPrestador(". $prestador['idPrestador'] .") id=prestador".$prestador['idPrestador'].">";
            echo "<td class=id-ver> ". $prestador['idPrestador'] ." </td>";                
            echo "<td class=nome-ver style=width:150px;>". $prestador['Nome'] ."</td>";
            echo "<td class=cpf-ver> ". $prestador['CPF'] ." </td>";  
            echo "<td class=status-ver style=font-weight:bold;width:100px;>". $prestador['Status'] ."</td>"; 
            
            echo "<td class='no-see email-ver'>". $prestador['Email'] ."</td>";
            echo "<td class='no-see email2-ver'>". $prestador['EmailSecundario'] ."</td>";
            echo "<td class='no-see tel-ver'>". $prestador['Telefone1'] ."</td>";
            echo "<td class='no-see tel2-ver'>". $prestador['Telefone2'] ."</td>";
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
            <p class="status-prest" style="text-transform: capitalize; font-weight:600;"></p>
        </div>
        <div id="info-prest">  
        <ul>
            <li>
                <h4 style="color:rgb(105, 214, 241);">Informações Pessoais</h4>
            </li>
            <li>
                <p>Nome:</p>
                <p id="nome-prest"></p>
            </li>

            <li>
                <p>Email:</p>
                <p id="email-prest"></p>
            </li>

            <li>
                <p>CPF:</p>
                <p id="cpf-prest"></p>
            </li>

            <li>
                <h4 style="color:rgb(105, 214, 241);">Contatos</h4>
            </li>

            <li>
                <p>Email Secundário:</p>
                <p id="email2-prest"></p>
            </li>

            <li>
                <p>Telefone:</p>
                <p id="tel-prest"></p>
            </li>

            <li>
                <p>Telefone (2):</p>
                <p id="tel2-prest"></p>
            </li>
        </ul>   
        
        <div id="close-pop" alt="fechar">X</div>    
        <div id="buttons-val">
            <button id="recusarP" style="background-color: rgb(182, 80, 80);" onclick="Aval(2)">RECUSAR</button>
            <button id="aceitarP" style="background-color: rgb(81, 185, 128);" onclick="Aval(1)">ACEITAR</button>
        </div>          
        </div>
          

    </div>

    <script src="../js/verifyUser.js"></script>
    <script>
        $(document).ready(function(){
            //Verificar Status para alteração da cor
            var collection = $(".status-ver");
            CorStatus(collection);

            popup = document.getElementById("popup-ver");
            closepop = document.getElementById("close-pop");
            closepop.addEventListener("click",function(){
                popup.style.display = "none";
            });

        });

    </script>

</body>
</html>