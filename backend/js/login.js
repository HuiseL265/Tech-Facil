window.onload = function() {
    let url = new URL(window.location.href);
    var resp = url.searchParams.get("resp");

    switch(Number(resp)){
        case 1:
            document.querySelector("#senhaLogin").insertAdjacentHTML('afterEnd', '<p id=msgLogin>Senha inválida</p>');
        break;

        case 2:
            document.querySelector("#senhaLogin").insertAdjacentHTML('afterEnd', '<p id=msgLogin>Usuário não cadastrado</p>');
        break;
    }

    $("#msgLogin").delay(5000);
    $("#msgLogin").fadeOut("slow");

    history.replaceState && history.replaceState(
        null, '', location.pathname + location.search.replace(/[\?&]resp=[^&]+/, '').replace(/^&/, '?')
    );
};

$(document).ready(function (){

    $.ajax({
       url: './backend/actions/verificarLogin.php',
       success: function(data) {
          console.log(data);
          if(data == "Logado"){
             $('#cont-cadastro').hide();
             $('.menu').hide();
             $('#usuario').show();
          }
          if(data == "NaoLogado"){
             $('#usuario').hide();
             $('#cont-cadastro').show();
             $('#pedido').hide();
          }
       }
    });
 
 });