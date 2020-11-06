<?php 
require('SQL Server/connectsql.php');
extract($_POST);
$params = array();
$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
$data = date("Y-m-d");

$verEmail = sqlsrv_query($con, "SELECT * FROM Tb_Usuario WHERE Email = '$email'", $params, $options);
$verCpf = sqlsrv_query($con, "SELECT * FROM Tb_Usuario WHERE CPF = '$cpf'", $params, $options);

if (!$con) {
    die(print_r(sqlsrv_errors(),true));
}

if (sqlsrv_num_rows($verEmail) === 1) {
    echo "ja tem esse email";
    return;
}else if (sqlsrv_num_rows($verCpf) === 1) {
    echo "ja tem esse cpf irmao";
    return;
}

if ($senha === $senha2) {
    $senha = md5($senha);
    sqlsrv_query($con, "INSERT INTO Tb_Usuario (Nome, CPF, Email, Senha, dataCriacao, tipoUsuario)
    VALUES('$nome', '$cpf', '$email', '$senha', '$data', '$tipoUser') ");
    echo "Redireciona para página principal";
}

?>