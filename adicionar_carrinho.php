<?php
function conectar() {
    $host_db     = "localhost";
    $user_db     = "ninssei";
    $password_db = "ninssei";
    $db          = "ninssei";

    $conexao     = mysqli_connect($host_db, $user_db, $password_db, $db) or die(mysql_error());
    return $conexao;
}
$conexao = conectar();
$id_cliente = 1;
$id_produto = $_GET['id'];
$qtd_produto = 1;

$query = "INSERT INTO pedidos (id_cliente, id_produto, qtd_produto) VALUES ($id_cliente, $id_produto, $qtd_produto)";
$result = mysqli_query($conexao,$query) or die(mysql_error() . "<br><br>" . $query);
?>

