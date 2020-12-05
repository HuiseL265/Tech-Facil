<?php

require("../SQL Server/connectsql.php");

$userId = $_GET['userId'];

$params = array();
$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );

$queryCur = sqlsrv_query($con, "SELECT * FROM vwCurso WHERE idUsuario = $userId",$params,$options);

if(!sqlsrv_num_rows($queryCur) >= 1){
    echo "<p style='font-size:14px;'>Você ainda não possui cursos cadastrados, adicione uma!</p>";
}else{
while($cursos = sqlsrv_fetch_array($queryCur,SQLSRV_FETCH_ASSOC)){
    echo"
    <ul class='cursos'>
            <li>
                <h5>Formação: </h5>
                <p>".$cursos['nivelFormacao']."</p>
            </li>
            
            <li>
                <h5>Instituição: </h5>
                <p>".$cursos['Instituicao']."</p>
            </li>

            <li>
                <h5>Curso: </h5>
                <p>".$cursos['Curso']."</p>
            </li>

            <li>
                <h5>Data de conclusão: </h5>
                <p>";

                if($cursos['conclusaoData'] == NULL or strtotime(date_format($cursos['conclusaoData'],"Y-m-d")) < strtotime('1960-01-01')){ 
                    $conclusaoData = '---';
                }else{
                $conclusaoData = date_format($cursos['conclusaoData'],"d/m/Y");
                }

                echo $conclusaoData."</p>
            </li>

            <li>
                <h5>Código da credencial: </h5>
                <p>";
                
                if($cursos['Credencial'] == NULL){
                    $cursos['Credencial'] = '(Não possui)';
                }

                echo                
                    $cursos['Credencial']."
                </p>
            </li>";


                $cursos['Instituicao'] = str_replace(" ","_",$cursos['Instituicao']);
                $cursos['Curso'] = str_replace(" ","_",$cursos['Curso']);

            echo "

            <li>
                <button class='exc-Curriculo' onclick=excCur(".$cursos['idCurriculo'].",`".$cursos['Instituicao']."`,`".$cursos['Curso']."`)> 
                    Excluir
                </button>
            </li>
        </ul>
        ";
}
}

?>