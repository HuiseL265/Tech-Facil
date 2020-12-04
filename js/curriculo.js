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
        success: function(response) {
            $('#cont-esc-list').html(response);
        },
    })
    .done(function(){
        alert("Cadastrado com sucesso!");
    });
}

function addCurso(){

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
        success: function(response) {
            $('#cont-esc-list').html(response);
        },
    })
    .done(function(){
        alert("Cadastrado com sucesso!");
    });
}

