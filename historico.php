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






<body>

    <section class="hero is-success is-fullheight">
	
        
            <div class="container has-text-centered">	
        
                
                    <h1 class="title has-text-grey">HISTORICO DE VALIDACAO DE DOCUMENTOS</h1>
					<h2 class="title has-text-grey"><font size=4>[Tecnologia da Informação]</font></h2>        
                    
                    <div class="box">
                    <p align=left>
                    <img src=css/logo.png><br></p>

					
                    


					
					

					
					<?php 
   include "sql_t.i.php";//conexão com o banco de dados
   
   @mysql_select_db($db);//selecione o banco de dados
    $id_fixo = $_GET['id'];
	
	$sqltudo = mysql_query("select  * FROM controle_documentos_historico where  id_historico=('$id_fixo')")  or die(mysql_error());
           
           $colunas = mysql_num_rows($sqltudo);

	   print'<br>';	

	   print'<br>';   	
       print'<table border="1"   bordercolor="#00BFFF" >';
	   print'<tr>';
	   print'<td><b>ID</td>';	   
	   print'<td><b>DATA CRIACAO</td>';
	   print'<td><b>DATA APROVACAO</td>';
	   print'<td><b>APROVADOR</td>';
       print'<td><b>EMAIL APROVADOR</td>';
	   print'<td><b>STATUS</td>';
	   
	   
	   print'</tr></b>';
           for($j = 0; $j < $colunas; $j++){/*caso no mesmo dia tenha mais eventos continua imprimindo */
           $id = @mysql_result($sqltudo, $j, "id");			   		   
           $data_criacao = @mysql_result($sqltudo, $j, "data_criacao");
           $usuario_cadastro = @mysql_result($sqltudo, $j, "usuario_cadastro");
           $status = @mysql_result($sqltudo, $j, "status");
           $aprovador = @mysql_result($sqltudo, $j, "aprovador");
		   $data_cadastro = @mysql_result($sqltudo, $j, "data_cadastro");
           $email_aprovador = @mysql_result($sqltudo, $j, "email_aprovador");
           
		   print'<tr>';
		   print'<td>'.$id.'</td>';	   	   	   
		   print '<td>'.$data_criacao.'</td>';
		   print '<td>'.$data_cadastro.'</td>';
		   print '<td>'.$aprovador.'</td>';
           print '<td>'.$email_aprovador.'</td>';
		   print '<td>'.$status.'</td>';	     
		   
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


