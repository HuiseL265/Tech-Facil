<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>

    <link rel="stylesheet" href="css/frontend css/perfil.css" />
    <link rel="stylesheet" href="css/frontend css/main.css" />

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
        <div class="informacoes">
          <b>Email:</b>
          <p>batata@gmail.com</p>

          <b>Nome:</b>
          <p>Fulano da Silva</p>

          <b>Epresa:</b>
          <p>Sla</p>

          <b>Endereço</b>
          <p>Rua dos Bobos</p>

          <b>Cidade:</b>
          <p>São Paulo</p>

          <b>CEP:</b>
          <p>08963-412</p>

          <b>Estado:</b>
          <select name="estado" id="estado">
            <option value=""></option>
            <option value="SP">São Paulo</option>
            <option value="MG">Minas Gerais</option>
          </select>

          <b>Telefone:</b>
          <p>951669451</p>
        </div>
      </main>
    </div>
  </body>
</html>
