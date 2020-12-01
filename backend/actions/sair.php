<?php
session_start();

session_destroy();

if ($_SESSION['tipoUsuario'] == 'adm') {
    header('location:../pages/login-adm.php');
} else {
    header('location:../../home.php');
}
?>