<?php
    require('SQL Server/connectsql.php');
    session_start();
    extract($_POST);

    $params = array();
    $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
    $idContratante = sqlsrv_query($con, "SELECT idContratante FROM Tb_Contratante AS cont JOIN Tb_Usuario AS usu ON  cont.idUsuario = usu.idUsuario WHERE usu.Email = '$_SESSION[Email]'", $params, $options);
    $idContratante= sqlsrv_fetch_array($idContratante);

    switch ($TituloOp) {
        case 1:
            $TituloOp = "Problema com Hardware";
        break;

        case 2:
            $TituloOp = "Problema com Software";
        break;

        case 3:
            $TituloOp = $CampoOutros;
        break;
    }

        if ($descricao != '' && $descricao != NULL) {
            sqlsrv_query($con, "INSERT INTO Tb_RequisicaoProblema (idContratante, Contexto, tipoProblema, Status, formaTrabalho, minOrcamento, maxOrcamento) VALUES ('$idContratante[0]', '$descricao', '$TituloOp', 'Aberto', '$Trabalho', '$minOrcamento', '$maxOrcamento')", $params, $options);
        } else {
            echo "ERROR";
            return;
        }
    echo $idContratante[0];
    echo ("</br>");


    echo $TituloOp;
    echo ("</br>");
    
    echo $CampoOutros;
    echo ("</br>");

    echo $minOrcamento;
    echo ("</br>");

    echo $maxOrcamento;
    echo ("</br>");

    echo $Trabalho;
    echo ("</br>");

    echo $descricao;
?>