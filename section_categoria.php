<section class="category" id="category">

<h1 class="heading">Compre por <span>Categorias</span></h1>
<div class="box-container">

<?php
$sql = "SELECT * FROM categoria";
$query = mysqli_query($conexao, $sql);
while($linha = mysqli_fetch_array($query)){
echo '
<div class="box">
<h3>'.$linha['categoria'].'</h3>
<img src="images/'.$linha['imagem'].'" alt="'. $linha['imagem'].'">
<p></p>
<a href="?pagina=categorias.php&id='.$linha['id_categoria'].'" class="btn">Ver Detalhes!</a>
</div>
';
}
?>

</div>

</section>