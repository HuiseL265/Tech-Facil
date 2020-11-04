<?php
    include('topo.php');

    $infoUsers = sqlsrv_query($con, "SELECT * FROM `Tb_Usuario`");   
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Usuários</title>

    <link rel="stylesheet" href="../../css/cssBackend/topo.css">
    <link rel="stylesheet" href="../../css/cssBackend/main.css">
    <link rel="stylesheet" href="../../css/cssBackend/tableUsers.css">

</head>
<body>
    <div class="table-list">
        <table>
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>EMAIL</th>
                <th>CPF</th>
            </tr>
            <?php while ($user = sqlsrv_fetch_array($infoUsers) ) { ?>
            <tr class="table-info">
                <td><?php echo $user['idUsuario'] ?></td>
                <td><?php echo $user['nome'] ?></td>
                <td><?php echo $user['email'] ?></td>
                <td><?php echo $user['cpf'] ?></td>
            </tr>  
            <?php } ?>
            
        </table>
    </div>
</body>
</html>