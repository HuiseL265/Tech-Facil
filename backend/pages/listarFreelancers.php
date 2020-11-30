<?php
    require('../actions/SQL Server/connectsql.php');

    
    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Freelancers</title>

    <link rel="stylesheet" href="../../css/backend css/topo.css">
    <link rel="stylesheet" href="../../css/backend css/main.css">
    <link rel="stylesheet" href="../../css/backend css/table-model.css">

</head>
<body>

<?php
include('topo.php');
?>

    <div class="table-list" style="margin:150px auto;display:flex;justify-content:center;">
        <table>
            <tr style="background-color:#3a3ba4;">
                <th>ID</th>
                <th>NOME</th>
                <th>EMAIL</th>
                <th>CPF</th>
            </tr>
            <?php
            if(!$infoFreelancers = sqlsrv_query($con, "SELECT 
            Tb_PrestadorDeServico.idPrestador as ID_Prestador,
            Tb_Usuario.Nome,
            Tb_Usuario.CPF,
            Tb_Usuario.Email,
            Tb_Usuario.dataCriacao as DataDeCriacao
            FROM Tb_PrestadorDeServico
            LEFT JOIN Tb_Usuario
            ON Tb_Usuario.idUsuario = Tb_PrestadorDeServico.idUsuario")){
                echo "erro na query";
            }else{
        
            while ($freela = sqlsrv_fetch_array($infoFreelancers, SQLSRV_FETCH_ASSOC)){ ?>
            <tr class="table-info">
                <td><?php echo $freela['ID_Prestador'] ?></td>
                <td><?php echo $freela['Nome'] ?></td>
                <td><?php echo $freela['Email'] ?></td>
                <td><?php echo $freela['CPF'] ?></td>
            </tr>  
            <?php } }?>
            
        </table>
    </div>
</body>
</html>