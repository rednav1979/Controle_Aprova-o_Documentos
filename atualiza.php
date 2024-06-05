
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


<body>

    <section class="hero is-success is-fullheight">
	
        
            <div class="container has-text-centered">			
                    
                    <h1 class="title has-text-grey">MENU DE ACESSO</h1>
					<h2 class="title has-text-grey"><font size=4>[Tecnologia da Informação]</font></h2>                   
                    <p align=right>
                        <font color=blue>
                    <a href="MANUAL.pdf">AJUDA?</a>
</font>
                    <div class="box">
					<font  size=4>  VALIDACAO DE DOCUMENTOS:</font>
                    
<?php

// INICIO DO CONTROLE DA PAGINA PARA IMPEDIR ERROS E ACESOSS 
$hash_retorno2 = $_GET['hash'];
                    include "sql_t.i.php";//conexão com o banco de dados   
                        @mysql_select_db($db);//selecione o banco de dados	
                        $sqltudo = mysql_query("select  * FROM controle_documentos  where  hash=('$hash_retorno2')and D_E_L_E_T_E is NULL")  or die(mysql_error());           
                            $colunas = mysql_num_rows($sqltudo);
                                for($j = 0; $j < $colunas; $j++){/*caso no mesmo dia tenha mais eventos continua imprimindo */
                                    $id = @mysql_result($sqltudo, $j, "id");			   		                                                  
        }		

?>                   
                    
                    
                    <?php 
   include "sql_t.i.php";//conexão com o banco de dados
   
   @mysql_select_db($db);//selecione o banco de dados
    //$hash_retorno2 = $_GET['hash'];
	
	$sqltudo = mysql_query("select  * FROM controle_documentos  where  hash=('$hash_retorno2')and D_E_L_E_T_E is NULL")  or die(mysql_error());
           
           $colunas = mysql_num_rows($sqltudo);

	   print'<br>';	

	   print'<br>';   	
       print'<table border="1"   bordercolor="#00BFFF" >';
	   print'<tr>';
	   print'<td><b>ID</td>';	   
	   print'<td><b>DESCRICAO</td>';
       print'<td><b>DPTO</td>';	   
       print'<td><b>APROVADOR</td>';	   
       print'<td><b>STATUS</td>';
       print'<td><b>DOCUMENTO</td>';
	   print'<td><b>DETALHES</td>';
       

       
	   
	   
	   print'</tr></b>';
           for($j = 0; $j < $colunas; $j++){/*caso no mesmo dia tenha mais eventos continua imprimindo */
           $id = @mysql_result($sqltudo, $j, "id");			   		   
           $descricao = @mysql_result($sqltudo, $j, "descricao");
           $aprovador = @mysql_result($sqltudo, $j, "aprovador");
           $status = @mysql_result($sqltudo, $j, "status");
           $dpto = @mysql_result($sqltudo, $j, "dpto");
           $controle = @mysql_result($sqltudo, $j, "controle");
           $url_documento = @mysql_result($sqltudo, $j, "url_documento");
           $pedido = @mysql_result($sqltudo, $j, "pedido");
           $fornecedor = @mysql_result($sqltudo, $j, "fornecedor");
           $vencimento = @mysql_result($sqltudo, $j, "vencimento");
           $parcelas = @mysql_result($sqltudo, $j, "parcelas");
           $cc = @mysql_result($sqltudo, $j, "cc");
           $planofinanceiro = @mysql_result($sqltudo, $j, "planofinanceiro");
           $observacao = @mysql_result($sqltudo, $j, "observacao");
           $dadosbancarios = @mysql_result($sqltudo, $j, "dadosbancarios");
           $favorecido = @mysql_result($sqltudo, $j, "favorecido");
           $banco = @mysql_result($sqltudo, $j, "banco");
           $agencia = @mysql_result($sqltudo, $j, "agencia");
           $conta = @mysql_result($sqltudo, $j, "conta");
           $pix = @mysql_result($sqltudo, $j, "pix");


           
		   print'<tr>';
		   print'<td>'.$id.'</td>';	   	   	   
		   print '<td>'.$descricao.'</td>';
           print '<td>'.$dpto.'</td>';
		   print '<td>'.$aprovador.'</td>';
		   if ($status == "PENDENTE") {			
			print '<td bgcolor=orange>'.$status.'</td>';
			}
		   if ($status == "APROVADO") {			
			print '<td bgcolor=green>'.$status.'</td>';			
		   }
           print '<td><a href="uploads_documentos/'.$url_documento.'"target="_blank"><img src="images/bolinha_verde.png" width=30 height=30></a>';			   
		   	   
           }
		   print '<td><a href="listar_pesquisa_detalhes2.php?id='.$id.'&hash='.$hash_retorno2.'"><img src=images/passarinho.png></a>';
           
           print '</tr>';	   	   	   

	    print'</table>';
		print '<br>';		
		
        ?>

