<?php
 session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login-Tech Facil</title>

    <link rel="stylesheet" href="css/login-adm-style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        window.onload = function() {
            let url = new URL(window.location.href);
            var resp = url.searchParams.get("resp");

            switch(Number(resp)){
                case 1:
                    document.querySelector("#senha-adm").insertAdjacentHTML('afterEnd', '<p id=msgLogin>Senha inválida</p>');
                break;

                case 2:
                    document.querySelector("#senha-adm").insertAdjacentHTML('afterEnd', '<p id=msgLogin>Usuário não cadastrado</p>');
                break;
            }

            $("#msgLogin").delay(5000);
            $("#msgLogin").fadeOut("slow");

            //deletar o get apresentado na url.
            history.replaceState && history.replaceState(
                null, '', location.pathname + location.search.replace(/[\?&]resp=[^&]+/, '').replace(/^&/, '?')
            );
        };
    </script>
</head>
<body>

    <?php
        if(isset($_SESSION['usuario_invalido'])){          
    ?>
    <script>
        alert("Email e/ou senha invalidos");
        location.reload();
    </script>
    <?php
    };
       unset($_SESSION['usuario_invalido']);
    ?>
    <div id="container-login-adm">

        <div id="container-foto">
            <img src="../img/techFacilcolored.png" alt="TechFacil - Logo">
        </div>

        <form action="logar-adm.act.php" method="post">
            <div id="login-container">
                <input type="email" name="email-adm" id="email-adm" class="login-input-adm" placeholder="E-mail" required="required">
                <input type="password" name="senha-adm" id="senha-adm" class="login-input-adm" placeholder="Senha" required="required">
    
                <input type="submit" value="ENTRAR" id="btnEntrar-adm">
                <p>Esqueceu a senha? <a href="#">Contate o administrador.</a></p>
            </div>
        </form>
    </div>
</body>
</html>