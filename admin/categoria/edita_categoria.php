<?php

$categoria     = mysqli_real_escape_string($conexao, trim($_POST['categoria']));


$imagem     = $_FILES['imagem'];
$imageFileType = @explode('.', $imagem['name'])[1];

$target_dir = "images/";
$target_file = $target_dir . basename($imagem["name"]);

$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

$filename = $imagem["name"];

if($filename <> ''){
    if(file_exists($target_file)){
      unlink($target_file);
    }
    move_uploaded_file($imagem["tmp_name"], $target_file);
}

$id = pos_arr('id_categoria', $_GET, 0);
if($id == ''){
  $id = 0;
}
$cmdSql = "SELECT * FROM categoria WHERE id_categoria=$id";
$result = mysqli_query($conexao, $cmdSql);

if(mysqli_num_rows($result) > 0){

  if($filename == ''){
    $filename = mysqli_fetch_array($result)['imagem'];
  }

  $query = "UPDATE categoria SET
    categoria = '{$categoria}',
    imagem    = '{$filename}'
    WHERE id_categoria = $id";

}else{


  $query =
    "INSERT INTO categoria (
      categoria,
      imagem
    ) VALUES (
      '{$categoria}',
      '{$filename}'
    )";
}




mysqli_query($conexao,$query) or die(mysqli_error($conexao));
$conexao->close();

mensagem("Cadastro concluido com sucesso. <a href=\"?pagina=admin/categoria/lista_cadastro_categoria.php\">clique aqui</a> para voltar ");

?>
