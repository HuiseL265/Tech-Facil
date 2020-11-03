<?php

$serverName = "localhost\\SQLEXPRESS";
$connectionInfo = array("Database"=>"DB_TechFacil", "UID"=>"sa", "PWD"=>"root");

$con = sqlsrv_connect($serverName, $connectionInfo);

if($con) {
    echo "<p style=display:none;>Connection established.</p>";
}else{
    echo "Connection could not be established.<br />";
    die( print_r( sqlsrv_errors(), true));
}

?>