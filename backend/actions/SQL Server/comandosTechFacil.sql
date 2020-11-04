USE DB_TechFacil

SELECT * FROM Tb_Usuario
SELECT * FROM Tb_PrestadorDeServico
SELECT * FROM Tb_Contratante
SELECT * FROM Tb_Endereco
SELECT * FROM Tb_Contato
SELECT * FROM Tb_RequisicaoProblema
SELECT * FROM Tb_Verificacao

---Verificar Prestadores existentes
SELECT 
Tb_PrestadorDeServico.idPrestador as ID_Prestador,
Tb_Usuario.Nome,
Tb_Usuario.CPF,
Tb_Usuario.Email,
Tb_Usuario.dataCriacao as DataDeCriação
FROM Tb_PrestadorDeServico
LEFT JOIN Tb_Usuario
ON Tb_Usuario.idUsuario = Tb_PrestadorDeServico.idUsuario

---Verificar Contratantes existentes
SELECT 
Tb_Contratante.idContratante as ID_Contratante,
Tb_Usuario.Nome,
Tb_Usuario.CPF,
Tb_Usuario.Email,
Tb_Usuario.dataCriacao as DataDeCriação
FROM Tb_Contratante
LEFT JOIN Tb_Usuario
ON Tb_Usuario.idUsuario = Tb_Contratante.idUsuario

---Verificar Endereço por Usuario
SELECT 
Tb_Usuario.idUsuario as ID_Usuario,
Tb_Usuario.Nome,
Tb_Endereco.CEP,
Tb_Endereco.UF,
Tb_Endereco.Cidade,
Tb_Endereco.Bairro,
Tb_Endereco.Rua,
Tb_Endereco.Numero,
Tb_Endereco.Complemento
FROM Tb_Endereco
LEFT JOIN Tb_Usuario
ON Tb_Usuario.idUsuario = Tb_Endereco.idUsuario

---Verificar Contato por Usuario
SELECT 
Tb_Usuario.idUsuario as ID_Usuario,
Tb_Usuario.Nome,
Tb_Contato.EmailSecundario as Email_Secundário,
Tb_Contato.Telefone1,
Tb_Contato.Telefone2
FROM Tb_Contato
LEFT JOIN Tb_Usuario
ON Tb_Usuario.idUsuario = Tb_Contato.idUsuario

---Verificar Requisicao
SELECT 
Tb_Contratante.idContratante as ID_Contratante,
Tb_RequisicaoProblema.idRequisicao as ID_Requisicao,
Tb_Usuario.Nome,
Tb_RequisicaoProblema.Status,
Tb_RequisicaoProblema.tipoProblema as Tipo_Problema,
Tb_RequisicaoProblema.Contexto
FROM Tb_RequisicaoProblema
INNER JOIN Tb_Contratante
ON Tb_Contratante.idContratante = Tb_RequisicaoProblema.idContratante
LEFT JOIN Tb_Usuario
ON Tb_Usuario.idUsuario = Tb_Contratante.idUsuario

---Verificar Verificação
SELECT 
Tb_Verificacao.idVerificacao as ID_Verificação,
Tb_PrestadorDeServico.idPrestador as ID_Contratante,
Tb_Usuario.Nome,
Tb_Verificacao.Status,
Tb_Verificacao.diretorioArquivo as Diretorio,
Tb_Verificacao.nomeArquivo as Nome_Arquivo,
Tb_Verificacao.tipoArquivo as Extensao
FROM Tb_Verificacao
INNER JOIN Tb_PrestadorDeServico
ON Tb_PrestadorDeServico.idVerificacao = Tb_Verificacao.idVerificacao
LEFT JOIN Tb_Usuario
ON Tb_Usuario.idUsuario = Tb_PrestadorDeServico.idUsuario

---Verificar Acompanhamentos
SELECT 
Tb_Acompanhamento.idRequisicao,
Pres.Nome as Prestador_Resposavel,
Con.Nome as Contratante,
Req.Status,
Req.tipoProblema,
Req.Contexto,
Tb_Acompanhamento.dataAbertura,
Tb_Acompanhamento.dataFechamento
FROM Tb_Acompanhamento
INNER JOIN Tb_PrestadorDeServico
ON Tb_Acompanhamento.idPrestador = Tb_PrestadorDeServico.idPrestador
INNER JOIN Tb_Contratante
ON Tb_Acompanhamento.idContratante = Tb_Contratante.idContratante
LEFT JOIN Tb_Usuario Pres
ON Tb_PrestadorDeServico.idUsuario = Pres.idUsuario
LEFT JOIN Tb_Usuario Con
ON Tb_Contratante.idUsuario = Con.idUsuario
RIGHT JOIN Tb_RequisicaoProblema Req
ON Tb_Acompanhamento.idRequisicao = Req.idRequisicao

---Verificar Escolaridade dos Prestadores

SELECT 
usuario.Nome,
usuario.CPF,
usuario.tipoUsuario,
escolaridade.curso as Curso,
escolaridade.instituicao as Instituição,
escolaridade.nivelFormacao as Formação,
escolaridade.situacao as Situação,
escolaridade.conclusaoData as Data_de_Conclusão
FROM Tb_Escolaridade as escolaridade

INNER JOIN Tb_Curriculo
on Tb_Curriculo.idCurriculo = escolaridade.idCurriculo

