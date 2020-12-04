<?php 

require("../SQL Server/connectsql.php");

$userId = $_GET['userId'];

$params = array();
$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );

$queryEsc = sqlsrv_query($con, "SELECT * FROM vwEscolaridade WHERE idUsuario = $userId",$params,$options);

if(!sqlsrv_num_rows($queryEsc) >= 1){
    echo "<p style='font-size:14px;'>Você ainda não possui escolaridades cadastradas, adicione uma!</p>";
}else{
while($escolaridade = sqlsrv_fetch_array($queryEsc,SQLSRV_FETCH_ASSOC)){
    echo"
    <ul class='escolaridades'>
            <li>
                <h5>Nivel de formação: </h5>
                <p>".$escolaridade['Formacao']."</p>
            </li>
            
            <li>
                <h5>Instituição: </h5>
                <p>".$escolaridade['Instituicao']."</p>
            </li>

            <li>
                <h5>Curso: </h5>
                <p>".$escolaridade['Curso']."</p>
            </li>

            <li>
                <h5>Situação: </h5>
                <p>".$escolaridade['Situacao']."</p>
            </li>

            <li>
                <h5>Data de Conclusão: </h5>
                <p>";

                if($escolaridade['conclusaoData'] == NULL or strtotime(date_format($escolaridade['conclusaoData'],"Y-m-d")) < strtotime('1960-01-01')){ 
                    $conclusaoData = '---';
                }else{
                    $conclusaoData = date_format($escolaridade['conclusaoData'],"d/m/Y");
                }

                echo 
                    $conclusaoData."</p>
            </li>
        </ul>
        ";
}
}

?>