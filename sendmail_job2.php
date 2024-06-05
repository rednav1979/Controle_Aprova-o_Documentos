
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
<br>
<body>

                    <?php 
   include "sql_t.i.php";//conexão com o banco de dados
   @mysql_select_db($db);//selecione o banco de dados   
           
           
		 
   $sqltudo3 = mysql_query("update `controle_documentos` set controle=NULL where status='PENDENTE'") or die(mysql_error());           



?>
</body>
</html>