<?php
require("SQL Server/connectsql.php");
session_start();

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
$tipoUser = sqlsrv_query($con, "SELECT tipoUsuario FROM Tb_Usuario WHERE Email = '$_SESSION[Email]'", $params, $options);
$tipoUser = sqlsrv_fetch_array($tipoUser);

if(!$lista = sqlsrv_query($con, "SELECT * FROM vwRequisicao 
$wlikeStatus $wlikeContexto $wlikeProblem", $params, $options)){
    echo "<p style=font-size:12px>*Nenhum resultado encontrado</p>";
}else{
    if(sqlsrv_num_rows($lista) >= 1 or sqlsrv_num_rows($lista) != false){
        while ($conteudo = sqlsrv_fetch_array($lista, SQLSRV_FETCH_ASSOC)){
            if ($tipoUser[0] == "Contratante"){
                echo "<div class='lista-conteudo' >";
                echo "<div class='container' onclick='expandir(". $conteudo['idRequisicao'] .")'>";
                echo "<div class= 'info-titulos'>";
                echo "<h5>".$conteudo['Tipo_Problema']."</h5>";
                echo "<p class='lista-status'>".$conteudo['Status']."</p>";
                echo "</div>";
                echo "<p class='lista-desc'>".$conteudo['Contexto']."</p>";
                echo "</div>";
                echo "<div class='Manipulacao'>";
                echo "<a href='javascript: confirmExclusao()'><img src='img/icon/excluir.png'></a>";
                echo "<a href='javascript: editar(".$conteudo['idRequisicao'].")'><img src='img/icon/editar.png'></a>";
                echo "</div>";
                echo "</div>";
            } else {
                echo "<div class='lista-conteudo' onclick=detalhar(". $conteudo['idRequisicao'] .")>";
                echo "<h5>".$conteudo['Tipo_Problema']."</h5>";
                echo "<p class='lista-status'>".trim($conteudo['Status'])."</p>";
                echo "<p class='lista-desc'>".$conteudo['Contexto']."</p>";
                echo "</div>";
            }            
        }
    }else{
        echo "<p style=font-size:12px>*Nenhum pedido encontrado</p>";
    }
}
?>