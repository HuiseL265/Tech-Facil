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
        
        <div id="usuario">
            <div id="info-usuario">
                <p id="nome"><?php echo $_SESSION['Nome'] ?></p>
                <div class="sair"><a href="backend/actions/sair.php">Sair</a></div>
            </div>
            
            <div id="container-foto">
                <div id="fotoUsuario">
                    <img src="https://imagens.ndig.com.br/internet/perfil_sem_foto_facebook.jpg" alt="foto de perfil">
                </div>
            </div>
        </div>
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
