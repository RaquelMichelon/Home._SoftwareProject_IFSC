<?php

//para o php entender que queremos trabalhar com sessao 
session_start();

//no form o action tem que apontar para essa pg onde as verif. serao feitas login.php

$includeConexao      = "./log-in-page/includes/conexao.inc.php";
require_once $includeConexao;

// include('conexao.php');

//verificacao simples de preenchimento de campos

if(empty($_POST['usuario']) || empty($_POST['senha'])) {
    //se os campos forem vazios, redireciona p tela index.php
    header('Location: ./index.php');
    exit();
}
//funcao para proteger contra ataque de sql injection
$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);


$senhaCriptografada = hash("sha512", senha);

//verificar a query que verifica se o login esta correto
// $query = "SELECT nome, foto_usuario FROM usuario WHERE email = '{$usuario}' AND senha = md5('{$senha}')";

//verificar a query que verifica se o login esta correto
$query = "SELECT nome, foto_usuario, idusuario FROM usuario WHERE email = '{$usuario}' AND senha = '{$senha}'";

// para imprimir a query
// echo $query;
// exit;

//resultado da query
$result = mysqli_query($conexao, $query);

//saber quantas linhas o result retorna
$row = mysqli_num_rows($result);

//para consultar se está retornando 1, se sim, é pq vai dar certo.
// echo $row; exit;

// $dados = mysqli_fetch_array($query, MYSQLI_ASSOC);
// printf($dados['nome'], $dados['foto_usuario']);


if($row == 1) {
    //se login correto, vamos atribuir uma sessao ao usuario
    //para isso é necessario armazenar o username
    $registro = mysqli_fetch_array($result, MYSQLI_NUM); //acessa vetor só por índices numericos

    $nomeusuario = $registro[0];
    $idusuario = $registro[2];

    $_SESSION['nome'] = $nomeusuario; //nome
    $_SESSION['idusuario'] = $idusuario; //id 
    $_SESSION['usuario'] = $usuario; //login email
    // $_SESSION['usuario'] = $dados;
    //essa é a página para o qual o user sera direcionado somente se login e senha forem corretos
    header('Location: http://localhost/PROJETO-DE-SOFTWARE-II/homeProjetoFinal/pg-sidebar-user.php'); // ./painel.php
    exit();

} else {
    //criar sessao nao autenticado
    $_SESSION['nao_autenticado'] = true; //verificar tambem div onde esta o bloco com o alerta linha 21

    header('Location: ./index.php');
    exit();
}

//verificar a necessidade dessa linha aqui
mysqli_close($conexao);


?>