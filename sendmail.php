<?php
session_start();
include('verifica_login.php');
?>
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



<img src=css/logo.png><br>
Hoje, 
<script Language="JavaScript">
<!--
mydate = new Date();
myday = mydate.getDay();
mymonth = mydate.getMonth();
myweekday= mydate.getDate();
weekday= myweekday; 
myear = mydate.getFullYear();

if(myday == 0)
day = " Domingo, " 

else if(myday == 1)
day = " Segunda - Feira, " 

else if(myday == 2)
day = " Terça - Feira, " 

else if(myday == 3)
day = " Quarta - Feira, " 

else if(myday == 4)
day = " Quinta - Feira, " 

else if(myday == 5)
day = " Sexta - Feira, " 

else if(myday == 6)
day = " Sábado, " 

if(mymonth == 0)
month = "Janeiro " 

else if(mymonth ==1)
month = "Fevereiro " 

else if(mymonth ==2)
month = "Março " 

else if(mymonth ==3)
month = "Abril " 

else if(mymonth ==4)
month = "Maio " 

else if(mymonth ==5)
month = "Junho " 

else if(mymonth ==6)
month = "Julho " 

else if(mymonth ==7)
month = "Agosto " 

else if(mymonth ==8)
month = "Setembro " 

else if(mymonth ==9)
month = "Outubro " 

else if(mymonth ==10)
month = "Novembro " 

else if(mymonth ==11)
month = "Dezembro " 

document.write("<font face=arial, size=2>"+ day);
document.write(myweekday+" de "+month+ "</font>");
document.write(myear);
// -->
</script>
<br>

<body>

    <section class="hero is-success is-fullheight">
	
        
            <div class="container has-text-centered">			
                <div class="column is-4 is-offset-4">
                    <h1 class="title has-text-grey">MENU DE ACESSO</h1>
					<h2 class="title has-text-grey"><font size=4>[Tecnologia da Informação]</font></h2>                   
                    <div class="box">
                    <?php 
   include "sql_t.i.php";//conexão com o banco de dados
   
    $id_fixo = $_GET['id'];	
    $aprovador_retorno = $_GET['aprovador'];	
    $hash_retorno =  $_GET['hash'];	
    $usu_solicitacao = $_SESSION['usuario'];
    $ip = $_SERVER['REMOTE_ADDR'];

   @mysql_select_db($db);//selecione o banco de dados
   
	
           $sqltudo = mysql_query("SELECT * FROM controle_documentos WHERE id = '$id_fixo'")  or die(mysql_error());
           $colunas = mysql_num_rows($sqltudo);
         
	  

           for($j = 0; $j < $colunas; $j++){/*caso no mesmo dia tenha mais eventos continua imprimindo */
           $id = @mysql_result($sqltudo, $j, "id");/*pegando os valores do banco referente ao evento*/           
           $descricao = @mysql_result($sqltudo, $j, "descricao");		   
		   $dpto = @mysql_result($sqltudo, $j, "dpto");           
           $aprovador = @mysql_result($sqltudo, $j, "aprovador");                      
           $url_documento = @mysql_result($sqltudo, $j, "url_documento");
	   

	   
           }
	   print'</table>';
	   
	    $sql2 = mysql_query("INSERT INTO `controle_documentos_historico`(`data_criacao`,`data_cadastro`,`id_historico`,`status`,`email_aprovador`,`aprovador`) VALUES (now(),'---','$id','ENVIO DE LINK PARA APROVACAO','$aprovador','---')") or die(mysql_error());
        $sql3 = mysql_query(" update `controle_documentos` set controle_envio='1' where id=$id ")or die(mysql_error());
?>
<?php
if ($usu_solicitacao = 'vanderlei') {
	
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
   $mail->Body    = $aprovador.", Por favor, valide o documento solicitado: ".$descricao.", clique no link a seguir:<a href=http://intranet.lotisa.com.br/ti/controle_documentos/atualiza.php?hash=".$hash_retorno.">aqui</a> ";
   //$mail->Body    = $ip.", Solicitou a senha para: ".$endereco_ip.", segue:".$senha." ";
   $mail->AltBody = "CORPO DO EMAIL2";


   if(!$mail->send()) {
       echo 'Não foi possível enviar a mensagem.<br>';
       echo 'Erro: ' . $mail->ErrorInfo;
   } else {
    echo "Seu email foi enviado com sucesso!"; 
   }
}
	
?>  
<br>
<a href="listar_pesquisa.php">[V O L T A R]</a>						
                    </div>
                </div>
            </div>
        </div>
    </section>
	

</body>
</font>
<a href="menu.php">Voltar</a>
</html>