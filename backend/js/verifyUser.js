function slcPrestador(id){
    document.getElementById("popup-ver").style.display = "grid";

    //informação geral
    var nome = document.querySelector("#prestador"+id+" .nome-ver").innerHTML;
    var status = document.querySelector("#prestador"+id+" .status-ver").innerHTML;
    var email = document.querySelector("#prestador"+id+" .email-ver").innerHTML;
    var cpf = document.querySelector("#prestador"+id+" .cpf-ver").innerHTML;

    //Contatos
    var email2 = document.querySelector("#prestador"+id+" .email2-ver").innerHTML;
    var tel = document.querySelector("#prestador"+id+" .tel-ver").innerHTML;
    var tel2 = document.querySelector("#prestador"+id+" .tel2-ver").innerHTML; 
    
    var arrayInfo = [nome,status,email,cpf,email2,tel,tel2];

    Info = TestIntegridade(arrayInfo);

    
        document.querySelector(".nome-prest").innerHTML = Info[0];
        document.querySelector(".status-prest").innerHTML = Info[1];

        document.querySelector("#info-prest #nome-prest").innerHTML = Info[0];
        document.querySelector("#info-prest #email-prest").innerHTML = Info[2];
        document.querySelector("#info-prest #cpf-prest").innerHTML = Info[3];

        document.querySelector("#info-prest #email2-prest").innerHTML = Info[4];
        document.querySelector("#info-prest #tel-prest").innerHTML = Info[5];
        document.querySelector("#info-prest #tel2-prest").innerHTML = Info[6];

    nome = nome.split(" ");
    document.querySelector("#foto-prest img").src = "../../img/prestadores/ver_" + id + nome[0] + ".png";


    //Verificar Status para alteração da cor
    var collection = $(".status-prest");

    CorStatus(collection);
}

function CorStatus(classUsed){

    var collection = classUsed;

            collection.each(function(index,element) {
                switch(element.innerHTML){
                    case "Pendente":
                    element.classList.add("status-orange");
                    break;

                    case "Negado":
                    element.classList.add("status-red");
                    break;

                    case "Confirmado":
                    element.classList.add("status-green");
                    break;
                }
            });

}

function TestIntegridade(array){
    var dados = array;

    for(i = 0; i < dados.length ; i++){
        
        if(dados[i] == null || dados[i] == ""){
            dados[i] = "(Não informado)";
        }
    }

    return dados;
}

function Aval(i){

    if(confirm("Por favor confirme sua resposta.")){

        $.ajax({
            url: '../actions/verificarPrestador.php?aval=' + i,
            success: function(data) {
              console.log(data);
              alert(data);
            }
        });

        }else{
                 
            alert("Resposta não registrada.");
        
        }

}