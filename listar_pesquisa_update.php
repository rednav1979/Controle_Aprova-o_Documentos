<?php
session_start();
include('verifica_login.php');
?>
<script language="javascript" type="text/javascript">

function maiuscula(z){
        v = z.value.toUpperCase();
        z.value = v;
    }	
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
<br>
<body> 
	


			<div class="column is-4 is-offset-4">
                    <h1 class="title has-text-grey">ATUALIZAÇÃO DE ATIVOS</h1><center>
					<h2 class="title has-text-grey"><font size=4>[Tecnologia da Informação]</font></h2> </center><br>
					
					<?php

//criar a conexÃ£o com o banco

include "sql_t.i.php";



if(isset($_POST['done'])){   


    //INICIO DE UPDATE DOS CAMPOS
    $id_novo = $_POST['id'];
	$pedido = $_POST['pedido'];	
    $fornecedor = $_POST['fornecedor'];
    $vencimento = $_POST['vencimento'];
	$parcelas = $_POST['parcelas'];
	$cc = $_POST['cc'];
	$planofinanceiro = $_POST['planofinanceiro'];
	$dadosbancarios = $_POST['dadosbancarios'];
	$favorecido = $_POST['favorecido'];
	$banco = $_POST['banco'];
	$conta = $_POST['conta'];
	$pix = $_POST['pix'];
	$agencia = $_POST['agencia'];
	$observacao = $_POST['observacao'];
	$id_retorno = $_POST['id_retorno'];
       
	   $sqltudo = mysql_query("update controle_documentos  set  agencia='$agencia',observacao='$observacao',pedido='$pedido',fornecedor='$fornecedor',vencimento='$vencimento',parcelas='$parcelas',cc='$cc',planofinanceiro='$planofinanceiro',dadosbancarios='$dadosbancarios',favorecido='$favorecido',banco='$banco',conta='$conta',pix='$pix' where id='$id_retorno'")  or die(mysql_error());
       $sqltudo2 = mysql_query("INSERT INTO `controle_documentos_historico`(`data_criacao`,`data_cadastro`,`aprovador`,`email_aprovador`,`status`,`id_historico` ) VALUES (now(),'---','---','$usuario_cadastro', 'ATUALIZACAO DE DETALHES','$id_retorno')") or die(mysql_error());
	   
            if($sqltudo){
				print '<center>';
				print '<font size=4 color=green>';
                print  "Dados cadastrados com sucesso!";
				print '</font>';

              } else{
				print '<font size=4 color=red>';
                  print "Não foi possivel cadastrar os dados";
				  print '</font>';
				  print '</center>';

              }

    }

    

?>
					<br><br><br><br>

                    <div class="box">


<font size=1>  
  <form name="form1" action="listar_pesquisa_update.php" method="POST">


<p align=left>
				   <img src=css/logo.png><br></p>

					
				<?php 
   include "sql_t.i.php";//conexão com o banco de dados   
   @mysql_select_db($db);//selecione o banco de dados
	$id_retorno = $_GET['id'];
	$sqltudo = mysql_query("select  * FROM controle_documentos  where id =('$id_retorno')  order by id ")  or die(mysql_error());           
    $colunas = mysql_num_rows($sqltudo);	   
	         
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

           }
   
	   print'</table>';

?>

<form name="form2" action="atualiza.php" method="POST">

  <div class="field">
                                <div class="control">                                    									
									
									<input type="text" placeholder="PEDIDO" name="pedido"  value="<?php echo $pedido; ?>" class="input is-large" onkeyup="maiuscula(this)"/>
									<input type="text" placeholder="FORNECEDOR" name="fornecedor" value="<?php echo $fornecedor; ?>"class="input is-large" onkeyup="maiuscula(this)"/>									
									<input type="text" placeholder="VENCIMENTO" name="vencimento" value="<?php echo $vencimento; ?>"class="input is-large" onkeyup="maiuscula(this)"/>									
									<input type="text" placeholder="PARCELAS" name="parcelas" value="<?php echo $parcelas; ?>"class="input is-large" onkeyup="maiuscula(this)"/>									
									<input type="text" placeholder="C.C" name="cc" value="<?php echo $cc; ?>"class="input is-large" onkeyup="maiuscula(this)"/>									
									<input type="text" placeholder="PLANO FINANCEIRO" name="planofinanceiro" value="<?php echo $planofinanceiro; ?>"class="input is-large" onkeyup="maiuscula(this)"/>									
									<input type="text" placeholder="OBSERVACOES DO TITULO" name="observacao" value="<?php echo $observacao; ?>"class="input is-large" onkeyup="maiuscula(this)"/>									
									<input type="text" placeholder="DADOS BANCARIOS" name="dadosbancarios" value="<?php echo $dadosbancarios; ?>"class="input is-large" onkeyup="maiuscula(this)"/>									
									<input type="text" placeholder="FAVORECIDO" name="favorecido" value="<?php echo $favorecido; ?>"class="input is-large" onkeyup="maiuscula(this)"/>									
									<input type="text" placeholder="BANCO" name="banco" value="<?php echo $banco; ?>"class="input is-large" onkeyup="maiuscula(this)"/>									
									<input type="text" placeholder="AGENCIA" name="agencia" value="<?php echo $agencia; ?>"class="input is-large" onkeyup="maiuscula(this)"/>									
									<input type="text" placeholder="CONTA" name="conta" value="<?php echo $conta; ?>"class="input is-large" onkeyup="maiuscula(this)"/>									
									<input type="text" placeholder="PIX" name="pix" value="<?php echo $pix; ?>"class="input is-large" onkeyup="maiuscula(this)"/>									
									<td><input type="hidden" enable="false" name="id_retorno" value="<?php echo $id_retorno; ?>" size=6/></td></tr>

									
									
										
									
																	
									
                                </div>
                            </div>
                            
                            <button type="submit" onclick="" class="button is-block is-link is-large is-fullwidth">ATUALIZAR</button><input type="hidden" name="done"  value="" />
                        </form>

						
						

						
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>