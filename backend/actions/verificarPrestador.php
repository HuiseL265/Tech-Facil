<?php
require('SQL Server/connectsql.php');

$aval = $_GET['aval'];
$id = $_GET['idVer'];
$just = $_GET['just'];

switch($aval){
    case 1:
        if(!$query = sqlsrv_query($con, "UPDATE Tb_Verificacao 
        SET Status = 'Aceito' , descricao = null
        WHERE idVerificacao = $id")){
            echo "ERRO";
        }else{
            echo $aval;
        }
    break;

    case 2:
        if($just != "" and $just != null){
            if(!$query = sqlsrv_query($con, "UPDATE Tb_Verificacao 
            SET Status = 'Negado',descricao = '$just' 
            WHERE idVerificacao = $id")){
                echo "ERRO";
            }else{
                echo $aval;
            }
        }else{
            //lembrar de colocar uma resposta caso não haja justificativa *
        }  
    break;
}


?>