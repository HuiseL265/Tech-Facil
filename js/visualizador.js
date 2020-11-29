function abrir(){
    document.getElementById('PopInfo').style.display ='block';
    document.getElementById('Manipular').style.display ='none';
}
function fechar(){
    document.getElementById('PopInfo').style.display ='none';
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