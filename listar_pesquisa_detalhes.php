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
	<link rel="stylesheet" href="./style.css">	
</head>

<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script><script  src="./script.js"></script>
<body>

            
                    <h1 class="title has-text-grey">DETALHES DOS DOCUMENTOS</h1>
					<h2 class="title has-text-grey"><font size=4><center>[Tecnologia da Informação]</font></h2>                   
					</center><br><br><br><p align=right>
					<a href="listar_pesquisa.php">VOLTAR?</a>
					<p align="left">

</p>
                    <div class="box">
					<p align=left>					
				   <img src=css/logo.png><br></p>
				   <center>
					<font size=2>
                
					
					
					                 
					
					<?php 
   include "sql_t.i.php";//conexão com o banco de dados   
   @mysql_select_db($db);//selecione o banco de dados
// SELECT NO BANCO PARA CRIAR A TABELA COM OS DADOS E IMPRIMIR NA TELA   
	$id_retorno = $_GET['id'];
	
	
	$sqltudo = mysql_query("select  * FROM controle_documentos  where id =('$id_retorno')and D_E_L_E_T_E is NULL  order by id ")  or die(mysql_error());           
    $colunas = mysql_num_rows($sqltudo);	   
	
	   print '<font size=2';
	   print'<br>';	
	   print'<br>';		   	
       print'<table border="1"   bordercolor="#00BFFF" >';
	   print'<tr>';	   
	   print'<td><b>ID</td>';	          
	   print'<td><b>PEDIDO</td>';
       print'<td><b>FORNECEDOR</td>';
       print'<td><b>VENCIMENTO</td>';
       print'<td><b>PARCELAS</td>';
       print'<td><b>C.C</td>';
       print'<td><b>PLANO FINANCEIRO</td>';
       print'<td><b>OBSERVACOES DO TITULO</td>';
       print'<td><b>DADOS BANCARIOS</td>';
       print'<td><b>FAVORECIDO</td>';
       print'<td><b>BANCO</td>';
       print'<td><b>AGENCIA</td>';
       print'<td><b>CONTA</td>';
       print'<td><b>PIX</td>';

	      
	   print'</tr></b>';
           for($j = 0; $j < $colunas; $j++){/*caso no mesmo dia tenha mais eventos continua imprimindo */
           $id = @mysql_result($sqltudo, $j, "id");/*pegando os valores do banco referente ao evento*/
           $descricao = @mysql_result($sqltudo, $j, "descricao");
           $dpto = @mysql_result($sqltudo, $j, "dpto");
           $aprovador = @mysql_result($sqltudo, $j, "aprovador");
           $status = @mysql_result($sqltudo, $j, "status");
		   $data_aprovacao = @mysql_result($sqltudo, $j, "data_aprovacao");
		   $usuario_aprovacao = @mysql_result($sqltudo, $j, "usuario_aprovacao");
           $url_documento = @mysql_result($sqltudo, $j, "url_documento");                  
		   $hash = @mysql_result($sqltudo, $j, "hash");
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
		  
	   /*print '<table border=1>';/*monta a tabela de eventos*/

	       print'<tr>';
	       print '<td>'.$id.'<a href="listar_pesquisa_update.php?id='.$id.'"><img src=images/relogio.jpg width=20 height=20"></a>';	   
			   print'<td>'.$pedido.'</td>';	   	   	   
			   print'<td>'.$fornecedor.'</td>';	   	   	   
			   print'<td>'.$vencimento.'</td>';	   	   	   
			   print'<td>'.$parcelas.'</td>';	   	   	   
			   print'<td>'.$cc.'</td>';	   	   	   
			   print'<td>'.$planofinanceiro.'</td>';	   	   	   
			   print'<td>'.$observacao.'</td>';	   	   	   
			   print'<td>'.$dadosbancarios.'</td>';	   	   	   
			   print'<td>'.$favorecido.'</td>';	   	   	   
			   print'<td>'.$banco.'</td>';	   	   	   
			   print'<td>'.$agencia.'</td>';	   	   	   
			   print'<td>'.$conta.'</td>';	   	   	   
			   print'<td>'.$pix.'</td>';	
			   
			}
	
?>


					</div>
                </div>
            </div>
        </div>
        
  
    </section>
    

</body>
</html>
