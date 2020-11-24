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
        $wlikeStatus = "WHERE Status LIKE '%$txt%'";
    break;

    case "tipoPedido":
        $wlikeProblem = "WHERE Tipo_Problema LIKE '%$txt%'";
    break;

    case "busca":
        $wlikeContexto = "WHERE Contexto LIKE '%$txt%'";
    break;
}

if($txt == null or $txt == ""){
    $wlikeStatus = "";
    $wlikeContexto = "";
    $wlikeProblem = "";
}

$params = array();
$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );

if(!$lista = sqlsrv_query($con, "SELECT * FROM vwRequisicao 
$wlikeStatus $wlikeContexto $wlikeProblem", $params, $options)){
    echo "<p style=font-size:12px>*Nenhum resultado encontrado</p>";
}else{
    if(sqlsrv_num_rows($lista) >= 1 or sqlsrv_num_rows($lista) != false){
        while ($conteudo = sqlsrv_fetch_array($lista, SQLSRV_FETCH_ASSOC)){
            echo "<div class='lista-conteudo' onclick=detalhar(". $conteudo['idRequisicao'] .")>";
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