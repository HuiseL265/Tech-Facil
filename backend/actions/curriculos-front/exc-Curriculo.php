<?php

require("../SQL Server/connectsql.php");

$tipo = $_POST['tipo'];

switch($tipo){
    case "hab":
        $habilidade = $_POST['habilidade'];
        $habilidade = str_replace("_"," ",$habilidade);

        $idCurriculo = $_POST['idCurriculo'];
        sqlsrv_query($con, "DELETE FROM Tb_Habilidades WHERE idCurriculo = $idCurriculo AND habilidade = '$habilidade'");
    break;

    case "esc":
        $idCurriculo = $_POST['idCurriculo'];
        $instituicao = $_POST['instituicao'];
        $curso = $_POST['curso'];

        $instituicao = str_replace("_"," ",$instituicao);
        $curso = str_replace("_"," ",$curso);

        sqlsrv_query($con, "DELETE FROM Tb_Escolaridade WHERE idCurriculo = $idCurriculo AND instituicao = '$instituicao' AND curso = '$curso'");
    break;

    case "exp":
        $idCurriculo = $_POST['idCurriculo'];
        $nomeEmpresa = $_POST['nomeEmpresa'];
        $funcao = $_POST['funcao'];

        $nomeEmpresa = str_replace("_"," ",$nomeEmpresa);
        $funcao = str_replace("_"," ",$funcao);

        sqlsrv_query($con, "DELETE FROM Tb_Experiencia WHERE idCurriculo = $idCurriculo AND nomeEmpresa = '$nomeEmpresa' AND funcao = '$funcao'");
    break;

    case "cur":
        $idCurriculo = $_POST['idCurriculo'];
        $instituicao = $_POST['instituicao'];
        $curso = $_POST['curso'];

        $instituicao = str_replace("_"," ",$instituicao);
        $curso = str_replace("_"," ",$curso);

        echo $curso;
        echo $instituicao;
        echo $idCurriculo;

        sqlsrv_query($con, "DELETE FROM Tb_Cursos WHERE idCurriculo = $idCurriculo AND instituicao = '$instituicao' AND curso = '$curso'");
    break;
}

?>