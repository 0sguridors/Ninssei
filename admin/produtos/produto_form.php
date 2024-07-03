<?php

$id_produto = pos_arr('id',$_GET,null);
$linha;
if($id_produto){
    $query = "SELECT * FROM produtos WHERE produtos.id_produto = $id_produto";
    $result = mysqli_query($conexao, $query);
    $linha = mysqli_fetch_array($result);
}
if(!$id_produto || is_null($linha)){
    $linha = [];
    $linha['nome']          = '';
    $linha['quantidade']    = 0;
    $linha['descricao']     = '';
    $linha['categoria']     = '';
    $linha['preco_compra']  = 0;
    $linha['preco_venda']   = 0;
    $linha['desconto']      = 0;
    $linha['arqimagem']     = '';
    $id_produto = '';
}


$status1 = 'Disponível';
$status2 = 'Indisponível';

?>
<form  action="?pagina=admin/produtos/edita_produto.php&id_produto=<?php echo $id_produto; ?>"
        method="POST"
        enctype="multipart/form-data"
>
  <div class="form-container">
		<div>
			<label for="fnome">nome</label>
			<input type="text" id="fnome" name="nome" value="<?php echo $linha['nome'];?>">
		</div>
		<div>
			<label for="fquantidade">quantidade</label>
			<input type="number" step="0.01"  id="fquantidade" name="quantidade" value="<?php echo $linha['quantidade'];?>">
		</div>
		<div>
			<label for="fdescricao">descricao</label>
			<input type="text" id="fdescricao" name="descricao" value="<?php echo $linha['descricao'];?>">
		</div>
		<div>
			<label for="fcategoria">categoria</label>
			<select name="categoria" id="fcategoria" value="<?php echo $linha['categoria'];?>">
				<option >Seleciona uma categoria</option>
				<?php
					$sql = "SELECT * FROM categoria";
					$result = mysqli_query($conexao, $sql);
					while($linha = mysqli_fetch_array($result)){
						echo " <option value=\"{$linha['id_categoria']}\">{$linha['categoria']}</option> ";
					}
				?>
			</select>
		</div>
		<div>
			<label for="fpreco_compra">preco_compra</label>
			<input type="number" step="0.01"  id="fpreco_compra" name="preco_compra" value="<?php echo $linha['preco_compra'];?>">
		</div>
		<div>
			<label for="fpreco_venda">preco_venda</label>
			<input type="number" step="0.01"  id="fpreco_venda" name="preco_venda" value="<?php echo $linha['preco_venda'];?>">
		</div>
		<div>
			<label for="fdesconto">desconto</label>
			<input type="number" step="0.01"  id="fdesconto" name="desconto" value="<?php echo $linha['desconto'] * 100;?>">
		</div>
		<div>
			<label for="farqimagem">arqimagem</label>
			<input type="file" id="farqimagem" name="arqimagem" value="<?php echo $linha['arqimagem'];?>">
		</div>
		<div class="btn-container">
  			<input type="submit" value="Enviar" class='btn'>
  	</div>
  </div>
</form>
<?php
?>

<div class="btn-container">
  <a href="?pagina=admin/produtos/lista_cadastro_produtos.php" class='btn'>Retornar à consulta de produtos</a>
</div>
