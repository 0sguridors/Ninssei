<?php

$nome            = mysqli_real_escape_string($conexao, trim($_POST['nome'])          );
$cpf             = mysqli_real_escape_string($conexao, trim($_POST['cpf'])           );
$dtnasc          = mysqli_real_escape_string($conexao, trim($_POST['dtnasc'])        );
$telefone        = mysqli_real_escape_string($conexao, trim($_POST['telefone'])      );
$email           = mysqli_real_escape_string($conexao, trim($_POST['email'])         );
$endereco        = mysqli_real_escape_string($conexao, trim($_POST['endereco'])      );
$cep             = mysqli_real_escape_string($conexao, trim($_POST['cep'])           );
$senha           = mysqli_real_escape_string($conexao, trim($_POST['senha'])         );
$administrador   = mysqli_real_escape_string($conexao, trim($_POST['administrador']) );

$id = pos_arr('id_cliente', $_GET, 0);
if($id == ''){
  $id = 0;
}
$sql = "SELECT * FROM cliente WHERE id_cliente = $id";
$result = mysqli_query($conexao, $sql);

if(mysqli_num_rows($result) > 0){
  $linha = mysqli_fetch_array($result);
  if($senha == ''){
    $senha = $linha['senha'];
  }else{
    $senha = md5($senha);
  }

  $query = "UPDATE cliente SET
    nome            = '$nome',
    cpf             = '$cpf',
    dtnasc          = '$dtnasc',
    telefone        = '$telefone',
    email           = '$email',
    endereco        = '$endereco',
    cep             = '$cep',
    senha           = '$senha',
    administrador   = '$administrador'
    WHERE id_cliente = $id";

}else{
  $senha = md5($senha);

  $query =
  "INSERT INTO cliente (
    nome          ,
    cpf           ,
    dtnasc        ,
    telefone      ,
    email         ,
    endereco      ,
    cep           ,
    senha         ,
    administrador
  ) VALUES(
    '$nome'            ,
    '$cpf'             ,
    '$dtnasc'          ,
    '$telefone'        ,
    '$email'           ,
    '$endereco'        ,
    '$cep'             ,
    '$senha'           ,
    '$administrador'
  )";
}

mysqli_query($conexao,$query) or die(mysqli_error($conexao));
$conexao->close();

mensagem("Cadastro concluido com sucesso. <a href=\"?pagina=admin/cliente/lista_cadastro_cliente.php\">clique aqui</a> para voltar ");


?>
