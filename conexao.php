<?php


function conectar() {
    $host_db     = "localhost";
    $user_db     = "ninssei";
    $password_db = "ninssei";
    $db          = "ninssei";

    $conexao     = mysqli_connect($host_db, $user_db, $password_db, $db) or die(mysql_error());
    return $conexao;
}

function pos_arr($posicao, $array, $default){
    return array_key_exists($posicao, $array) ? $array[$posicao] : $default;
}

function mensagem($mensagem){
    include('./mensagem.php');
}

session_start();
$usuario = array_key_exists('usuario_logado', $_SESSION) ? $_SESSION['usuario_logado'] : NULL;


$conexao = conectar();

?>


