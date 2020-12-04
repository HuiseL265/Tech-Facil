<?php

require("../SQL Server/connectsql.php");

$userId = $_GET['userId'];

$params = array();
$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );

$queryExp = sqlsrv_query($con, "SELECT * FROM vwExperiencia WHERE idUsuario = $userId",$params,$options);

if(!sqlsrv_num_rows($queryExp) >= 1){
    echo "<p style='font-size:14px;'>Você ainda não possui experiências cadastradas, adicione uma!</p>";
}else{
while($experiencias = sqlsrv_fetch_array($queryExp,SQLSRV_FETCH_ASSOC)){
    echo"
    <ul class='experiencias'>
            <li>
                <h5>Nome da empresa: </h5>
                <p>".utf8_encode($experiencias['nomeEmpresa'])."</p>
            </li>
            
            <li>
                <h5>Função: </h5>
                <p>".utf8_encode($experiencias['funcao'])."</p>
            </li>

            <li>
                <h5>Atividades: </h5>
                <p>".utf8_encode($experiencias['atividades'])."</p>
            </li>

            ";

                if($experiencias['dataEntrada'] == NULL){ 
                    $dataEntrada = '---';
                }else{
                    $dataEntrada = date_format($experiencias['dataEntrada'],"d/m/Y");
                }

                if($experiencias['dataSaida'] == NULL or strtotime(date_format($escolaridade['conclusaoData'],"Y-m-d")) < strtotime('1960-01-01')){ 
                    $dataSaida = '---';
                }else{
                    $dataSaida = date_format($experiencias['dataSaida'],"d/m/Y");
                }

                echo"
            <li>
                <h5>Data da entrada: </h5>
                <p>".$dataEntrada."</p>
            </li>

            <li>
                <h5>Data da saída: </h5>
                <p>".$dataSaida."</p>
            </li>
        </ul>
        ";
}
}

?>