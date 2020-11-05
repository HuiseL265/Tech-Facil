<?php
session_start();
require('SQL Server/connectsql.php');
$email = $_POST['email-adm'];
$senha = md5($_POST['senha-adm']);
$params = array();
$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );

$query = sqlsrv_query($con,"SELECT * FROM Tb_Usuario WHERE Email = '$email' AND tipoUsuario = 'adm'", $params, $options);

if(sqlsrv_num_rows($query) == 1){
    $query = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC);
    $_SESSION['Nome'] = $query['Nome'];
    $_SESSION['id'] = $query['idUsuario'];
    
    if($senha == $query['Senha']){
        $_SESSION['Email'] = $email;
        header("location:../pages/home-adm");
        exit();
    }else{
        //senha invalida
        header("location:../pages/login-adm?resp=1");
        exit();
    }   
    
}else{
    $_SESSION['sem_cadastro']=true;
    //usuario não encontrado através do email
    header("location:../pages/login-adm?resp=2");
    echo "usuario não encontrado através do email";
    exit();
}

?>