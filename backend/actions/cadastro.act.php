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

if ($senha === $confsenha) {
    $senha = md5($senha);

    if($tipoUser != "" and $tipoUser != null){
    sqlsrv_query($con, "INSERT INTO Tb_Usuario (Nome, CPF, Email, Senha, dataCriacao, tipoUsuario, sexo)
    VALUES('$nome', '$cpf', '$email', '$senha', '$data', '$tipoUser', '$sexo') ");
    echo "Redireciona para página principal";


    $usuario_query = sqlsrv_query($con, "SELECT * FROM Tb_Usuario WHERE Email = '$email'");

    $usuario = sqlsrv_fetch_array($usuario_query, SQLSRV_FETCH_ASSOC);
    
    
    if($tipoUser == "Prestador"){  
        sqlsrv_query($con, "INSERT INTO Tb_PrestadorDeServico (idUsuario) VALUES ($usuario[idUsuario])");
    }else{
        sqlsrv_query($con, "INSERT INTO Tb_Contratante (idUsuario) VALUES ($usuario[idUsuario])");
    }


    sqlsrv_query($con, "INSERT INTO Tb_Endereco (idUsuario, Rua,Cidade,Bairro,CEP,UF,Numero,Complemento)
    VALUES('$usuario[idUsuario]', '$rua','$cidade','$bairro','$cep','$uf','$num','$complemento')");

   
    }
}

?>