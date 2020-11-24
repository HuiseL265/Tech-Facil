<?php
    include('topo.php'); 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Usuários</title>

    <link rel="stylesheet" href="../../css/backend css/topo.css">
    <link rel="stylesheet" href="../../css/backend css/main.css">
    <link rel="stylesheet" href="../../css/backend css/table-model.css">
    <link rel="stylesheet" href="../../css/backend css/list-users.css">

</head>
<body>

    <div id="container-tables">
        <h4 class="title-content">Filtros</h4>
        <div id="filters-table">
            <label for="todos-filter">
                <input type="radio" name="todos" id="todos-filter" value="todos">
                <p>Todos</p>
            </label>

            <label for="contratantes-filter">
                <input type="radio" name="contratantes" id="contratantes-filter" value="contratantes">
                <p>Contratantes</p>
            </label>

            <label for="prestadores-filter">
                <input type="radio" name="prestadores" id="prestadores-filter">
                <p>Prestadores</p>
            </label>
        </div>

        <h3 class="title-content">Tabela atual</h3>

        <div class="table-list">
            <table>
                <tr>
                    <th>ID</th>
                    <th>NOME</th>
                    <th>EMAIL</th>
                    <th>CPF</th>
                </tr>
                <?php 
                if(!$infoUsers = sqlsrv_query($con, "SELECT * FROM Tb_Usuario WHERE tipoUsuario != 'Prestador'")){
                    echo "erro na query";
                }else{
                    while ($user = sqlsrv_fetch_array($infoUsers, SQLSRV_FETCH_ASSOC)){ ?>
                
                    <tr class="table-info">
                        <td><?php echo $user['idUsuario'] ?></td>
                        <td><?php echo $user['Nome'] ?></td>
                        <td><?php echo $user['Email'] ?></td>
                        <td><?php echo $user['CPF'] ?></td>
                    </tr>  
    
                <?php } } ?>
                
            </table>
        </div>
    </div>
</body>
</html>