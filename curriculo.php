<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="css/frontend css/curriculo.css">
    <link rel="stylesheet" href="css/frontend css/main.css">
</head>
<body>

<?php include("main.php") ?>

    <!-- Adicionar Curriculo -->

    <ul id="curriculos-add-cont">
        <li>
            <a href="javascript:abrir(1)">+ Adicionar Escolaridade</a>
        </li>

        <li>
            <a href="javascript:abrir(2)">+ Adicionar Curso</a>
        </li>

        <li>
            <a href="javascript:abrir(3)">+ Adicionar Habilidade</a>
        </li>

        <li>
            <a href="javascript:abrir(4)">+ Adicionar Experiência</a>
        </li>
    </ul>

    <!--Escolaridade-->
    <div class="container-popup" id="cont-esc">
        <div class="container-formacao">
            <div class="topo-formacao">
                <h3>Adicionar escolaridade</h3>
                <div class="close-pop" alt="fechar" onclick=fechar(1)>X</div> 
            </div>

            <ul class="conteudos-formacao">
                <!-- linha 1 -->
                <li class="titulos-formacao">
                    <h4>Nível de formação</h4>
                    <h4 style="margin-left:25px;">Instituição</h4>
                </li>

                <li>
                    <select name="tipoFormacao" id="tipoFormacao-esc">
                        <option value="Ensino Médio">Ensino Médio</option>
                        <option value="Bacharelado">Bacharelado</option>
                        <option value="Licenciatura">Licenciatura</option>
                        <option value="Tecnólogo">Tecnólogo</option>
                        <option value="Especialização">Especialização</option>
                        <option value="Mestrado">Mestrado</option>
                        <option value="Doutorado">Doutorado</option>
                        <option value="Pós-doutorado">Pós-doutorado</option>
                    </select>
                    <input style="margin-left:25px;width:70%;" type="text" name="instituicao" id="instituicao-esc">
                </li>

                <!-- linha 2 -->
                <li class="titulos-formacao">
                    <h4>Curso</h4>
                    <h4 style="margin-left:190px;">Situação</h4>
                    <h4 style="margin-left:60px;">Data de conclusão</h4>
                </li>
                <li>
                    <input type="text" name="curso-esc" id="curso-esc">
                    <select name="situacao-esc" id="situacao-esc" style="margin-left:25px;">
                        <option value="Cursando">Cursando</option>
                        <option value="Finalizado">Finalizado</option>
                    </select>
                    <input type="date" name="conclusaoData-esc" id="conclusaoData-esc" style="margin-left:25px;" disabled>
                </li>
            </ul>

            <div class="footer-formacao">
                <button class="btnConfirma" onclick="addEscolaridade()">Confirmar</button>
            </div>
        </div>
    </div>

    <!--Curso-->
    <div class="container-popup" id="cont-cur">
        <div class="container-formacao">
            <div class="topo-formacao">
                <h3>Adicionar Curso</h3>
                <div class="close-pop" alt="fechar" onclick=fechar(2)>X</div> 
            </div>

            <ul class="conteudos-formacao">
                <!-- linha 1 -->
                <li class="titulos-formacao">
                    <h4>Nível de formação</h4>
                    <h4 style="margin-left:25px;">Instituição</h4>
                </li>

                <li>
                    <select name="tipoFormacao" id="" style="width:130px;">
                        <option value="Presencial">Presencial</option>
                        <option value="Semipresencial">Semipresencial</option>
                        <option value="À distancia">À distancia</option>
                    </select>
                    <input style="margin-left:25px;width:495px;" type="text" name="instituicao" id="instituicao-cur">
                </li>

                <!-- linha 2 -->
                <li class="titulos-formacao">
                    <h4>Curso</h4>
                    <h4 style="margin-left:190px;">Código da credencial(se houver)</h4>
                </li>
                <li>
                    <input type="text" name="curso" id="curso">
                    <input type="text" name="credencial-cur" id="credencial-cur" style="margin-left:25px;width:295px;">
                </li>
            </ul>

            <div class="footer-formacao">
                <button class="btnConfirma" onclick="addCurso()">Confirmar</button>
            </div>
        </div>
    </div>

    <!--Habilidade-->
    <div class="container-popup" id="cont-hab">
        <div class="container-formacao" style="width:550px">
            <div class="topo-formacao">
                <h3>Adicionar Habilidade</h3>
                <div class="close-pop" alt="fechar" onclick=fechar(3)>X</div> 
            </div>

            <ul class="conteudos-formacao">
                <!-- linha 1 -->
                <li class="titulos-formacao">
                    <h4>Habilidade</h4>
                </li>

                <li>
                    <input style="width:495px;" type="text" name="habilidade" id="">
                </li>
            </ul>

            <div class="footer-formacao">
                <button class="btnConfirma">Confirmar</button>
            </div>
        </div>
    </div>

    <!--Experiência-->
    <div class="container-popup" id="cont-exp">
        <div class="container-formacao">
            <div class="topo-formacao">
                <h3>Adicionar Experiência</h3>
                <div class="close-pop" alt="fechar" onclick=fechar(4)>X</div> 
            </div>

            <ul class="conteudos-formacao">
                <!-- linha 1 -->
                <li class="titulos-formacao">
                    <h4>Nome da Empresa</h4>
                    <h4 style="margin-left:275px;">Função</h4>
                </li>

                <li>
                    <input type="text" name="empresa-exp" id="empresa-exp" style="width:60%;">
                    <input type="text" name="funcao-exp" id="funcao-exp" style="margin-left:25px;width:40%;">
                </li>

                <!-- linha 2 -->
                <li class="titulos-formacao">
                    <h4>Atividades</h4>
                </li>
                <li>
                    <textarea name="atividades-exp" id="atividades-exp" cols="30" rows="10" placeholder="Conte resumidamente suas atuações na empresa."></textarea>
                </li>

                <!-- linha 3 -->
                <li class="titulos-formacao">
                    <h4>Data da entrada</h4>
                    <h4 style="margin-left:85px">Data da saída</h4>
                </li>
                <li>
                    <input type="date" name="dataEntrada-exp" id="dataEntrada-exp">
                    <input type="date" name="dataSaida-exp" id="dataSaida-exp" style="margin-left:25px;">
                    <input type="checkbox" name="aindaTrabalha-exp" id="aindaTrabalha-exp" style="margin-left:10px;">
                    <label for="aindaTrabalha-exp" style="margin:10px 0px 0px 2px;-webkit-user-select: none;">Trabalhando atualmente</label>
                </li>
            </ul>

            <div class="footer-formacao">
                <button class="btnConfirma">Confirmar</button>
            </div>
        </div>
    </div>
    
    <!-- Fim da adição do curriculo -->

    <!-- Listagem dos itens do curriculo -->

    <div class="container-curriculo" id="cont-hab-list">  
    </div>

    <div class="container-curriculo" id="cont-esc-list">  
    </div>

    <div class="container-curriculo" id="cont-cur-list">  
    </div>

    <div class="container-curriculo" id="cont-exp-list">  
    </div>

    <!-- Fim da listagem dos itens do curriculo -->

    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/curriculo.js"></script>
</body>
</html>
