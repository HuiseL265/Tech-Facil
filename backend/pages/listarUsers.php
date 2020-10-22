<?php
    //session_start();
    require('../actions/connect.php');

    include('topo.php');

    $infoUsers = mysqli_query($con, "SELECT * FROM `tb_usuario`");

    if(!isset($_SESSION['nomeAdm'])){
       header('location:./login-adm.php');
    };
    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Usuários</title>

    <link rel="stylesheet" href="../../css/cssBackend/main.css">
    <link rel="stylesheet" href="../../css/cssBackend/tableList.css">

</head>
<body>
    <div class="tableContainer">
        <table>
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>EMAIL</th>
                <th>CPF</th>
            </tr>
            <?php while ($user = mysqli_fetch_array($infoUsers) ) { ?>
            <tr>
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