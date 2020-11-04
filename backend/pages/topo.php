    <?php
        require('../actions/SQL Server/connectsql.php');
        session_start();

        if(!isset($_SESSION['nomeAdm'])){
            header('location:./login-adm.php');
         };
    ?>
    <div id="container-topo">
        <ul id="nav-topo">
            <li><a href="home-adm.php">Home</a></li>
            <li><a href="listarUsers.php">Usuários</a></li>
            <li><a href="listarFreelancers.php">Freelancers</a></li>
            <li><a href="verificarUsuarios.php">Verificar FL</a></li>
        </ul>

        <div id="logado-adm">
            <p>
                <?php echo $_SESSION['nomeAdm'] ?>
            </p>

            <div id="logado-foto"></div>

            <div id="opcoes-logado-adm">
                <ul>
                    <li id="deslogar-adm">Sair</li>
                </ul>
            </div>
        </div>
    </div>

    <script>
        window.onload = function() {

            logado = document.getElementById("logado-adm");
            exitBtn = document.getElementById("deslogar-adm");
            opcoesUsuario = document.getElementById("opcoes-logado-adm");
            
            logado.addEventListener("click", function(){ 
                $('#opcoes-logado-adm').toggleClass('opcoes-logado-adm-enabled');
            });

            exitBtn.addEventListener("click",function(){
                window.location.href = "../actions/sair.php";
            });

        };
    </script>