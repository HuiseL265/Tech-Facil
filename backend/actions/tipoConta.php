<?php 
    session_start();
    require('SQL Server/connectsql.php');

    $params = array();
    $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
    $tipoUsuario = sqlsrv_query($con, "SELECT tipoUsuario FROM Tb_Usuario WHERE Email = '$_SESSION[Email]'", $params, $options);
    $tipoUsuario= sqlsrv_fetch_array($tipoUsuario);

        if ($tipoUsuario[0] == 'Contratante') {
            $_SESSION['contratante'] = $tipoUsuario[0];
        echo $tipoUsuario[0];

        } else if ($tipoUsuario[0] == 'Prestador') {
            $_SESSION['prestador'] = $tipoUsuario[0];
        echo $tipoUsuario[0];

        } else {
            $_SESSION['adm'] = $tipoUsuario[0];
        }

        echo $tipoUsuario[0];
?>