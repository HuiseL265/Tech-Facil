  <?php
  require("backend/actions/SQL Server/connectsql.php");
  session_start();
  ?>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <header id="main-top">
        <div id="logo-main">
            <a href="home.php">
                <img src="img/techFacil img/techFacilwhite.png" alt="logo" width="190px" height="75px">
            </a>
        </div>

        <?php if(!isset($_SESSION['Email'])){

        ?>
        <div class="menu">
            <form id="form-login" method="post" action="backend/actions/logar.act.php">
                <div class="campo-main">
                    <label for="emailLogin">Email</label>
                    <input type="email" id="emailLogin" name="email" required="required">
                </div>

                <div class="campo-main">
                    <label for="senhaLogin">Senha</label>
                    <input type="password" id="senhaLogin" name="senha" required="required">
                </div>       
                <button>ENTRAR</button>
            </form>
        </div>
        <?php } else { ?>
        
        <div id="usuario">
            <div id="info-usuario">
                <p id="nome"><a href="perfil.php"><?php echo $_SESSION['Nome'] ?></a></p>
                <div class="sair"><a href="backend/actions/sair.php">Sair</a></div>
                <p id="userid" style="display:none;"><?php echo $_SESSION['id'] ?></p>
            </div>
            
            <div id="container-foto">
                <a href="perfil.php">
                <div id="fotoUsuario">
                    <img src="img/perfil/profilepic.png" alt="foto de perfil">
                </div>
                </a>
            </div>
        </div>
        <?php } ?>
</header>
    
    <nav id="line-nav">
            <ul>
            <a href="home.php"><li>Home</li></a>            
            <a id="pedido" href="pedidos.php"><li>Pedidos</li></a>  
            <a href="sobre.php"><li>Sobre</li></a>  
            <a href="comoFunciona.php"><li style="width:150px;">Como Funciona?</li></a>
            </ul>
    </nav>

    <script src="backend/js/login.js"></script>
