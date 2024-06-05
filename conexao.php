<?php
define('HOST', 'localhost');
define('USUARIO', 'root');
define('SENHA', 'L0t1s4!@#');
define('DB', 'tecnologia');

$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possível conectar');