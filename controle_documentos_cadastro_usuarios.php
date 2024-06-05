<?php
session_start();
include('verifica_login.php');
?>
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
<?php

//criar a conexÃ£o com o banco

include "sql_t.i.php";



if(isset($_POST['done'])){   

    $nome = $_POST['nome'];
    $email = $_POST['email'];
	$senha = $_POST['senha'];
	$usuario = $_POST['usuario'];
    $usuario_cadastro = $_SESSION['usuario'];	
    
	if(empty($nome) || empty($email)|| empty($senha)|| empty($usuario)){
	
        $erro = "Atenção, você deve preencher todos os campos";
	
    }else{        

       $sql = mysql_query("INSERT INTO `controle_documentos_aprovador`(`data_cadastro`,`nome`, `email`,`senha`,`usuario` ,`user`) VALUES (now(),'$nome', '$email','$senha','$usuario','X')") or die(mysql_error());
	   

            if($sql){

                $erro2 = "Dados cadastrados com sucesso!";

              } else{

                  $erro = "Não foi possivel cadastrar os dados";

              }

    }

}

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
			<li><a href="controle_documentos_cadastro_usuarios.php">Usuarios</a></li>								
            <li><a href="controle_documentos_cadastro_aprovador.php">Aprovadores</a></li>							
				<li><a href="init.php">Aprovacao</a></li>							
			</ul>
			<li><a href="listar_pesquisa.php">Home</a></li>
<li><a href="logout.php">Sair</a>
</li>
</ul>
</nav>
<!-- partial -->
<body>
 <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script><script  src="./script.js"></script>
    <section class="hero is-success is-fullheight">
        
            			
                <div class="column is-4 is-offset-4">
				
                    <h1 class="title has-text-grey">CADASTRO DE USUARIOS</h1><center>
					<h2 class="title has-text-grey"><font size=4>[Tecnologia da Informação]</font></h2>                   
					
					<br>
                    <div class="box">
                        <form name="form1" action="controle_documentos_cadastro_usuarios.php" method="POST">
						<?php
if(isset($erro)){
    print '<div style="width:80%; background:red; color:Black; padding: 5px 0px 5px 0px; text-align:center; margin: 0 auto;">'.$erro.'</div>';
}
if(isset($erro2)){
    print '<div style="width:80%; background:green; color:Black; padding: 5px 0px 5px 0px; text-align:center; margin: 0 auto;">'.$erro2.'</div>';
}
?>	
                            <div class="field">
                                <div class="control">  
								<img src=css/logo.png><br></p>
								<br>                                  
									<input name="nome"   class="input is-large" placeholder="nome" autofocus="" onkeyup="maiuscula(this)">									
									<input name="email"  class="input is-large" placeholder="email" autofocus="" >
									<input name="usuario"  class="input is-large" placeholder="usuario" autofocus="" >
									<input name="senha"  class="input is-large" placeholder="senha" autofocus="" >
									

                                </div>
                            </div>
                            
                            <button type="submit" onclick="" class="button is-block is-link is-large is-fullwidth">CADASTRAR</button><input type="hidden" name="done"  value="" />
                        </form>
                        ultimos Cadastros...
                        <?php 
   include "sql_t.i.php";//conexão com o banco de dados
   
   @mysql_select_db($db);//selecione o banco de dados    
    
    $sqltudo = mysql_query("select  * FROM controle_documentos_aprovador where user='X'")  or die(mysql_error());           
    $colunas = mysql_num_rows($sqltudo);
	   print'<br>';	
	   print'<br>';   	
       print'<table border="1"   bordercolor="#00BFFF" >';
	   print'<tr>';
	   print'<td><b>ID</td>';	   
	   print'<td><b>NOME</td>';
       print'<td><b>EMAIL</td>';	   
       print'<td><b>USUARIO</td>';  
	   
	   print'</tr></b>';
           for($j = 0; $j < $colunas; $j++){/*caso no mesmo dia tenha mais eventos continua imprimindo */
           $id = @mysql_result($sqltudo, $j,"id");			   		   
           $nome = @mysql_result($sqltudo, $j,"nome");
           $email = @mysql_result($sqltudo, $j,"email");
           $usuario = @mysql_result($sqltudo, $j,"usuario");           
		   print'<tr>';
		   print'<td>'.$id.'</td>';	   	   	   
		   print '<td>'.$nome.'</td>';
           print '<td>'.$email.'</td>';
		   print '<td>'.$usuario.'</td>';
		   
		   print '</tr>';	
	   
           }
        ?>
						
                    </div>
                </div>
            </div>
        </div>
    </section>
	
	
<br>

</body>

</html>


