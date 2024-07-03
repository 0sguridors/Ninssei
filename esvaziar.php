<?php

$query = "TRUNCATE pedidos";
mysqli_query($conexao,$query) or die(mysql_error());

?>
<div>
    <br>
    <h2><?php echo "Carrinho esvaziado"?></h2>
    <a href=?pagina=todos-produtos.php class=btn>Voltar a todos os produtos</a>
</div>