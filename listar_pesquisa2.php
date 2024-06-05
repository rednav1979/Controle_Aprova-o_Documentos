
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
<nav class="nav">
<ul>

<li class="drop"><a href="#">||Cadastros||</a>
			<ul class="dropdown">
				<li><a href="controle_documentos_cadastro_aprovador.php">Aprovadores</a></li>							
				<li><a href="init.php">Aprovacao</a></li>							
			</ul>
			<li><a href="listar_pesquisa.php">Home</a></li>
<li><a href="logout.php">Sair</a>
</li>
</ul>
</nav>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script><script  src="./script.js"></script>
<body>
<span id='topo'></span>

<?php
$usuario_cadastro = $_SESSION['usuario'];
print '<p>';
print 'Olá: ';
print $usuario_cadastro;
print '<p>';
print 'Seja Bem Vindo(a).';
print '<br>';
?> 
            
                    <h1 class="title has-text-grey">LISTAR DOCUMENTOS</h1>
					<h2 class="title has-text-grey"><font size=4><center>[Tecnologia da Informação]</font></h2>                   
					</center><br><br><br>
					
					<p align="left">
<form name="form2" action="listar_pesquisa2.php" method="post">
<td>PAGINA:
<select name="colaborador_procura"   autofocus="" >									
<option>SELECIONE</option>
             
           <option>5</option>    
          <option>10</option>
		  <option>50</option>
		  <option>100</option>
		  <option>500</option>
		  <option>1000</option>
		   </select>					
</td>
<td><input type="submit" value="Pesquisar" /><input type="hidden" name="done"  value="" /></td>
</form>
                    <div class="box">
					<p align=left>					
				   <img src=css/logo.png><br></p>
				   <center>
					<font size=2>
                
					
					
					<form name="form1" action="listar_pesquisa.php" method="post">
<td>Pesquisar Por Nome?:
<br>
<input type="text"  name="colaborador_procura" class="campo"/></td></tr>
<tr>
<td></td>
<td><input type="submit" value="Pesquisar" /><input type="hidden" name="done"  value="" /></td>
</tr>
</tbody>
</table>
</form>




                  
					
					<?php 
   include "sql_t.i.php";//conexão com o banco de dados   
   @mysql_select_db($db);//selecione o banco de dados
// SELECT NO BANCO PARA CRIAR A TABELA COM OS DADOS E IMPRIMIR NA TELA   
	$colaborador_retorno = $_POST['colaborador_procura'];
	$sqltudo = mysql_query("select * FROM controle_documentos where D_E_L_E_T_E is NULL order by id  limit $colaborador_retorno")  or die(mysql_error());           
    $colunas = mysql_num_rows($sqltudo);	   
	
	   print '<font size=2';
	   print'<br>';	
	   print'<br>';		   	
       print'<table border="1"   bordercolor="#00BFFF" >';
	   print'<tr>';	   
	   print'<td><b>ID</td>';	   
	   print'<td><b>HISTORICO</td>';
	   print'<td><b>DETALHES</td>';	
	   print'<td><b>DESCRICAO</td>';
	   print'<td><b>DPTO</td>';	   
	   print'<td><b>APROVADOR</td>';
	   print'<td><b>STATUS</td>';
	   print'<td><b>DOCUMENTO</td>';	   
	   print'<td><b>DATA APROVACAO</td>';
	  	   print'<td><b>VALIDAÇÃO</td>';

	   
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
	       print '<td>'.$id.'</td>';
	       print '<td><a href="historico.php?id='.$id.'"><img src=images/historico.jpg></a>';	   	   
	   // INCLUI O NUMERO DE HISTORICOS AO LADO DO ICONE DE HISTORICO
		   include "sql_t.i.php";//conexão com o banco de dados   
           @mysql_select_db($db);//selecione o banco de dados
           $sqltudo2 = mysql_query("SELECT aprovador,count(*)id_historico FROM controle_documentos_historico where id_historico = $id ")  or die(mysql_error());
           $colunas2 = mysql_num_rows($sqltudo2);		  	   
           for($x = 0; $x < $colunas2; $x++){/*caso no mesmo dia tenha mais eventos continua imprimindo */           
           $id_historico = @mysql_result($sqltudo2, $x, "id_historico"); 
		   
		   print $id_historico;	   	   		   		   
	       print'</td>';	   
           }	   
		   //FIM DA INCLUSAO 	
print '<td><a href="listar_pesquisa_detalhes.php?id='.$id.'"><img src=images/historico.jpg></a>';		   
		   print '<td>'.$descricao. '</td>';
		   print '<td>'.$dpto. '</td>';
		   print '<td>'.$aprovador. '</td>';
		   if ($status == "PENDENTE") {			
			print '<td bgcolor=orange>'.$status.'</td>';
			}
		   if ($status == "APROVADO") {			
			print '<td bgcolor=green>'.$status.'</td>';			
		   }
		   
	   // VERIFICA SE TEM TERMO E SE O EQUIPAMENTO NÃO É DA SEDE PARA COLOCAR O BOTAO DE UPLOAD
	   if ($url_documento == ""){	
		print ' <td><form method="post" action="file_upload.php?id='.$id.'" enctype="multipart/form-data">
					<label>Arquivo:</label>
					<input type="file" name="arquivo" />
					<input type="submit" value="Enviar" />
		     		</form></td>';	   			   
				
		       }else{
				print '<td><a href="uploads_documentos/'.$url_documento.'"target="_blank"><img src="images/bolinha_verde.png" width=30 height=30></a>';	
				
			   }
			   print '<td>'.$usuario_aprovacao. '</td>';
			   print '<td>'.$data_aprovacao. '</td>';
			   
			   if ($status == "PENDENTE"){
			   print "<td><a href=sendmail.php?id=$id&aprovador=$aprovador&hash=$hash>SOLICITAR</a></td>";     
			   }else{
				print "<center>";
				print "<td><a href=>OK</a></td>";     
				print "</center>";
			   }
//			   print "<td><a href=listar_pesquisa_elemento_click.php?status=$status&empreendimento=$empreendimento>SOLICITAR</a></td>";
			   
			}
?>


					</div>
					
                </div>
				
            </div>
			
        </div>
  
    </section>
	

</body>
</html>
