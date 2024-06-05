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
                    <h1 class="title has-text-grey">LISTAR ATIVOS</h1><center>
					<h2 class="title has-text-grey"><font size=4>[Tecnologia da Informação]</font></h2>				   
					<p align=right><font size=2 color=blue><a href =listar_pesquisa.php>VOLTAR?</a></font>
                    <div class="box">
					<p align=left>
				   <img src=css/logo.png><br></p>
                    <font size=2>			

	<?php 
   include "sql_t.i.php";//conexão com o banco de dados   
   @mysql_select_db($db);//selecione o banco de dados	
	$sqltudo = mysql_query("update controle_documentos  set D_E_L_E_T_E='S' Where id='$colaborador_retorno'  order by id ")  or die(mysql_error());
	print 'Marcando registro como deletado:';
	print '<font color=green>';
	print 'OK';
	print '</font>';
	print '<br>';
	$sqltudo = mysql_query("update controle_documentos_historico  set D_E_L_E_T_E='S' Where id_historico='$colaborador_retorno'  order by id ")  or die(mysql_error());
	print 'Marcando registro do historico como deletado:';
	print '<font color=green>';
	print 'OK';
	print '</font>';
	print '<br>';
	
		?>
		



   

                    </div>
                </div>
            </div>
        </div>
    </section>
	



</body>

</html>