INNER JOIN Tb_PrestadorDeServico
ON Tb_PrestadorDeServico.idPrestador = Tb_Curriculo.idPrestador

LEFT JOIN Tb_Usuario as usuario
ON usuario.idUsuario = Tb_PrestadorDeServico.idUsuario


---Verificar Curso dos Prestadores

SELECT 
usuario.Nome,
usuario.CPF,
usuario.tipoUsuario,
curso.nivelFormacao as Formação,
curso.curso as Curso,
curso.instituicao as Instituição,
curso.conclusaoData as Data_de_Conclusão
FROM Tb_Cursos as curso

INNER JOIN Tb_Curriculo
on Tb_Curriculo.idCurriculo = curso.idCurriculo

INNER JOIN Tb_PrestadorDeServico
ON Tb_PrestadorDeServico.idPrestador = Tb_Curriculo.idPrestador

LEFT JOIN Tb_Usuario as usuario
ON usuario.idUsuario = Tb_PrestadorDeServico.idUsuario

---Verificar Experiencia dos Prestadores

SELECT 
usuario.Nome,
usuario.CPF,
usuario.tipoUsuario,
experiencia.nomeEmpresa as Empresa,
experiencia.funcao as Função,
experiencia.atividades,
experiencia.dataEntrada,
experiencia.dataSaida
FROM Tb_Experiencia as experiencia

INNER JOIN Tb_Curriculo
on Tb_Curriculo.idCurriculo = experiencia.idCurriculo

INNER JOIN Tb_PrestadorDeServico
ON Tb_PrestadorDeServico.idPrestador = Tb_Curriculo.idPrestador

LEFT JOIN Tb_Usuario as usuario
ON usuario.idUsuario = Tb_PrestadorDeServico.idUsuario


---Exemplo de inserção de novo prestador
INSERT INTO Tb_Usuario (idUsuario, Nome, CPF, Email, Senha, dataCriacao)
VALUES(3, 'Guilherme Ferreira', 18222222991, 'galin@gmail.com', '29515bb9a5d5e558e2b3ba71e3b6e037', GETDATE())


INSERT INTO Tb_PrestadorDeServico(idUsuario,idPrestador,idVerificacao)
VALUES(3,2,NULL)

---Exemplo de inserção de novo contrante
INSERT INTO Tb_Usuario (idUsuario, Nome, CPF, Email, Senha, dataCriacao)
VALUES(2, 'Thiago Frederico', 18309888821, 'thiagofred@gmail.com', '29515bb9a5d5e558e2b3ba71e3b6e037', GETDATE())

INSERT INTO Tb_Contratante(idUsuario,idContratante)
VALUES(2,1,NULL,NULL)

--Exemplo de inserção de endereço
INSERT INTO Tb_Endereco (idUsuario,Rua,Cidade,Bairro,CEP,UF,Numero,Complemento)
VALUES(1,'Rua Edson Danillo Dotto','São Judas','Lapa',08384370,'SP',157,'Perto do corpo de bombeiros')

--Exemplo de inserção de contato
INSERT INTO Tb_Contato (idUSuario,Telefone1,Telefone2,EmailSecundario)
VALUES (1,11982547083, NULL, 'vitor-per@hotmail.com')

--Exemplo de criação de Requisicao
INSERT INTO Tb_RequisicaoProblema (idContratante,idRequisicao,Status,tipoProblema,Contexto)
VALUES (1,1,'Aberto', 'Erro Hardware', 'Meu computador não consegue iniciar. Aparace um problema com o hardware fez com que o Windows parasse de funcionar corretamente.')

--Exemplo de criação do Acompanhamento
INSERT INTO Tb_Acompanhamento(idRequisicao,idContratante,idPrestador,dataAbertura,dataFechamento)
VALUES (1,1,1,GETDATE(),NULL)

--Exemplo de criação da Verificação para o Prestador 
INSERT INTO Tb_Verificacao(idVerificacao,Status,diretorioArquivo,nomeArquivo,tipoArquivo)
VALUES (1,'Pendente','C:\Program Files (x86)','Foto','.jpeg');


--Exemplo de criação da Verificação para o Prestador 
INSERT INTO Tb_Verificacao(idVerificacao,Status,diretorioArquivo,nomeArquivo,tipoArquivo)
VALUES (2,'Pendente','C:\Users\Public\Pictures','MinhaFoto','.png');

--Exemplo de criação do Curriculo do Prestador
INSERT INTO Tb_Curriculo (idCurriculo,idPrestador)
VALUES(2,2)

INSERT INTO Tb_Escolaridade (idCurriculo,nivelFormacao,instituicao,curso,situacao,conclusaoData)
VALUES(2,'Ensino Médio Técnico','Etec Cidade Tiradentes','Desenvolvimento de Sistemas','Cursando',NULL)

INSERT INTO Tb_Cursos(idCurriculo,nivelFormacao,instituicao,curso,conclusaoData,codCertificado)
VALUES(2,'EAD','Microsoft Academy','Machine Learning', GETDATE(),NULL)

INSERT INTO Tb_Experiencia(idCurriculo,nomeEmpresa,funcao,atividades,dataEntrada,dataSaida)
VALUES(2,'Sorveteria','Analista de Sistemas','Analisar programação de sorveteria',GETDATE(),NULL)

INSERT INTO Tb_Habilidades (idCurriculo,habilidade)
VALUES(2,'Pular do helicóptero')