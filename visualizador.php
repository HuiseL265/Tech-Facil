<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/frontend css/visualizador.css" media="screen" />

    <!-- Abrir o popap-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Fim da função-->

</head>
<body>
    
    <div id="lista-requisicoes">
        <p>Lista de requisições</p>
        <a href="javascript: abrir();" id="CriarReq">
            <p>Criar Requisição +</p>
        </a>
    
        
        <!-- Quadrado -->
    
        <div class="conteudos-lista">
            <h1>Titulo</h1>
            <div class="Manipulacao">
    
                <a href="javascript: confirmExclusao();">
                    <img src="img/icon/excluir.png">
                </a>
        
                <a href="">
                    <img src="img/icon/editar.png">
                </a>
            </div>
            <h2>Situacao</h2>
            <p>Texto mostrando o problema</p>
        </div>

        <!--Fim do Quadrado-->
    </div>
    
    <!-- Popap--> 
    <div class="popinfo" id="PopInfo">
        <a href="javascript: fechar();">
            <img src="img/icon/fechar.png">
        </a>    
        <div class="Topo">
            <h1>NOVA REQUISIÇÃO</h1>
        </div>

        <div class="InfoServ">
        <ul>
                <li>
                    <h3>Título: </h3>
                    <select name="TituloOp" id="Selecao"> 
                        <option value="1">Hardware</option>
                        <option value="2">Software</option>
                        <option value="3">Outros</option>
                    </select>
                </li>

                <li>
                    <input type="text" id="CampoOutros" placeholder="Titulo">
                </li>
        
                <li>
                    <h3>Contratante: </h3>
                    <p>$Pessoa&</p>
                </li>
                <li>
                    <h3>Tipo do Pedido:</h3>
                    <p> &Problema& </p>
                </li>
                <li>
                    <h3>Situação: </h3><p> &situação& </p>
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

            <textarea name="" id="" cols="30" rows="10" Placeholder="Explique um pouco sobre o seu problema"></textarea>
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

    <script src="js/visualizador.js"></script>
    
</body>
</html>