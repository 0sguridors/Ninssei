<?php

$nome          = mysqli_real_escape_string($conexao, trim($_POST['nome']));
$quantidade    = mysqli_real_escape_string($conexao, trim($_POST['quantidade']));
$descricao     = mysqli_real_escape_string($conexao, trim($_POST['descricao']));
$categoria     = mysqli_real_escape_string($conexao, trim($_POST['categoria']));
$preco_compra  = mysqli_real_escape_string($conexao, trim($_POST['preco_compra']));
$preco_venda   = mysqli_real_escape_string($conexao, trim($_POST['preco_venda']));
$desconto      = mysqli_real_escape_string($conexao, trim($_POST['desconto']));

$quantidade   = floatval($quantidade   );
$preco_compra = floatval($preco_compra );
$preco_venda  = floatval($preco_venda  );
$desconto     = floatval($desconto     );

$desconto = $desconto / 100;


$arqimagem     = $_FILES['arqimagem'];
$imageFileType = @explode('.', $arqimagem['name'])[1];

$target_dir = "images/";
$target_file = $target_dir . basename($arqimagem["name"]);

$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

$filename = $arqimagem["name"];

if($filename <> ''){
    if(file_exists($target_file)){
      unlink($target_file);
    }
    move_uploaded_file($arqimagem["tmp_name"], $target_file);
}

$id = pos_arr('id_produto', $_GET, 0);
if($id == ''){
  $id = 0;
}
$cmdSql = "SELECT * FROM produtos WHERE id_produto=$id";
$result = mysqli_query($conexao, $cmdSql);

if(mysqli_num_rows($result) > 0){

  if($filename == ''){
    $filename = mysqli_fetch_array($result)['arqimagem'];
  }

  $query = "UPDATE produtos SET
    nome         =  '{$nome}'        ,
    quantidade   =  {$quantidade}    ,
    descricao    =  '{$descricao}'   ,
    categoria    =  '{$categoria}'   ,
    preco_compra =  {$preco_compra}  ,
    preco_venda  =  {$preco_venda}   ,
    desconto     =  {$desconto}      ,
    arqimagem    =  '{$filename}'
    WHERE id_produto = $id";

}else{


  $query =
    "INSERT INTO produtos (
      nome         ,
      quantidade   ,
      descricao    ,
      categoria    ,
      preco_compra ,
      preco_venda  ,
      desconto     ,
      arqimagem
    ) VALUES (
      '{$nome}',
      {$quantidade},
      '{$descricao}',
      '{$categoria}',
      {$preco_compra},
      {$preco_venda},
      {$desconto},
      '{$filename}'
  )";
}




mysqli_query($conexao,$query) or die(mysqli_error($conexao));
$conexao->close();

mensagem("Cadastro concluido com sucesso. <a href=\"?pagina=admin/produtos/lista_cadastro_produtos.php\">clique aqui</a> para voltar ");


?>