<?php
#INICIO DAS CONFS PARA GRAVAR OS DADOS QUE PRECISAM ANTES DE APROVAR
if(isset($_POST['done'])){   

$pedido = $_POST['pedido'];
$fornecedor = $_POST['fornecedor'];
$vencimento = $_POST['vencimento'];
$parcelas = $_POST['parcelas'];    
$cc = $_POST['cc'];
$planofinanceiro = $_POST['planofinanceiro'];
$observacao = $_POST['observacao'];
$dadosbancarios = $_POST['dadosbancarios'];	
$favorecido = $_POST['favorecido'];	
$banco = $_POST['banco'];	
$agencia = $_POST['agencia'];	
$conta = $_POST['conta'];	
$pix = $_POST['pix'];	
$hash = $_POST['hash'];	


//if(empty($pedido) || empty($fornecedor)|| empty($vencimento) || empty($parcelas)){
	
	 include "sql_t.i.php";//conexão com o banco de dados   
                        @mysql_select_db($db);//selecione o banco de dados	
                        $sqltudo = mysql_query("select  * FROM controle_documentos  where  hash=('$hash')and D_E_L_E_T_E is NULL")  or die(mysql_error());           
                            $colunas = mysql_num_rows($sqltudo);
                                for($j = 0; $j < $colunas; $j++){/*caso no mesmo dia tenha mais eventos continua imprimindo */
                                    $usuario_aprovacao = @mysql_result($sqltudo, $j, "aprovador");	
									$id_historico = @mysql_result($sqltudo, $j, "id");	
                                    $email_cadastro = @mysql_result($sqltudo, $j, "email_cadastro");	
                                    
        }
    if(empty($pedido)){   
    $erro = "Atenção, você deve preencher todos os campos";
    print '<meta http-equiv="refresh" content="0;url=retornou.php">';
        }else{        
    $sql = mysql_query("update  `controle_documentos` set  data_aprovacao=now(),usuario_aprovacao='$usuario_aprovacao',status='APROVADO',pedido='$pedido',fornecedor='$fornecedor',vencimento='$vencimento',parcelas='$parcelas',cc='$cc',planofinanceiro='$planofinanceiro',dadosbancarios='$dadosbancarios',observacao='$observacao',favorecido='$favorecido',banco='$banco',agencia='$agencia',conta='$conta',pix='$pix',controle='1' where hash='$hash' ") or die(mysql_error());

    //$sql2 = mysql_query("update  `controle_documentos_historico` set  data_cadastro=now(),aprovador='$usuario_aprovacao' where id_historico='$id_historico' ") or die(mysql_error());
    $sql3 = mysql_query("INSERT INTO `controle_documentos_historico` (`data_cadastro`,`email_aprovador`,`data_criacao`,`aprovador`,`id_historico`,`status`) VALUES (now(),'---','---','$usuario_aprovacao','$id_historico','APROVADO PELO LINK') ") or die(mysql_error());
       
	if($sql){
            $erro2 = "Dados cadastrados com sucesso!";

//NOTIFICACAO POR EMAIL DA APROVAÇÃO
    
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
$mail->addAddress("$email_cadastro");
//$mail->SMTPDebug = 3;
//$mail->Debugoutput = 'html';
//$mail->setLanguage('pt');
$mail->isHTML(true);
$mail->Subject = "*** APROVACAO DE VALIDACAO ***";
$mail->Body    = $aprovador.", Validou o documento solicitado: ".$descricao.", clique no link a seguir:<a href=http://intranet.lotisa.com.br/ti/controle_documentos/listar_pesquisa.php>aqui</a> ";
//$mail->Body    = $aprovador.", Por favor, valide o documento solicitado: ".$descricao.", clique no link a seguir:<a href=http://intranet.lotisa.com.br/ti/controle_documentos/atualiza.php?hash=".$hash_retorno.">aqui</a> ";
//$mail->Body    = $ip.", Solicitou a senha para: ".$endereco_ip.", segue:".$senha." ";
$mail->AltBody = "CORPO DO EMAIL2";


if(!$mail->send()) {
   echo 'Não foi possível enviar a mensagem.<br>';
   echo 'Erro: ' . $mail->ErrorInfo;
} else {
echo "Seu email foi enviado com sucesso!"; 
}



            print "<meta http-equiv=refresh content=0;url=atualiza.php?hash=$hash>";
			PRINT 'Valor de Aprovador';
			print $usuario_aprovacao;
            print 'Valor de hash:';
            print $hash;
          } else{
              $erro = "Não foi possivel cadastrar os dados";
          }

}

}

