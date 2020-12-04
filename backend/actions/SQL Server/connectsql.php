<?php

$serverName = "SQL5097.site4now.net";
$connectionInfo = array( "Database"=>"DB_A69E92_dbTechFacil", "UID"=>"DB_A69E92_dbTechFacil_admin", "PWD"=>"Techfacil520","CharacterSet" => "UTF-8");

$con = sqlsrv_connect( $serverName, $connectionInfo);

if($con) {
    //echo "<p style=display:none;>Connection established.</p>";
}else{
    //echo "Connection could not be established.<br />";
    die( print_r( sqlsrv_errors(), true));
}

?>