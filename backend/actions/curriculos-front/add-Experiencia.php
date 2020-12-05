<?php
    require("../SQL Server/connectsql.php");

    $userId =  $_POST['userId'];
    $empresa = $_POST['empresa'];
    $funcao = $_POST['funcao'];
    $atividades = $_POST['atividades'];
    $dataEntrega = $_POST['dataEntrada'];
    $dataSaida = $_POST['dataSaida'];

    $params = array();
    $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );

    $queryGet = sqlsrv_query($con, "SELECT idPrestador FROM Tb_PrestadorDeServico WHERE idUsuario = $userId",$params,$options);

    $prestador = sqlsrv_fetch_array($queryGet,SQLSRV_FETCH_ASSOC);

    $queryGet = sqlsrv_query($con, "SELECT idCurriculo FROM Tb_Curriculo WHERE idPrestador = $prestador[idPrestador]",$params,$options);
    //se o prestador não houver um idCurriculo, cadastrar.
    if(sqlsrv_num_rows($queryGet) == 0){
        sqlsrv_query($con, "INSERT INTO Tb_Curriculo (idPrestador) VALUES ($prestador[idPrestador])");
        $queryGet = sqlsrv_query($con, "SELECT idCurriculo FROM Tb_Curriculo WHERE idPrestador = $prestador[idPrestador]",$params,$options);
    } 

    $curriculo = sqlsrv_fetch_array($queryGet,SQLSRV_FETCH_ASSOC);

    if(!sqlsrv_query($con, "INSERT INTO Tb_Experiencia (idCurriculo,nomeEmpresa,atividades,funcao,dataEntrada,dataSaida) 
        VALUES($curriculo[idCurriculo], '$empresa', '$atividades', '$funcao', '$dataEntrega', '$dataSaida')" )){
            //reservado para redirecionar ao perfil com o erro.
        }

?>