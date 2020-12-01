<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos</title>

    <link rel="stylesheet" href="css/frontend css/main.css">
    <link rel="stylesheet" href="css/frontend css/pedidos.css">
    <link rel="stylesheet" href="css/frontend css/rodape.css">
</head>
<body>
<?php include("main.php");
    if (!isset($_SESSION['Nome'])) {
        header('location: home.php');
    }
?>

    <div id="container-req">
        <div id="cont-filtro">
            <h3>Filtros</h3>
            <h5>Busca</h5>
            <!--onkeyup="filtrar(this.value,'busca')" -->
            <input type="text" name="busca-txt" id="busca-txt">
            <button id="btnBuscar"></button>
            
            <h5>Tipo do Pedido</h5>
            <p class="radio-buttons">
                <input type="radio" name="radio-filtro" id="hardware-radio" value="hardware" onclick="filtrar(this.value,'tipoPedido')">
                <label for="hardware-radio">Hardware</label>
            </p>

            <p class="radio-buttons">
                <input type="radio" name="radio-filtro" id="software-radio" value="software" onclick="filtrar(this.value,'tipoPedido')">
                <label for="software-radio">Software</label>
            </p>

            <!--
            <h5>Status</h5>
            <p class="radio-buttons">
                <input type="radio" name="radio-filtro" id="aberto-radio" value="Aberto" onclick="filtrar(this.value,'status')">
                <label for="aberto-radio">Aberto</label>
            </p>

            <p class="radio-buttons">
                <input type="radio" name="radio-filtro" id="fechado-radio" value="Fechado" onclick="filtrar(this.value,'status')">
                <label for="fechado-radio">Fechado</label>
            </p>

            -->
        </div>
        <div id="cont-lista">
            <h3>Lista</h3>
            <div class="lista-pedidos">

            </div>
        </div>
        <div id="cont-info">
            
        </div>
    </div>

<?php include("rodape.php") ?>  
    

    <script src="js/pedidos.js"></script>
    <script>
        $(document).ready(function() {
            filtrar(" ");
        });
    </script>
</body>
</html>