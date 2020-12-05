window.onload = function(){

    //desabilitar dataSaida se estiver trabalhando atualmente na empresa.
    document.querySelector("#aindaTrabalha-exp").addEventListener("click",function(){
        document.getElementById("dataSaida-exp").toggleAttribute("disabled");
    });

    document.querySelector("#situacao-esc").addEventListener("change",function(){
        document.getElementById("conclusaoData-esc").toggleAttribute("disabled");
    });

    if(document.getElementById("userid") == null){
        window.location.href = "home.php";
    }else{
        attlistaCurriculo(document.getElementById("userid").innerHTML);
    }

};

function abrir(num){
    //1
    var popupAddEsc = document.getElementById("cont-esc");
    //2
    var popupAddCur = document.getElementById("cont-cur");
    //3
    var popupAddHab = document.getElementById("cont-hab");

    //4
    var popupAddExp = document.getElementById("cont-exp");

    switch(num){
        case 1:
            popupAddEsc.style.display = "flex";
            break;

        case 2:
            popupAddCur.style.display = "flex";
            break;

        case 3:
            popupAddHab.style.display = "flex";
            break;

        case 4:
            popupAddExp.style.display = "flex";
            break;
    }

}

function fechar(num){
    //1
    var popupAddEsc = document.getElementById("cont-esc");
    //2
    var popupAddCur = document.getElementById("cont-cur");
    //3
    var popupAddHab = document.getElementById("cont-hab");

    //4
    var popupAddExp = document.getElementById("cont-exp");

    switch(num){
        case 1:
            popupAddEsc.style.display = "none";
            break;

        case 2:
            popupAddCur.style.display = "none";
            break;

        case 3:
            popupAddHab.style.display = "none";
            break;

        case 4:
            popupAddExp.style.display = "none";
            break;
    }
}

function attlistaCurriculo(id){

    /*Escolaridade*/
    $.ajax({
        type: "get",
        url: "./backend/actions/curriculos-front/list-Escolaridade.php",
        data: {userId: id},
        success: function(response) {
            $('#cont-esc-list').html(response);
        }
    });

    /*Curso*/
    $.ajax({
        type: "get",
        url: "./backend/actions/curriculos-front/list-Cursos.php",
        data: {userId: id},
        success: function(response) {
            $('#cont-cur-list').html(response);
        }
    });

    /*Experiência*/
    $.ajax({
        type: "get",
        url: "./backend/actions/curriculos-front/list-Experiencias.php",
        data: {userId: id},
        success: function(response) {
            $('#cont-exp-list').html(response);
        }
    });

    /*Habilidades*/
     $.ajax({
        type: "get",
        url: "./backend/actions/curriculos-front/list-Habilidades.php",
        data: {userId: id},
        success: function(response) {
            $('#cont-hab-list').html(response);
        }
    });
}

function addEscolaridade(){

    var id = document.getElementById("userid").innerHTML;
    var tipoFormacao = document.getElementById("tipoFormacao-esc").value;
    var instituicao = document.getElementById("instituicao-esc").value;
    var curso = document.getElementById("curso-esc").value;
    var situacao = document.getElementById("situacao-esc").value;
    var conclusaoData = document.getElementById("conclusaoData-esc").value;

    $.ajax({
        type: "POST",
        url: "./backend/actions/curriculos-front/add-Escolaridade.php",
        data: {userId: id, tipoFormacao: tipoFormacao, instituicao: instituicao, curso: curso, situacao:situacao,conclusaoData:conclusaoData},
        success: function() {
            alert("Escolaridade adicionada com sucesso!");
            location.reload();
        },
        error: function(){
            alert("Não foi possível realizar o cadastro da habilidade, tente novamente mais tarde.");
        },
    })
}

function addCurso(){

    var id = document.getElementById("userid").innerHTML;
    var tipoFormacao = document.getElementById("tipoFormacao-cur").value;
    var instituicao = document.getElementById("instituicao-cur").value;
    var curso = document.getElementById("curso-cur").value;
    var conclusaoData = document.getElementById("conclusaoData-cur").value;
    var credencial = document.getElementById("credencial-cur").value;

    $.ajax({
        type: "POST",
        url: "./backend/actions/curriculos-front/add-Curso.php",
        data: {userId: id, tipoFormacao: tipoFormacao, instituicao: instituicao, curso: curso,conclusaoData: conclusaoData, credencial:credencial},
        success: function() {
            alert("Curso adicionado com sucesso!");
            location.reload();
        },error: function(){
            alert("Não foi possível realizar o cadastro do curso, tente novamente mais tarde.");
        },
    })
}

