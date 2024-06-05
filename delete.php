<?php
session_start();
include('verifica_login.php');
?>
<?php
$usuario_cadastro = $_SESSION['usuario'];
print '<p>';
print 'Olá: ';
print $usuario_cadastro;
print '<p>';
print 'Seja Bem Vindo(a).';
print '<br>';
?> 
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
<?php
	$colaborador_retorno = $_GET['id'];
	
?>
<script language="javascript" type="text/javascript">

function maiuscula(z){
        v = z.value.toUpperCase();
        z.value = v;
    }	
</script>
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
    
	
        
            
                <br>
                    <h1 class="title has-text-grey">DELETAR REGISTROS</h1><center>
					<h2 class="title has-text-grey"><font size=4>[Tecnologia da Informação]</font></h2>
					<font color=red>
					<?php print 'Por Favor, '.$usuario_cadastro.' confirme a exclusao do registro!'?>;
</font>
					<p align=right><font size=2 color=blue><a href =listar_pesquisa.php>VOLTAR?</a></font>
                    <div class="box">
					<p align=left>
				   <img src=css/logo.png><br></p>
                    <font size=2>			

					<?php 
   include "sql_t.i.php";//conexão com o banco de dados   
   @mysql_select_db($db);//selecione o banco de dados	
   $sqltudo = mysql_query("select  * FROM controle_documentos  where  id=('$colaborador_retorno')")  or die(mysql_error());
           
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
<br>		
		<form name="form1" action="delete_confirma.php?id=<?php echo $id; ?>" method="post">
<input type="submit" value="Confirmar" /><input type="hidden" name="done"  value="" />

</form>
                    </div>
                </div>
            </div>
        </div>
    </section>
	



</body>

</html>

