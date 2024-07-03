<?php

$id_categoria = pos_arr('id',$_GET,null);
$linha;
if($id_categoria){
    $query = "SELECT * FROM categoria WHERE categoria.id_categoria = $id_categoria";
    $result = mysqli_query($conexao, $query);
    $linha = mysqli_fetch_array($result);
}
if(!$id_categoria || is_null($linha)){
    $linha = [];
    $linha['categoria']          = '';
    $linha['imagem']    		= '';
    $id_categoria = '';
}

?>
<form  action="?pagina=admin/categoria/edita_categoria.php&id_categoria=<?php echo $id_categoria; ?>"
        method="POST"
        enctype="multipart/form-data"
>
  <div class="form-container">
		<div>
			<label for="fcategoria">categoria</label>
			<input type="text" id="fcategoria" name="categoria" value="<?php echo $linha['categoria'];?>">
		</div>
		<div>
			<label for="fimagem">imagem</label>
			<input type="file" id="fimagem" name="imagem" value="<?php echo $linha['imagem'];?>">
		</div>
		<div class="btn-container">
  			<input type="submit" value="Enviar" class='btn'>
  	</div>
  </div>
</form>
<?php
?>

<div class="btn-container">
  <a href="?pagina=admin/categoria/lista_cadastro_categoria.php" class='btn'>Retornar à consulta de Categoria</a>
</div>
