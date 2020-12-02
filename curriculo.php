<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="css/frontend css/curriculo.css">
</head>
<body>

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
                    <select name="tipoFormacao" id="">
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
                    <input type="text" name="curso" id="curso-esc">
                    <select name="situacao" id="" style="margin-left:25px;">
                        <option value="Cursando">Cursando</option>
                        <option value="Finalizado">Finalizado</option>
                    </select>
                    <input type="date" name="conclusaoData" id="conclusaoData-esc" style="margin-left:25px;">
                </li>
            </ul>

            <div class="footer-formacao">
                <button class="btnConfirma">Confirmar</button>
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
                        <option value="Tecnólogo">Tecnólogo</option>
                        <option value="Tecnólogo">Remoto</option>
                    </select>
                    <input style="margin-left:25px;width:495px;" type="text" name="instituicao" id="instituicao-cur">
                </li>

                <!-- linha 2 -->
                <li class="titulos-formacao">
                    <h4>Curso</h4>
                    <h4 style="margin-left:190px;">Situação</h4>
                    <h4 style="margin-left:60px;">Código da credencial(se houver)</h4>
                </li>
                <li>
                    <input type="text" name="curso" id="curso">
                    <select name="situacao" id="" style="margin-left:25px;">
                        <option value="Cursando">Cursando</option>
                        <option value="Finalizado">Finalizado</option>
                    </select>
                    <input type="text" name="conclusaoData" id="conclusaoData-cur" style="margin-left:25px;width:295px;">
                </li>
            </ul>

            <div class="footer-formacao">
                <button class="btnConfirma">Confirmar</button>
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
    
    <!-- Fim da adição do curriculo -->

    <!-- Listagem dos itens do curriculo -->

    <div class="container-curriculo" id="cont-hab-list">
        <div class="habilidades">
            <p>Andar de bicicleta</p>
            <button class="exc-hab">X</button>
        </div>      
    </div>

    <div class="container-curriculo" id="cont-esc-list">  
        <ul class="escolaridades">
            <li>
                <h5>Nivel de formação: </h5>
                <p>Ensino Médio</p>
            </li>
            
            <li>
                <h5>Instituição: </h5>
                <p>Oswaldo Aranha Bandeira de Mello</p>
            </li>

            <li>
                <h5>Curso: </h5>
                <p>Ensino Regular</p>
            </li>

            <li>
                <h5>Situação: </h5>
                <p>Finalizado</p>
            </li>

            <li>
                <h5>Data de Conclusão: </h5>
                <p>12/12/2018</p>
            </li>
        </ul>
    </div>

    <div class="container-curriculo" id="cont-cur-list">  
        <ul class="cursos">
            <li>
                <h5>Nivel de formação: </h5>
                <p>Tecnólogo</p>
            </li>
            
            <li>
                <h5>Instituição: </h5>
                <p>Etec de Cidade Tiradentes</p>
            </li>

            <li>
                <h5>Curso: </h5>
                <p>Técnico em Administração</p>
            </li>

            <li>
                <h5>Situação: </h5>
                <p>Finalizado</p>
            </li>

            <li>
                <h5>Data de Conclusão: </h5>
                <p>12/12/2019</p>
            </li>
        </ul>
    </div>
    <!-- Fim da listagem dos itens do curriculo -->

    

    <script src="js/curriculo.js"></script>
</body>
</html>
