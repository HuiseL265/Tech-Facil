function abrir(num){
    //1
    var popupAddEsc = document.getElementById("cont-esc");
    //2
    var popupAddCur = document.getElementById("cont-cur");
    //3
    var popupAddHab = document.getElementById("cont-hab");

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
    }

}

function fechar(num){
    //1
    var popupAddEsc = document.getElementById("cont-esc");
    //2
    var popupAddCur = document.getElementById("cont-cur");
    //3
    var popupAddHab = document.getElementById("cont-hab");

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
    }
}