function addHabilidade(){

    var id = document.getElementById("userid").innerHTML;
    var habilidade = document.getElementById("habilidade").value;

    $.ajax({
        type: "POST",
        url: "./backend/actions/curriculos-front/add-Habilidade.php",
        data: {userId: id, habilidade: habilidade},
        success: function() {
            alert("Habilidade adicionada com sucesso!");
            location.reload();
        },error: function(){
            alert("Não foi possível realizar o cadastro da habilidade, tente novamente mais tarde.");
        },
    })
}

function addExperiencia(){

    var id = document.getElementById("userid").innerHTML;
    var empresa = document.getElementById("empresa-exp").value;
    var funcao = document.getElementById("funcao-exp").value;
    var atividades = document.getElementById("atividades-exp").value;
    var dataEntrada = document.getElementById("dataEntrada-exp").value;
    var dataSaida = document.getElementById("dataSaida-exp").value;

    if(document.getElementById("aindaTrabalha-exp").checked){
        dataSaida = null;
    }

    $.ajax({
        type: "POST",
        url: "./backend/actions/curriculos-front/add-Experiencia.php",
        data: {userId: id, empresa: empresa, funcao: funcao, atividades: atividades, dataEntrada: dataEntrada, dataSaida: dataSaida},
        success: function() {
            alert("Experiência adicionada com sucesso!");
            location.reload();
        },error: function(){
            alert("Não foi possível realizar o cadastro do curso, tente novamente mais tarde.");
        },
    })
}

function excHab(idCurriculo,habilidade){
    
    if(confirm("Deseja realmente excluir?")){
        $.ajax({
            type: "POST",
            url: "./backend/actions/curriculos-front/exc-Curriculo.php",
            data: {idCurriculo:idCurriculo, habilidade:habilidade,tipo:'hab'},
            success: function(msg) {
                console.log(msg);
                alert("Exclusão realizada com sucesso!");
                location.reload();
            },error: function() {
                alert("Não foi possível excluir, tente novamente mais tarde.");
            },
        });
    }
}

function excEsc(idCurriculo,instituicao,curso){
    
    if(confirm("Deseja realmente excluir?")){
        $.ajax({
            type: "POST",
            url: "./backend/actions/curriculos-front/exc-Curriculo.php",
            data: {idCurriculo:idCurriculo, instituicao:instituicao,curso:curso, tipo:'esc'},
            success: function(msg) {
                console.log(msg);
                alert("Exclusão realizada com sucesso!");
                location.reload();
            },error: function() {
                alert("Não foi possível excluir, tente novamente mais tarde.");
            },
        });
    }
}

function excExp(idCurriculo,nomeEmpresa,funcao){
    
    if(confirm("Deseja realmente excluir?")){
        $.ajax({
            type: "POST",
            url: "./backend/actions/curriculos-front/exc-Curriculo.php",
            data: {idCurriculo:idCurriculo, nomeEmpresa:nomeEmpresa,funcao:funcao, tipo:'exp'},
            success: function(msg) {
                console.log(msg);
                alert("Exclusão realizada com sucesso!");
                location.reload();
            },error: function() {
                alert("Não foi possível excluir, tente novamente mais tarde.");
            },
        });
    }
}

function excCur(idCurriculo,instituicao,curso){
    
    if(confirm("Deseja realmente excluir?")){
        $.ajax({
            type: "POST",
            url: "./backend/actions/curriculos-front/exc-Curriculo.php",
            data: {idCurriculo:idCurriculo, instituicao:instituicao,curso:curso, tipo:'cur'},
            success: function(msg) {
                console.log(msg);
                alert("Exclusão realizada com sucesso!");
                location.reload();
            },error: function() {
                alert("Não foi possível excluir, tente novamente mais tarde.");
            },
        });
    }
}



