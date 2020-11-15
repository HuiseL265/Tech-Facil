<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/frontend css/home.css">
    <link rel="stylesheet" href="css/frontend css/main.css">    
</head>
<body>

    <?php include('main.php') ?>

    <div class="header">
        <div class="info">
        <p>Encontre o melhor profissional freelancer para realizar seus Projetos</p>
        <img src="img/computer 2d.jpg" alt="computer">
        </div>
        <div class="form-registrar">
        <form action="cadastro.php" method="post">
            <table>
                <tr>
                    <td colspan="2"
                    ><h2>Cadastre-se</h2></td>
                </tr>
                   <tr>
                       <td><labeL for="nome">Nome</labeL></td>
                       <td><input type="text" id="nome" name="nome" required="required"></td>
                   </tr>
                   <tr>
                       <td><labeL for="email">Email</labeL></td>
                       <td><input type="email" id="email" name="email" required="required"></td>
                   </tr>
                   
                   <tr>
                       <td><labeL for="senha">Senha</labeL></td>
                       <td><input type="password" name="senha"  id="senha" required="required"></td>
                   </tr>
                   <tr>
                       <td><labeL for="senha2">Confirme Senha</labeL></td>
                       <td><input type="password" name="senha2" id="senha2" required="required"></td>
                   </tr>
                   <tr>
                       <td colspan="2">
                           <button type="submit" id="confirm">REGISTRAR</button>
                       </td>
                   </tr>
           </table>
            </form>
        </div>
    
    </div>
</body>
</html>