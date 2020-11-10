<?php
require('SQL Server/connectsql.php');

$aval = $_GET['aval'];
$id = $_GET['idPrest'];

switch($aval){
    case 1:
        if(!$query = sqlsrv_query($con, "UPDATE Tb_Verificacao 
        SET Status = 'Aceito' 
        FROM Tb_PrestadorDeServico
        WHERE Tb_Verificacao.idVerificacao = Tb_PrestadorDeServico.idVerificacao")){
            echo "ERRO";
        }else{
            echo $aval;
        }
    break;

    case 2:
        if(!$query = sqlsrv_query($con, "UPDATE Tb_Verificacao 
        SET Status = 'Negado' 
        FROM Tb_PrestadorDeServico
        WHERE Tb_Verificacao.idVerificacao = Tb_PrestadorDeServico.idVerificacao")){
            echo "ERRO";
        }else{
            echo $aval;
        }
    break;
}


?>