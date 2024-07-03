<style type="text/css">
    .link_voltar{
        padding: 10px;
        border: 1px solid black;
        background-color: lightblue;
        cursor: pointer;
        color: white;
        background: #1f49ed;
    }
    .link_voltar:hover{
        background: #2c2c54;
    }
</style>

<?php
include ('conexao.php');

$nome     = mysqli_real_escape_string($conexao, trim( $_POST['nome']        ));
$cpf      = mysqli_real_escape_string($conexao, trim( $_POST['cpf']         ));
$email    = mysqli_real_escape_string($conexao, trim( $_POST['email']       ));
$senha    = mysqli_real_escape_string($conexao, trim( md5( $_POST['senha']) ));
$dtnasc   = mysqli_real_escape_string($conexao, trim( $_POST['dtnasc']      ));
$telefone = mysqli_real_escape_string($conexao, trim( $_POST['telefone']    ));
$end      = mysqli_real_escape_string($conexao, trim( $_POST['endereco']    ));
$cep      = mysqli_real_escape_string($conexao, trim( $_POST['cep']         ));


$query = "SELECT email FROM cliente WHERE email = \"$email\"";
$result = mysqli_query($conexao,$query);

if (mysqli_num_rows($result) > 0) {
    mensagem("Este email já está cadastrado. <a class='link_voltar' onclick='history.back()'> clique aqui </a> para voltar");
}else{
    $query = "INSERT INTO cliente (nome, cpf, email, senha, dtnasc, telefone, endereco, cep) VALUES ('$nome', '$cpf', '$email', '$senha', '$dtnasc', '$telefone', '$end', '$cep')";

    mysqli_query($conexao,$query) or die(mysql_error());

    $conexao->close();

    echo "Cadastro concluido com sucesso. <a class='link_voltar' href='index.php?pagina=form_login.php'> clique aqui </a> para voltar";
}

?>
