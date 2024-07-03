
    <section class="category" id="category">

        <h1 class="heading">Todos os <span>Produtos</span></h1>
        <div class="box-container">
    <?php
    $contador = 1;
    $query = "SELECT produtos.id_produto, produtos.nome, produtos.preco_venda, produtos.desconto, produtos.arqimagem FROM produtos ORDER BY produtos.nome ASC";
    $result = mysqli_query($conexao,$query) or die(mysql_error() . "<br><br>" . $query);
    while ($linha = @mysqli_fetch_array($result)) {
        $idproduto = $linha['id_produto'];
        $desconto = $linha['desconto'];
        $nome = $linha['nome'];
        $preco_normal = $linha['preco_venda'];
        $prod_img = $linha['arqimagem'];
        $preco_promocao = $preco_normal - ($preco_normal * $desconto);
        ?>
            <div class="box">
                <span class="discount">&nbsp;</span>
                    <img src="images/<?php echo $prod_img; ?>" alt="<?php echo $nome; ?>">
                    <h4><?php echo $linha['nome']; ?></h4>
                <?php
                    if ($desconto > 0.00) {
                        echo "<div class=\"price\">". "<span>-" . number_format(($desconto*100),0,',','.') . "% <span> <br> R$" . number_format($preco_promocao,2,",",".");
                    } else {
                        echo "<div class=\"price\"> R$" . number_format($preco_normal,2,",",".");
                    }
                ?>
                <br>
                    <a href="?pagina=detalha.php&id=<?php echo $idproduto;?>" class="btn">Ver Detalhes</a>
            </div>
        </div>
        <?php
        $contador++;
        if ($contador == 5) {
            echo "</div>";
            echo "<div class=\"box-container\">";
            $contador = 0;
        }
    }
    ?>
        </div>
    </section>
