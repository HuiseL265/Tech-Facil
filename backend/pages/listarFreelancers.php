<?php
    //session_start();
    require('../actions/connect.php');
    include('topo.php');

    $infoFreelancers = mysqli_query($con, "SELECT * FROM `tb_prestador`");

    if(!isset($_SESSION['nomeAdm'])){
       header('location:./login-adm.php');
    };
    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Freelancers</title>

    <link rel="stylesheet" href="../../css/cssBackend/main.css">
    <link rel="stylesheet" href="../../css/cssBackend/tableList.css">

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
            <?php while ($freela = mysqli_fetch_array($infoFreelancers) ) { ?>
            <tr class="table-info">
                <td><?php echo $freela['idUsuario'] ?></td>
                <td><?php echo $freela['nome'] ?></td>
                <td><?php echo $freela['email'] ?></td>
                <td><?php echo $freela['cpf'] ?></td>
            </tr>  
            <?php } ?>
            
        </table>
    </div>
</body>
</html>