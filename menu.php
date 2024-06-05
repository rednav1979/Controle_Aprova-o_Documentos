
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
            
                    <h1 class="title has-text-grey">MENU DO SISTEMA</h1>
					<h2 class="title has-text-grey"><font size=4><center>[Tecnologia da Informação]</font></h2>                   
					</center><br><br><br>
<?php

print '<nav class="nav">';
print '<ul>';
if ($usuario_cadastro == 'vanderlei'){
print'<li><a href="listar_pesquisa.php">Home</a></li>';
}
print'<li><a href="aprovar_n_autenticado.php">Aprovar</a></li>';
print'</li>';
print'</ul>';
print'</nav>';
?>
</body>
</html>
