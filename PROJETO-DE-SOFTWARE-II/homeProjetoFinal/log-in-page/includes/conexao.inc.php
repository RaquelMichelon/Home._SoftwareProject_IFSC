<?php

// https://www.youtube.com/watch?v=GAGRrVVD3js

define('HOST', '127.0.0.1');
define('USUARIO', 'root');
define('SENHA', 'root');
define('DB', 'abmr');

$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die("Não foi possível conectar ao banco");

?>