?>


<form name="form1" action="atualiza.php" method="POST">
<?php
if(isset($erro)){
    print '<div style="width:80%; background:red; color:Black; padding: 5px 0px 5px 0px; text-align:center; margin: 0 auto;">'.$erro.'</div>';
}
if(isset($erro2)){
    print '<div style="width:80%; background:green; color:Black; padding: 5px 0px 5px 0px; text-align:center; margin: 0 auto;">'.$erro2.'</div>';
}
?>	
 <?php
 if ($status =='APROVADO'){
 }else{
             print'  <font size=2>';
             print'<div class="field">';
             print'<div class="control">';
             print'<div class="column is-4 is-offset-4">';
             print'<input name="pedido"   class="input is-large" placeholder="Pedido" autofocus="" onkeyup="maiuscula(this)">';
             print'<input name="fornecedor"   class="input is-large" placeholder="Fornecedor" autofocus="" onkeyup="maiuscula(this)">';
             print'<input name="vencimento"   class="input is-large" placeholder="Vencimento" autofocus="" onkeyup="maiuscula(this)">';
             print'<input name="parcelas"   class="input is-large" placeholder="Parcelas" autofocus="" onkeyup="maiuscula(this)">';					
             print'<input name="cc"   class="input is-large" placeholder="Centro de Custo" autofocus="" onkeyup="maiuscula(this)">';
             print'<input name="planofinanceiro"   class="input is-large" placeholder="Plano Financeiro" autofocus="" onkeyup="maiuscula(this)">';
             print'<input name="observacao"   class="input is-large" placeholder="Observacao  Titulo" autofocus="" onkeyup="maiuscula(this)">';	

print'	<select name="dadosbancarios" class="input is-large"   autofocus="" >';									
print '<option>FORMA DE PAGAMENTO</option> ';
print'<option>'; 						
echo 'BOLETO';
print '</option>';          
print'<option>'; 						
echo 'PIX';
print '</option>';          
print'<option>'; 						
echo 'TRANSFERENCIA';
print '</option>';          
print'<option>'; 						
echo 'ESPECIE';
print '</option>';          
print '</select>';							

             print'<input name="favorecido"   class="input is-large" placeholder="Favorecido" autofocus="" onkeyup="maiuscula(this)">';			
             print'<input name="banco"   class="input is-large" placeholder="Banco" autofocus="" onkeyup="maiuscula(this)">	';
             print'<input name="agencia"   class="input is-large" placeholder="Agencia" autofocus="" onkeyup="maiuscula(this)">';
             print'<input name="conta"   class="input is-large" placeholder="Conta" autofocus="" onkeyup="maiuscula(this)">	';															
             print'<input name="pix"   class="input is-large" placeholder="Pix" autofocus="" onkeyup="maiuscula(this)">	';					                    
 } 
 ?>
 <tr><td></td><td><input type="hidden" enable="false" name="hash" value="<?php echo $hash_retorno2; ?>" size=6/></td></tr>

  
               <?php

                    include "sql_t.i.php";//conexão com o banco de dados   
                        @mysql_select_db($db);//selecione o banco de dados	
                        $sqltudo = mysql_query("select  controle FROM controle_documentos  where  id=('$id_fixo')and D_E_L_E_T_E is NULL")  or die(mysql_error());           
                            $colunas = mysql_num_rows($sqltudo);
                                for($j = 0; $j < $colunas; $j++){/*caso no mesmo dia tenha mais eventos continua imprimindo */
                                    $id = @mysql_result($sqltudo, $j, "id");			   		              
                                    $controle_retorno = @mysql_result($sqltudo, $j, "controle");           
                                    print'<td>'.$controle_retorno.'</td>';	   	
                                    print $sqltudo;
                                    print $colunas;
        }

               
               
               if ($status =='APROVADO'){
               }else{
               print '<button type="submit" onclick="" class="button is-block is-link is-large is-fullwidth">CADASTRAR</button><input type="hidden" name="done"  value="" />';
               }
               ?>
</div>
                    </div>
                </div>
            </div>
        </div>
		
    </section>
	
	<br>

<br>


</body>

</html>


