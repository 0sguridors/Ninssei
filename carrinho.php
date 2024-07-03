<?php

$conexao = conectar();
if (isset($_GET['id'])) {
    $id_cliente = 1;
    $id_produto = $_GET['id'];
    $qtd_produto = 1;
    $valor_unit = $_GET['valor_unit'];
    $valor = $valor_unit * $qtd_produto;
    $query = "INSERT INTO pedidos (id_cliente, id_produto, qtd_produto, valor) VALUES ($id_cliente, $id_produto, $qtd_produto, $valor)";
    $result = mysqli_query($conexao,$query) or die(mysql_error() . "<br><br>" . $query);
}

$query = "SELECT
            pedidos.id_cliente,
            pedidos.qtd_produto,
            produtos.nome,
            produtos.preco_venda
          FROM
            pedidos
            INNER JOIN produtos
             ON produtos.id_produto = pedidos.id_produto
          WHERE pedidos.id_cliente = 1";
$result = mysqli_query($conexao,$query) or die(mysql_error() . "<br><br>" . $query);
$registros = mysqli_num_rows($result);
    $texto = "";
    $valor_total = 0.00;
    while ($linha = @mysqli_fetch_array($result)) {
        $nome_produto = $linha['nome'];
        $preco_normal = $linha['preco_venda'];
        $qtd = $linha['qtd_produto'];
        $total_item = $preco_normal * $qtd;
        $texto .=  $nome_produto . ": 1 Unidade" . " = " . number_format(($preco_normal*$qtd),2,',','.') . "<br>";
        $valor_total = $valor_total + $total_item;
}
?>
    <div class="product-container">
         <div class="box">

            <?php

            if ($registros > 0 ) {
                echo $texto;
                echo "<hr>";
                echo "<br>Total do pedido: R$ " . number_format($valor_total,2,',','.');
                echo "<br><br><br><br><br><br><a href=\"?pagina=esvaziar.php\" class=\"btn\">Esvaziar Carrinho</a>";
                echo "<a href=\"?pagina=todos-produtos.php\" class=\"btn\">Continuar Comprando</a>";
                echo "<a href=\"?pagina=pagamento.php\" class=\"btn\">Comprar</a>";
            } else {
                  echo "Carrinho vazio.";
                  echo "<br><a href=\"?pagina=todos-produtos.php\" class=\"btn\">Continuar Comprando</a>";
            }
            ?>
            </div>
        </div>
    <br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br>
