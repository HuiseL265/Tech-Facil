<?php
session_start();
require('connect.php');
$email = $_POST['email-adm'];
$senha = md5($_POST['senha-adm']);

$query = mysqli_query($con,"SELECT * FROM `tb_administradores` where `email` = '$email'; " );

if($query->num_rows == 1){
    $query = mysqli_fetch_array($query);
    $_SESSION['nomeAdm'] = $query['nome'];
    echo $_SESSION['idAdm'] = $query['idAdm'];
    
    if($senha == $query['senha']){
        $_SESSION['email'] = $email;
        header("location:./home-adm");
        exit();
    }else{
        //senha invalida
        header("location:./login-adm?resp=1");
        exit();
    }   
    
}else{
    $_SESSION['sem_cadastro']=true;
    //usuario não encontrado através do email
    header("location:./login-adm?resp=2");
    exit();
}

?>