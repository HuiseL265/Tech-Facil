document.getElementById("cep").addEventListener("keyup",function(){

    var rua = document.getElementById("rua");
    var bairro = document.getElementById("bairro");
    var cidade = document.getElementById("cidade");
    var uf = document.getElementById("uf");
    
    if(this.value.length == 8){
        $.ajax({
            type: "get",
            url: "http://viacep.com.br/ws/"+this.value+"/json/",
            success: function(response) {

                console.log(response);
            
                if(response['cep'] != undefined){
                    rua.value = response['logradouro'];
                    bairro.value = response['bairro'];
                    cidade.value = response['localidade'];
                    uf.value = response['uf'];
    
                    if(rua.value == "" || rua.value == null){rua.disabled = true;}else{rua.disabled = false;}
                    if(bairro.value == "" || bairro.value == null){bairro.disabled = true;}else{bairro.disabled = false;}
                    if(cidade.value == "" || cidade.value == null){cidade.disabled = true;}else{cidade.disabled = false;}
                    if(uf.value == "" || uf.value == null){uf.disabled = true;}else{uf.disabled = false;}

                    $("#cep").removeClass("notFound");
                    $("#gridEndereco").removeClass("notFoundCEP");
                }else{
                    $("#cep").addClass("notFound");
                    $("#gridEndereco").addClass("notFoundCEP");
                }

            },
            error: function(){
                $("#cep").addClass("notFound");
                $("#gridEndereco").addClass("notFoundCEP");
            }
        });
    }
});