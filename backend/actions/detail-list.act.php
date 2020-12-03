<?php
require("SQL Server/connectsql.php");
session_start();

/*criação das variaveis*/
$idRequisicao = $_GET['idRequisicao'];

$params = array();
$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
$tipoUser = sqlsrv_query($con, "SELECT tipoUsuario FROM Tb_Usuario WHERE Email = '$_SESSION[Email]'", $params, $options);
$tipoUser = sqlsrv_fetch_array($tipoUser);

if($query = sqlsrv_query($con, "SELECT * FROM vwRequisicao WHERE idRequisicao = $idRequisicao", $params, $options)){
    if(sqlsrv_num_rows($query) === 1){
        if ($tipoUser[0] == "Contratante"){
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
                    
                    <div class='fechar'>
                        <a href='javascript:fechar(2)';>
                            x
                        </a> 
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

                <h4>Descrição</h4>
                <div id='descricao-pedido'>".utf8_encode($conteudo['Contexto'])."</div>";
        } else {
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
                                    <img src='./img/redesSociais icon/phone.png' alt='Telefone2' srcset=''>
                                    <p>".$tel1."</p>
                                </li> 
                            ";
                        }else {
                            if(strlen($tel1) == 11 and substr($tel1,2,1) == 9){
                                echo "
                                <li>
                                <img src='./img/redesSociais icon/Whatsapp-green.png' alt='Telefone2' srcset=''>
                                <p><a href=https://api.whatsapp.com/send?l=pt_BR&phone=".$tel1."&text=Olá,%20sou%20um%20dos%20freelancers%20vindo%20dá%20Techfacil%20e%20tenho%20interesse%20em%20auxiliar%20com%20o%20seu%20problema!  target=_blank>".$tel1."</a></p>
                                </li>
                                ";
                            }else{
                                echo "
                                <li>
                                    <img src='./img/redesSociais icon/phone.png' alt='Telefone2' srcset=''>
                                    <p>".$tel1."</p>
                                </li> 
                                ";
                            }
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
                            if(strlen($tel2) === 11 and substr($tel2,2,1) === 9){
                                echo "
                                <li>
                                <p>
                                <img src='./img/redesSociais icon/Whatsapp-green.png' alt='Telefone2' srcset=''>
                                <a href=https://api.whatsapp.com/send?l=pt_BR&phone=".$tel2."&text=Olá,%20sou%20um%20dos%20freelancers%20vindo%20dá%20Techfacil%20e%20tenho%20interesse%20em%20auxiliar%20com%20o%20seu%20problema!  target=_blank>".$tel2."</a></p>
                                </li>
                                ";
                            }else{
                                echo "
                                <li>
                                    <img src='./img/redesSociais icon/phone.png' alt='Telefone2' srcset=''>
                                    <p>".$tel2."</p>
                                </li> 
                                ";
                            }
                        }

                        if($email == "" or $email == NULL){
                            $email = "(Não informado)";

                            echo "
                            <li>
                                <img src='./img/redesSociais icon/email.png' alt='email' srcset=''>
                                <p>".$email."</p>
                            </li> 
                            ";  
                        }else{
                            echo "
                            <li>
                                <img src='./img/redesSociais icon/email.png' alt='email' srcset=''>
                                <p id='email'> <a href='mailto:".$email." ?subject=Olá,%20sou%20um%20dos%20freelancers%20vindo%20dá%20Techfacil%20e%20tenho%20interesse%20em%20auxiliar%20com%20o%20seu%20problema!'>".$email."</a></p>
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
                
    }
}else{
    echo "<p style=font-size:12px;>*Falha ao carregar a requisição.</p>";
}


?>