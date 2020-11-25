$("#busca-txt").keyup(function(event){
    if(event.which === 13){
        console.log(this.value);
        filtrar(this.value,"busca");
    }
});

$("#btnBuscar").click(function(){
    var txt = $("#busca-txt").val();
    filtrar(txt,"busca");
});



function filtrar(texto,tipo) {
    $.ajax({
        type: "get",
        url: "./backend/actions/filter-list.act.php?texto="+ texto +"&tipo="+ tipo,
        success: function(response) {
            $('.lista-pedidos').html(response);
            var collection = $(".lista-status");
            
            CorStatus(collection);
        },
        error: function(){
            alert("ocorreu um erro, chama o professor.")
        }
    });
}



function detalhar(idRequisicao){
    $.ajax({
        type: "get",
        url: "./backend/actions/detail-list.act.php?idRequisicao=" + idRequisicao,
        success: function(response) {
            $('#cont-info').html(response);
            var collection = $(".detail-status");
            CorStatus(collection);
        },
        error: function(){
            alert("ocorreu um erro, chama o professor.")
        }
    });
}



function CorStatus(classUsed){
    var collection = classUsed;

            collection.each(function(index,element) {
                strElement = element.innerHTML.trim().toLowerCase();

                switch(strElement){
                    case "aberto":
                        element.classList.add("status-green");
                    break;

                    case "fechado":
                        element.classList.add("status-red");
                    break;
                }
            });
}