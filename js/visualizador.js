function abrir(){
        document.getElementById('contPopInfo').style.display ='block';
        document.getElementById('Manipular').style.display ='none';  
}
function fechar(popup){
    switch(popup) {
        case 1:
           document.getElementById('contPopInfo').style.display ='none';
        break;
        
        case 2:
            document.getElementById('popExpandir').style.display ='none';
        break;
    }
    
}
function confirmExclusao(){
    document.getElementById('Manipular').style.display ='block';
    document.getElementById('PopInfo').style.display ='none';
}
function fecharConfi(){
    document.getElementById('Manipular').style.display ='none';
}

$(document).ready(function(){

    $('#Selecao').on('change' , function(){

        var SelectValor = $(this).val();
        if(SelectValor == 3){
            $('#CampoOutros').css({
                display:"block"
            });
        }
        if(SelectValor == 2){
            $('#CampoOutros').css({
                display:"none"
            });
        }
        if(SelectValor == 1){
            $('#CampoOutros').css({
                display:"none"
            });
        }
    });
});

function expandir(idRequisicao){
    $.ajax({
        type: "get",
        url: "./backend/actions/detail-list.act.php?idRequisicao=" + idRequisicao,
        success: function(response) {
            $('.expandir').html(response);
            var collection = $(".detail-status");
            CorStatus(collection);
            document.getElementById('popExpandir').style.display ='flex';

        },
        error: function(){
            alert("ocorreu um erro, chama o professor.")
        }
    });
}