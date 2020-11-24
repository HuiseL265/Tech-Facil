<?php
require("SQL Server/connectsql.php");

/*criação das variaveis*/
$idRequisicao = $_GET['idRequisicao'];

$params = array();
$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );

if($query = sqlsrv_query($con, "SELECT * FROM vwRequisicao WHERE idRequisicao = $idRequisicao", $params, $options)){
    if(sqlsrv_num_rows($query) === 1){
        $conteudo = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC);
        
            echo"
            <div id='topo-cont'>
                <div id='nome-cont'>
                    <h4>".utf8_encode($conteudo['Tipo_Problema'])."</h4>
                    <p>".utf8_encode($conteudo['Status'])."</p>
                </div>               
            </div>

            <div id='pedido-cont'>
                <ul id='info-pedido'>
                    <li>
                        <h5>Contratante: </h5>
                        <p>".utf8_encode($conteudo['Nome'])."</p>
                    </li>
                    <li>
                        <h5>Tipo do Pedido: </h5>
                        <p>".utf8_encode($conteudo['Tipo_Problema'])."</p>
                    </li>
                    <li>
                        <h5>Situação: </h5>
                        <p class='detail-status'>".utf8_encode($conteudo['Status'])."</p>
                    </li>
                </ul>
                <h4>Descrição</h4>
                <div id='descricao-pedido'>".utf8_encode($conteudo['Contexto'])."</div>
            </div>
            ";        
    }
}else{
    echo "<p style=font-size:12px;>*Falha ao carregar a requisição.</p>";
}


?>