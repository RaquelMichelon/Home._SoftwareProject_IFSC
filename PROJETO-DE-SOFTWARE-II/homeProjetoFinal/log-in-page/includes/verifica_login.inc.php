<?php
//nao deixa acessar pg se nao estiver autenticado

session_start();

if(! $_SESSION['usuario']) {
    header('Location: ././index.php');
    exit();
}


?>