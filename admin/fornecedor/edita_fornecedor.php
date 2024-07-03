<?php


$cnpj        = mysqli_real_escape_string($conexao, trim($_POST['cnpj'])        );
$nome        = mysqli_real_escape_string($conexao, trim($_POST['nome'])        );
$telefone    = mysqli_real_escape_string($conexao, trim($_POST['telefone'])    );
$email       = mysqli_real_escape_string($conexao, trim($_POST['email'])       );
$endereco    = mysqli_real_escape_string($conexao, trim($_POST['endereco'])    );
$cep         = mysqli_real_escape_string($conexao, trim($_POST['cep'])         );


$id = pos_arr('id_fornecedor', $_GET, 0);
if($id == ''){
  $id = 0;
}
$cmdSql = "SELECT * FROM fornecedor WHERE id_fornecedor=$id";
$result = mysqli_query($conexao, $cmdSql);

if(mysqli_num_rows($result) > 0){

  $query = "UPDATE fornecedor SET
      cnpj        = '$cnpj',
      nome        = '$nome',
      telefone    = '$telefone',
      email       = '$email',
      endereco    = '$endereco',
      cep         = '$cep'
    WHERE id_fornecedor = $id";

}else{


  $query =
    "INSERT INTO fornecedor (
      cnpj     ,
      nome     ,
      telefone ,
      email    ,
      endereco ,
      cep
    ) VALUES (
      '$cnpj',
      '$nome',
      '$telefone',
      '$email',
      '$endereco',
      '$cep'
    )";
}




mysqli_query($conexao,$query) or die(mysqli_error($conexao));
$conexao->close();

mensagem("Cadastro concluido com sucesso. <a href=\"?pagina=admin/fornecedor/lista_cadastro_fornecedor.php\">clique aqui</a> para voltar ");


?>
