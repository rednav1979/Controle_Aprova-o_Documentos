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
<?php
    $usuario_cadastro = $_SESSION['usuario'];
    print '<p>';
    print 'Olá: ';
    print $usuario_cadastro;
    print '<p>';
    print 'Seja Bem Vindo(a).';
    print '<br>';
?> 

<body>

    <section class="hero is-success is-fullheight">
	
        
            <div class="container has-text-centered">			
                
                    <h1 class="title has-text-grey">MENU DE ACESSO</h1>
					<h2 class="title has-text-grey"><font size=4>[Tecnologia da Informação]</font></h2>                   
                    <div class="box">
					<font color=black size=4>  VALIDACAO DE DOCUMENTOS:</font>
                    <font size=2>

					
					

					
					<?php 
   include "sql_t.i.php";//conexão com o banco de dados
   
   @mysql_select_db($db);//selecione o banco de dados
    $id_fixo = $_GET['id'];
    //LISTA TABELA PARA MOSTRAR NA TELA O ANTES E PEGAR O STATUS PARA EVITAR APROVACAO DUPLICADA
    print '<br>';
    print '<p align=left>';
    print 'STATUS ANTES DA APROVAÇÃO';

    $sqltudo = mysql_query("select  * FROM controle_documentos  where  id=('$id_fixo')")  or die(mysql_error());           
    $colunas = mysql_num_rows($sqltudo);
	   print'<br>';	
	   print'<br>';   	
       print'<table border="1"   bordercolor="#00BFFF" >';
	   print'<tr>';
	   print'<td><b>ID</td>';	   
	   print'<td><b>DESCRICAO</td>';
       print'<td><b>DPTO</td>';	   
       print'<td><b>APROVADOR</td>';
	   print'<td><b>DOCUMENTO</td>';
       print'<td><b>STATUS</td>';
	   
	   print'</tr></b>';
           for($j = 0; $j < $colunas; $j++){/*caso no mesmo dia tenha mais eventos continua imprimindo */
           $id = @mysql_result($sqltudo, $j, "id");			   		   
           $descricao = @mysql_result($sqltudo, $j, "descricao");
           $aprovador = @mysql_result($sqltudo, $j, "aprovador");
           $status = @mysql_result($sqltudo, $j, "status");
           $dpto = @mysql_result($sqltudo, $j, "dpto");
           $url_documento = @mysql_result($sqltudo, $j, "url_documento");           
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
		   
		   print '</tr>';	
	   
           }
	    print'</table>';
		print '<br>';
		print '<hr>';
	if ($status == "PENDENTE"){	
        $sqltudo = mysql_query("INSERT INTO  `controle_documentos_historico`(`data_criacao`,`status`,`usuario_cadastro`,`id_historico`)VALUES(now(),'APROVADO','$usuario_cadastro','$id_fixo')")  or die(mysql_error());
        print '<font color=green size=3>';
        print 'HISTORICO GRAVADO COM SUCESSO';
        print'</font>';
        print '<br>';
        
        //$sqltudo = mysql_query("UPDATE controle_documentos_historico set data_criacao=now(),status='APROVADO',usuario_cadastro='$usuario_cadastro' where  id_historico=('$id_fixo')")  or die(mysql_error());
        $sqltudo = mysql_query("UPDATE controle_documentos set status='APROVADO',usuario_aprovacao='$usuario_cadastro',data_aprovacao=now() where  id=('$id_fixo')")  or die(mysql_error());
        print '<font color=green size=3>';
        print 'STATUS GRAVADO COM SUCESSO';
        print'</font>';
    }else{
        print '<font color=red size=4>';
        print "DOCUMENTO JA APROVADO";
        print '</font>';
    }
    print '<br>';
    print '<p align=left>';
    print 'STATUS DEPOIS DA APROVAÇÃO';
    $sqltudo = mysql_query("select  * FROM controle_documentos  where  id=('$id_fixo')")  or die(mysql_error());           
    $colunas = mysql_num_rows($sqltudo);
	   print'<br>';	
	   print'<br>';   	
       print'<table border="1"   bordercolor="#00BFFF" >';
	   print'<tr>';
	   print'<td><b>ID</td>';	   
	   print'<td><b>DESCRICAO</td>';
       print'<td><b>DPTO</td>';	   
       print'<td><b>APROVADOR</td>';
	   print'<td><b>DOCUMENTO</td>';
       print'<td><b>STATUS</td>';
	   
	   print'</tr></b>';
           for($j = 0; $j < $colunas; $j++){/*caso no mesmo dia tenha mais eventos continua imprimindo */
           $id = @mysql_result($sqltudo, $j, "id");			   		   
           $descricao = @mysql_result($sqltudo, $j, "descricao");
           $aprovador = @mysql_result($sqltudo, $j, "aprovador");
           $status = @mysql_result($sqltudo, $j, "status");
           $dpto = @mysql_result($sqltudo, $j, "dpto");
           $url_documento = @mysql_result($sqltudo, $j, "url_documento");           
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
		   
		   print '</tr>';	
	   
           }
	    print'</table>';
		print '<br>';
		print '<hr>';
		

?>					<a href="listar_pesquisa.php">[V O L T A R  ]</a>
                    </div>
                </div>
            </div>
        </div>
		
    </section>
	
	<br>

<br>


</body>

</html>


