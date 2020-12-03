<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitar Ajuda</title>

    <link rel="stylesheet" href="css/frontend css/main.css">
    <link rel="stylesheet" href="css/frontend css/visualizador.css">
    <link rel="stylesheet" href="css/frontend css/requisicoes.css">
    <link rel="stylesheet" href="css/frontend css/rodape.css">
</head>
<body>
<?php include("main.php");

    if (!isset($_SESSION['Nome'])) {
        header('location: home.php');
    } else if (isset($_SESSION['prestador'])) {
        header('location: pedidos.php');
    }
?>

    <div id="container-req">
        <div id="cont-filtro">
            <h3>Filtros</h3>
            <h5>Busca</h5>
            <input type="text" name="busca-txt" id="busca-txt">
            <button id="btnBuscar"></button>
            
            <h5>Tipo do Pedido</h5>
            <p class="radio-buttons">
                <input type="radio" name="radio-filtro" id="hardware-radio" value="hardware" onclick="filtrar(this.value,'tipoPedido')">
                <label for="hardware-radio">Hardware</label>
            </p>

            <p class="radio-buttons">
                <input type="radio" name="radio-filtro" id="software-radio" value="software" onclick="filtrar(this.value,'tipoPedido')">
                <label for="software-radio">Software</label>
            </p>


        </div>
        <div id="cont-lista">
            <h3>Lista de requisições</h3>
            <a href="javascript: abrir();" id="CriarReq">
            <p>Criar Requisição +</p>
        </a>
            <div class="lista-pedidos">

            </div>
        </div>
        <!-- <div id="cont-info">
            
        </div> -->
    </div>

    
    <!-- Popap--> 

    <div class="popExpandir" id="popExpandir">
        <div class="expandir"></div>
    </div>

    <div class="contPopInfo" id="contPopInfo">
            <div class="popinfo" id="PopInfo">
            <a href="javascript: fechar(1);">
                <img src="img/icon/fechar.png">
            </a>    
            <div class="Topo">
                <h1>NOVA REQUISIÇÃO</h1>
            </div>

            <div class="InfoServ">
                <form method="post" action="backend/actions/adicionarRequisicao.act.php">
            <ul>
                    <li>
                        <h3>Tipo do problema: </h3>
                        <select name="TituloOp" id="Selecao"> 
                            <option value="1" name="tipoProblema">Problema com Hardware</option>
                            <option value="2" name="tipoProblema">Problema com Software</option>
                            <option value="3">Outros</option>
                        </select>
                    </li>

                    <li>
                        <input type="text" id="CampoOutros" name="CampoOutros" placeholder="Tipo do problema">
                    </li>
            

                    <li>
                        <h3>Orçamento: </h3>
                        <p>De: </p>
                        <input type="number" class="orcamento" name="minOrcamento" id="minOrcamento" Placeholder="$">
                        <p>Até: </p>
                        <input type="number" class="orcamento" name="maxOrcamento" id="maxOrcamento" Placeholder="$">
                    </li>
                    <li>
                        <h3>Forma de trabalho: </h3> 
                            <select name="Trabalho">
                                <option value="Pessoalmente">Pessoalmente</option>
                                <option value="Remotamente">Remotamente</option>
                            </select>  
                    </li>
                </ul>

                <div class="Descricao">
                <h3>Descrição</h3>

                <textarea name="descricao" id="descricao" cols="30" rows="10" Placeholder="Explique um pouco sobre o seu problema"></textarea>
                </div>
                <div>
                    <button class="btn-requisicao">Enviar</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    

    <div class="Confirmar" id="Manipular">
        <h1>Deseja realmente excluir ?</h1> 
        <a href="">
        <button>Sim</button>
        </a>
        <a href="javascript: fecharConfi()">
        <button>Não</button>
        </a><!--Fim do Quadrado-->
    </div>
    

    <!-- Fim do popap-->


<?php include("rodape.php") ?>  
    

    <script src="js/pedidos.js"></script>
    <script src="js/visualizador.js"></script>

    <script>
        $(document).ready(function() {
            filtrar(" ");
        });
    </script>
</body>
</html>