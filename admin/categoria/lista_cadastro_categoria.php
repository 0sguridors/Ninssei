
<section class="category" id="category">
    </div>
    
    <h1 class="heading">Manutenção de  <span>Categorias</span></h1>

    <p class="heading">
        <a href="?pagina=admin/categoria/categoria_form.php" class="btn">Nova Categoria</a>
    </p>
    <div class="box-container">
    <?php
    $query =
        "SELECT
            *
        FROM categoria ORDER BY categoria.categoria ASC";

    $result = mysqli_query($conexao,$query) or die(mysqli_error($conexao) . "<br><br>" . $query);
    while ($linha = @mysqli_fetch_array($result)) {
        ?>
            <div class="box">
                <span class="discount">&nbsp;</span>
                    <span><img src="images/<?php echo $linha['imagem']; ?>" alt="<?php echo $linha['categoria']; ?>"></span>
                    <h4><?php echo $linha['categoria']; ?></h4>
                <br>
                    <a href="?pagina=admin/categoria/categoria_form.php&id=<?php echo $linha['id_categoria'];?>" class="btn">Editar</a>
                    <a onclick="confirm('Você tem certeza que deseja excluir a categoria <?php echo $linha['categoria']; ?>') ? window.location = '?pagina=admin/categoria/exclui_categoria.php&id=<?php echo $linha['id_categoria'];?>' : '' " class="btn">Excluir</a>
            </div>
        <?php
    }
    ?>
    </div>
       
    </section>
