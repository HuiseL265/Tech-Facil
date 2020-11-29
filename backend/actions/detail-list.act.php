<?php
require("SQL Server/connectsql.php");

/*criação das variaveis*/
$idRequisicao = $_GET['idRequisicao'];

$params = array();
$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );

if($query = sqlsrv_query($con, "SELECT * FROM vwRequisicao WHERE idRequisicao = $idRequisicao", $params, $options)){
    if(sqlsrv_num_rows($query) === 1){
        $conteudo = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC);

        $verifyContents = Array($conteudo['Telefone1'],$conteudo['Telefone2'],$conteudo['Email']);

        $tel1 = $conteudo['Telefone1'];
        $tel2 = $conteudo['Telefone2'];
        $email = $conteudo['Email'];
        
        
        
            echo"
            <div id='topo-cont'>
                <div id='nome-cont'>
                    <h4>".utf8_encode($conteudo['Tipo_Problema'])."</h4>
                    <p>".utf8_encode($conteudo['Status'])."</p>
                </div>               
            </div>

            <div id='pedido-cont'>
                <ul id='info-pedido'>
                    <li>
                        <h5>Contratante: </h5>
                        <p>".utf8_encode($conteudo['Nome'])."</p>
                    </li>
                    <li>
                        <h5>Tipo do Pedido: </h5>
                        <p>".utf8_encode($conteudo['Tipo_Problema'])."</p>
                    </li>
                    <li>
                        <h5>Situação: </h5>
                        <p class='detail-status'>".utf8_encode($conteudo['Status'])."</p>
                    </li>
                    <li style=margin-top:20px;>
                        <h5>Orçamento: </h5>
                        <p>De R$".substr($conteudo['minOrcamento'],0,-2)." até R$".substr($conteudo['maxOrcamento'],0,-2)."</p>
                    </li>
                    <li>
                        <h5>Forma de trabalho: </h5>
                        <p>".$conteudo['formaTrabalho']."</p>
                    </li>
                </ul>
                <h4>Descrição</h4>
                <div id='descricao-pedido'>".utf8_encode($conteudo['Contexto'])."</div>

                <div class='detail-contato'>
                    <h4>Contatos</h4>

                    <ul>";

                    if($tel1 == "" or $tel1 == NULL){
                        $tel1 = "(Não informado)";

                        echo "
                        <li>
                            <img src='./img/redesSociais icon/phone.png' alt='Telefone1' srcset=''>
                            <p>".$tel1."</p>
                        </li>
                        ";
                    }else {
                        echo "
                        <li>
                        <img src='./img/redesSociais icon/phone.png' alt='Telefone1' srcset=''>
                        <p><a href=https://api.whatsapp.com/send?l=pt_BR&phone=".$tel1."&text=Olá,%20sou%20um%20dos%20freelancers%20vindo%20dá%20Techfacil%20e%20tenho%20interesse%20em%20auxiliar%20com%20o%20seu%20problema! target=_blank>".$tel2."</a></p>
                        </li>
                        ";
                    }

                    if($tel2 == "" or $tel2 == NULL){
                        $tel2 = "(Não informado)";

                        echo "
                        <li>
                            <img src='./img/redesSociais icon/phone.png' alt='Telefone2' srcset=''>
                            <p>".$tel2."</p>
                        </li> 
                        ";
                    }else {
                        echo "
                        <li>
                        <img src='./img/redesSociais icon/phone.png' alt='Telefone1' srcset=''>
                        <p><a href=https://api.whatsapp.com/send?l=pt_BR&phone=".$tel2."&text=Olá,%20sou%20um%20dos%20freelancers%20vindo%20dá%20Techfacil%20e%20tenho%20interesse%20em%20auxiliar%20com%20o%20seu%20problema!  target=_blank>".$tel2."</a></p>
                        </li>
                        ";
                    }

                    if($email == "" or $email == NULL){
                        $email = "(Não informado)";

                        echo "
                        <li>
                            <img src='./img/redesSociais icon/email.png' alt='email' srcset=''>
                            <p>".$email."</p>
                        </li> 
                        ";  
                    }

                    

                      
                          

                            
                    
                        echo "</ul>
                </div>";

                /* Endereço */

                echo "

                <div class='detail-contato'>
                    <h4>Endereço</h4>

                    <ul>";

                    echo "
                        <li>
                            <img src='./img/icon/location.png' alt='localização'>
                            <p>". utf8_encode($conteudo['Rua'].", ".$conteudo['Numero']." - ".$conteudo['Bairro'].", "
                            .$conteudo['Cidade']." - ".$conteudo['UF'].", ".$conteudo['CEP'])."</p>
                        </li> 
                    </ul>
                    </div>";        
    }
}else{
    echo "<p style=font-size:12px;>*Falha ao carregar a requisição.</p>";
}


?>