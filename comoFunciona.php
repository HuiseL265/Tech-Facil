<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Como Funciona</title>

    <link rel='stylesheet' type='text/css' media='screen' href='css/frontend css/comoFunciona.css'>
   

    <link rel='stylesheet' type='text/css' media='screen' href='css/frontend css/main.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/frontend css/rodape.css'>

</head>
<body>

<?php require("main.php") ?>

<div id="exp-cont">
    <?php include("freelancersExp.html") ?>
</div>

<?php require("rodape.php") ?>

<script src="js/comoFunciona.js"></script>
<script>
    $(document).ready(function(){
        $("#header-exp > ul li:first-child").addClass("escolhaAtiva");
    });
</script>
    
</body>
</html>