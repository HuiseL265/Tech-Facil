<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>

    <link rel="stylesheet" href="css/frontend css/perfil.css" />
    <link rel="stylesheet" href="css/frontend css/main.css" />
    <link rel="stylesheet" href="css/frontend css/rodape.css" />
    <link rel="stylesheet" href="css/frontend css/curriculo.css" />

  </head>
  <body>
    <?php include("main.php"); ?>
    <div id="perfil">
      <aside class="menu-lateral">
        <div class="foto-nome">
          <div class="foto-perfil">
            <img src="img/perfil/perfil.jpg" alt="foto de perfil" />
          </div>

          <div class="nome">
            <h3>Fulano da Silva</h3>
          </div>
        </div>

        <div class="options">
          <button>Perfil</button>
          <button>Requisições</button>
        </div>

        <footer>
          <button onclick="history.back()">voltar</button>
        </footer>
      </aside>

      <main class="conteudo">

      <?php
      $params = array();
      $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
      $id = $_SESSION['id'];
          if(!$infoUser = sqlsrv_query($con, "SELECT * FROM Tb_Usuario WHERE idUsuario = $id",$params,$options)){
            
            while ($user = sqlsrv_fetch_array($infoUser, SQLSRV_FETCH_ASSOC)){
              
              echo "<div class='informacoes'>
              <b>Email:</b>
              <p>".$user['idUsuario']."</p>
    
              <b>Nome:</b>
              <p>".$user['Nome']."</p>
    
              <b>Email:</b>
              <p>".$user['Email']."</p>
    
              <b>Tipo Usuario:</b>
              <p>".$user['tipoUsuario']."</p>
    
              </div>";

            }

          }
      
      ?>
        
      </main>
      
    </div>

    <?php include("curriculo.php"); ?>
    <?php include("rodape.php"); ?>
  </body>
</html>