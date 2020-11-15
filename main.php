  <?php

  require("backend/actions/SQL Server/connectsql.php");

  ?>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <header id="main-top">
        <div id="logo-main">
            <a href="home.php">
                <img src="img/techFacil img/techFacilwhite.png" alt="logo" width="190px" height="75px">
            </a>
        </div>

        <div class="menu">
            <form id="form-login" method="post" action="">
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
</header>
    
    <nav id="line-nav">
            <ul>
            <a href="home.php"><li>Home</li></a>            
            <a href="pedidos.php"><li>Pedidos</li></a>  
            <a href="sobre.php"><li>Sobre</li></a>  
            </ul>
    </nav>
