<?php

require("../SQL Server/connectsql.php");

$userId = $_GET['userId'];

$params = array();
$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );

$queryHab = sqlsrv_query($con, "SELECT * FROM vwHabilidade WHERE idUsuario = $userId",$params,$options);

if(!sqlsrv_num_rows($queryHab) >= 1){
    echo "<p style='font-size:14px;'>Você ainda não possui habilidades cadastradas, adicione uma!</p>";
}else{
    while($habs = sqlsrv_fetch_array($queryHab,SQLSRV_FETCH_ASSOC)){
        echo "
            <div class='habilidades'>
                <p>".$habs['habilidade']."</p>";

                $habs['habilidade'] = str_replace(" ","_",$habs['habilidade']);

                echo "
                <button class='exc-hab' onclick=excHab(".$habs['idCurriculo'].",'". $habs['habilidade']."')>X</button>
            </div>
            ";
    }
}

?>