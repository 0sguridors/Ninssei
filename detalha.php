<?php

$id_produto = $_GET['id'];
$query = "SELECT produtos.nome, produtos.preco_venda, produtos.desconto, produtos.descricao, produtos.arqimagem, produtos.desconto, produtos.quantidade FROM produtos WHERE produtos.id_produto = $id_produto";
$result = mysqli_query($conexao, $query);
$linha = mysqli_fetch_array($result);
$prod_nome = $linha['nome'];
$prod_precovenda = $linha['preco_venda'];
$prod_desconto = $linha['desconto'];
$prod_descricao  = $linha['descricao'];
$prod_img = $linha['arqimagem'];
$preco_promocao = $prod_precovenda - ($prod_precovenda * $prod_desconto);
$quant = $linha['quantidade'];

$status1 = 'Disponível';
$status2 = 'Indisponível';

?>
<section>
<div class="product-container">
    <div class="product-image">
            <img src="images\<?php echo $prod_img; ?>" alt="<?php echo $prod_nome; ?>">
    </div>

        <div class="product-details">
            <a href="#" class="fas fa-heart"></a>
            <h1><?php echo $prod_nome; ?></h1>
            <h4><?php echo $prod_descricao; ?></h4>
            <h2>
            <h2>
            <?php
            if ($prod_desconto > 0) {
                    echo "<div class=\"price\">R$" . number_format($preco_promocao,2,",",".");
                    $valor_unit = $preco_promocao;
            } else {
                    echo "<div class=\"price\"> <br> R$" . number_format($prod_precovenda,2,",",".");
                    $valor_unit = $prod_precovenda;
            }
            ?>
            </h2>
            <h4>
            <?php
            if ($prod_desconto > 0) {
            echo "<div class=\"price\">" . "<span> Desconto de: " . number_format(($prod_desconto*100),0,',','.') . "%<br> <span> Preço original: R$" . number_format($prod_precovenda,2,",",".");
            }
            ?>
            </h4>
            <br>
            <span>Quantidade:</span>
            <br>
            <input type="number" min="1" max="1000" value="1" class=''>
            <h4><?php echo $quant . " unidades disponíveis <span>" ?></h4>
            </br>
            <h3>
            <?php
            if ($quant < 1) {
                  echo $status2 . '<br>' . "<a href=\"?pagina=todos-produtos.php\" class=\"btn\">Voltar a todos os produtos</a>";
            } else {
                  echo $status1 . '<br>' . "<a href=\"?pagina=carrinho.php&id=$id_produto&valor_unit=$valor_unit\" class=\"btn\">Adicionar ao carrinho</a>";;
            }
            ?>
            </h3>
            </h4>

</section>  