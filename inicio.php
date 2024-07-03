<section class="home" id="home">
        <div class="image">
            <img src="./images/heartmeds.jpg" alt="Coração fictício com remédios">
        </div>
        <div class="content">
            <span>Em busca do seu bem-estar.</span>
            <h3>Encontre os melhores produtos aqui!</h3>
            <a href="#" class="btn">Vamos começar?</a>
        </div>
    </section>

    <section class="banner-container">

        <div class="banner">
            <img src="./images/white-pills-plastic-bottle.jpg" alt="Pílulas">
            <div class="content">
                <h3>Oferta Especial!</h3>
                <p>Desconto: 5%</p>
                <a href="#" class="btn">Ver Detalhes!</a>
            </div>
        </div>

        <div class="banner">
            <img src="./images/flat-lay-pills-jar.jpg" alt="Pílulas">
            <div class="content">
                <h3>Oferta Especial!</h3>
                <p>Desconto: 10%</p>
                <a href="#" class="btn">Ver Detalhes!</a>
            </div>
        </div>

    </section>

    <?php 
    include('section_categoria.php');
    ?>

<section class="product" id="product">

    <h1 class="heading">Adicionados <span>Recentemente</span></h1>

    <div class="box-container">
    <?php
    for ($i=1; $i <=3 ; $i++) {
    	$query = "SELECT produtos.id_produto, produtos.nome, produtos.preco_venda, produtos.desconto, produtos.arqimagem FROM produtos WHERE produtos.id_produto = $i";
    	$result = mysqli_query($conexao,$query) or die(mysql_error() . "<br><br>" . $query);
    	while ($linha = @mysqli_fetch_array($result)) {
            $idproduto = $linha['id_produto'];
            $desconto = $linha['desconto'];
    		$preco_normal = $linha['preco_venda'];
    		$preco_promocao = $preco_normal - ($preco_normal * $desconto);
            $prod_img = $linha['arqimagem'];
            $nome = $linha['nome'];
    		?>
    		<div class="box">
                <?php
                if ($desconto > 0.00) { ?>
                    <span class="discount">-<?php echo number_format(($desconto*100),0,',','.'); ?>%</span>
                <?php }
                ?>

	       
	            <img src="images/<?php echo $prod_img; ?>" alt="<?php echo $nome; ?>">
	            <h3><a echo $idproduto;?><?php echo $nome; ?></a></h3>

                <?php
                if ($desconto > 0.00) {
                    echo "<div class=\"price\"> R$" . number_format($preco_promocao,2,",",".") . "<span> R$" . number_format($preco_normal,2,",",".");
                } else {
                    echo "<div class=\"price\"> R$" . number_format($preco_normal,2,",",".");
                }
                ?>

                </span> </div>
	            <div class="quantity">
	            </div>
	            <a href="?pagina=detalha.php&id=<?php echo $idproduto;?>" class="btn">Ver Detalhes</a>
	            </div>
    		<?php
    	}
    }
    ?>
    </div>

</section>

<section class="contact" id="contact">

    <h1 class="heading"> <span> Fale Conosco </span> </h1>

    <form action="">

        <div class="inputBox">
            <input type="text" placeholder="Nome">
            <input type="email" placeholder="Email">
        </div>

        <div class="inputBox">
            <input type="number" placeholder="Número">
            <input type="text" placeholder="Assunto">
        </div>

        <textarea placeholder="Mensagem" name="" id="" cols="30" rows="10"></textarea>

        <input type="submit" value="Enviar Mensagem" class="btn"

    /form>

</section>