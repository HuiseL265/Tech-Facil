<?php
    require("../SQL Server/connectsql.php");

    $userId =  $_POST['userId'];
    $tipoFormacao = $_POST['tipoFormacao'];
    $instituicao = $_POST['instituicao'];
    $curso = $_POST['curso'];
    $conclusaoData = $_POST['conclusaoData'];
    $credencial = $_POST['credencial'];

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

    if(!sqlsrv_query($con, "INSERT INTO Tb_Cursos (idCurriculo,nivelFormacao,instituicao,curso,conclusaoData,codCertificado) 
        VALUES($curriculo[idCurriculo], '$tipoFormacao', '$instituicao', '$curso', '$conclusaoData', '$credencial')" )){
            //reservado para redirecionar ao perfil com o erro.
        }

?>