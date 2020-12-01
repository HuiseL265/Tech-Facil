<?php
    session_start();

    if(isset($_SESSION['Email'])){
        echo "Logado";
    }else{
        echo "NaoLogado";
    }
?>