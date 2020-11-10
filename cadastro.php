<?php
    session_start();
    extract($_POST);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/CssFrontend/cadastro.css" />
    <title>Cadastrar</title>

</head>

<body>
    <!--
    <div class="nav">
        <div class="logo">
            <imagens src="images/techFacilcolored.png" alt="logo" width="190px" height="75px">
        </div>
        <form id="form-login" method="post" action="">
            <input type="email" id="emailLogin" name="email" placeholder="E-mail" required="required">
            <input type="password" id="senhaLogin" name="senha" placeholder="Senha" required="required">
            <button>ENTRAR</button>
            <button>LIMPAR</button>
        </form>
    </div>
    <br>
    -->
    <div class="container">
        <form action="backend/actions/cadastro.act.php" method="post">
            <fieldset>
                <fieldset class="grupo">
                    <div class="campo">
                        <h2>CADASTRO</h2>
                        <BR>
                        <input type="text" id="nome" name="nome" placeholder="Nome Completo" value="<?php echo $nome?>" required=""><br>
                        <input type="email" id="email" name="email" placeholder="E-mail" value="<?php echo $email?>" required=""><br>
                        <input type="password" id="senha" name="senha" placeholder="Senha" value="<?php echo$senha?>" required="">
                        <input type="password" id="confsenha" name="confsenha" placeholder="Confirmar Senha" value="<?php echo$senha2?>" required="">
                        
                    </div>
                </fieldset>
                
                <div class="campo">
                    <h4>Endereço</h4>
                    <div id="gridEndereco">
                        <input type="text" id="cep" name="cep" placeholder="CEP" style="grid-area: cep;" value="" required="" maxlength="8">
                        <input type="text" id="rua" name="rua" placeholder="Rua" style="grid-area: rua;" value="" required="">
                        <input type="text" id="num" name="num" placeholder="Num" style="grid-area: num;" value="" required="" maxlength="5">
                        <input type="text" id="bairro" name="bairro" placeholder="Bairro" style="grid-area: bairro;" value="" required="">
                        <input type="text" id="cidade" name="cidade" placeholder="Cidade" style="grid-area: cidade;" value="" required="">
                        <input type="text" id="uf" name="uf" placeholder="UF" style="grid-area: uf;" value="" required=""maxlength="2">

                        <input type="text" id="complemento" name="complemento" placeholder="Próximo ao... (Opcional)" style="grid-area: complemento;" value="" required="">
                    </div>                   
                </div>
                <div class="campo">
                    <h4>Contato</h4>
                    <input type="text" id="ddd" name="ddd" placeholder="DDD" style="width: 86px" value="" required="" maxlength="2">
                    <input type="text" id="telefone" name="telefone" placeholder="Telefone1" style="width: 208px;margin-left:10px;" value="" required="" maxlength="9">
                    <input type="text" id="ddd2" name="ddd" placeholder="DDD" style="width: 86px;margin-left:30px;" value="" maxlength="2">
                    <input type="text" id="telefone2" name="telefone" placeholder="Telefone2 (Opcional)" style="width: 208px;margin-left:10px;" value="" maxlength="9">
                </div>
                <div class="campo">
                    <h4>Complemento</h4>
                    <input type="text" id="cpf" name="cpf" placeholder="CPF" style="width: 250px" value="" required="" maxlength="11">
                    <p>Sexo</p>
                    <select name="sexo" id="sexo" placeholder="Sexo" style="width: 100px" >
                        <option value=""></option>
                        <option value="Masculino">Masculino</option>
                        <option value="Feminino">Feminino</option>
                        <option value="Outro">Outro</option>
                    </select>
                    
                    <p>Tipo de Cadastro</p>
                    <label for="comum">Comum</label>
                    <input type="radio" name="tipoUser" value="Contratante" id="comum">
                    <label for="prestador">Freelancer</label>
                    <input type="radio" name="tipoUser" value="Prestador" id="prestador">
                </div>
                <button type="submit" id="submit" name="submit">Cadastrar-se</button>
            </fieldset>
        </form>
    </div>
    <!--
        <div class="FAQ">
            <div id="quemsomos">
                <h4>Quem Somos?</h4>
            </div>
            <div id="siga">
                <h4>Siga-nos nas redes</h4>
            </div>
        </div>
    -->
</body>

</html>