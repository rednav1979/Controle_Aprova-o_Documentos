
<!DOCTYPE html>
<html>



 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<br>
<body>

                    <?php 
   include "sql_t.i.php";//conexão com o banco de dados
   @mysql_select_db($db);//selecione o banco de dados
           $sqltudo = mysql_query("SELECT * FROM controle_documentos WHERE status = 'PENDENTE' and controle is null and D_E_L_E_T_E is null and controle_envio='1'")  or die(mysql_error());
           $colunas = mysql_num_rows($sqltudo);
           for($j = 0; $j < $colunas; $j++){/*caso no mesmo dia tenha mais eventos continua imprimindo */
           $id = @mysql_result($sqltudo, $j, "id");/*pegando os valores do banco referente ao evento*/           
           $descricao = @mysql_result($sqltudo, $j, "descricao");		   		   
           $aprovador = @mysql_result($sqltudo, $j, "aprovador");
		   $hash = @mysql_result($sqltudo, $j, "hash");		   
           //LOOP PARA ENVIO DO EMAIL
           
		   $sqltudo2 = mysql_query("INSERT INTO `controle_documentos_historico`(`data_criacao`,`data_cadastro`,`id_historico`,`status`,`email_aprovador`,`aprovador`) VALUES (now(),'---','$id','ENVIO PROGRAMADO DE LINK PARA APROVACAO','$aprovador','---')") or die(mysql_error());        
           
           
                  
            
    require 'phpmailer/PHPMailerAutoload.php';           
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = 'smtp.office365.com';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Username = 'sendingdata@lotisa.com.br';
    $mail->Password = 'L0t1s4!@#___';
    $mail->Port = 587;
    $mail->setFrom('sendingdata@lotisa.com.br', 'Gestor de Documentos');
    $mail->addAddress($aprovador);
    //$mail->SMTPDebug = 3;
    //$mail->Debugoutput = 'html';
    //$mail->setLanguage('pt');
    $mail->isHTML(true);
   $mail->Subject = "*** SOLICITACAO DE VALIDACAO ***";
   $mail->Body    = $aprovador.", Por favor, valide o documento solicitado: ".$descricao.", clique no link a seguir:<a href=http://intranet.lotisa.com.br/ti/controle_documentos/atualiza.php?hash=".$hash.">aqui</a> ";
   //$mail->Body    = $ip.", Solicitou a senha para: ".$endereco_ip.", segue:".$senha." ";
   $mail->AltBody = "CORPO DO EMAIL2";
   if(!$mail->send()) {
       echo 'Não foi possível enviar a mensagem.<br>';
       echo 'Erro: ' . $mail->ErrorInfo;
   } else {
    echo "Seu email foi enviado com sucesso!"; 
   }   
   $sqltudo3 = mysql_query("update `controle_documentos` set controle='1'where id='$id'") or die(mysql_error());           
}  


?>
</body>
</html>