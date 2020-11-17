<?php
require("SQL Server/connectsql.php");

/* criação das variaveis */
$txt = $_GET['texto'];
$tipo = $_GET['tipo'];
$wlikeStatus = "";
$wlikeContexto = "";
$wlikeProblem = "";

/* filtro para saber qual tipo de busca irá fazer */
switch($tipo){
    case "status":
        $wlikeStatus = "WHERE Tb_RequisicaoProblema.Status LIKE '%$txt%'";
    break;

    case "tipoProblema":
        $wlikeProblem = "WHERE Tb_RequisicaoProblema.tipoProblema LIKE '%$txt%'";
    break;

    case "busca":
        $wlikeContexto = "WHERE Tb_RequisicaoProblema.Contexto LIKE '%$txt%'";
    break;
}

if($txt == null or $txt == ""){
    $wlikeStatus = "";
    $wlikeContexto = "";
    $wlikeProblem = "";
}

$params = array();
$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );

if(!$lista = sqlsrv_query($con, "SELECT 
Tb_Contratante.idContratante as ID_Contratante,
Tb_RequisicaoProblema.idRequisicao as ID_Requisicao,
Tb_Usuario.Nome,
Tb_RequisicaoProblema.Status,
Tb_RequisicaoProblema.tipoProblema as Tipo_Problema,
Tb_RequisicaoProblema.Contexto
FROM Tb_RequisicaoProblema
INNER JOIN Tb_Contratante
ON Tb_Contratante.idContratante = Tb_RequisicaoProblema.idContratante
LEFT JOIN Tb_Usuario
ON Tb_Usuario.idUsuario = Tb_Contratante.idUsuario
$wlikeStatus $wlikeContexto $wlikeProblem", $params, $options)){
    echo "<p style=font-size:12px>*Nenhum resultado encontrado</p>";
}else{
    if(sqlsrv_num_rows($lista) >= 1 or sqlsrv_num_rows($lista) != false){
        while ($conteudo = sqlsrv_fetch_array($lista, SQLSRV_FETCH_ASSOC)){
            echo "<div class='lista-conteudo' onclick=detalhar(". $conteudo['ID_Requisicao'] .")>";
            echo "<h5>".utf8_encode($conteudo['Tipo_Problema'])."</h5>";
            echo "<p class='lista-status'>".trim(utf8_encode($conteudo['Status']))."</p>";
            echo "<p class='lista-desc'>".utf8_encode($conteudo['Contexto'])."</p>";
            echo "</div>";
        }
    }else{
        echo "<p style=font-size:12px>*Nenhum pedido encontrado</p>";
    }
}
?>