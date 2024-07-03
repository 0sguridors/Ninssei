
    <section class="category" id="category">
    </div>
    
    <h1 class="heading">Manutenção de  <span>Fornecedores</span></h1>

    <p class="heading">
        <a href="?pagina=admin/fornecedor/fornecedor_form.php" class="btn">Novo Fornecedor</a>
    </p>
    <div>
    <?php
    $contador = 1;
    $query =
        "SELECT *
        FROM fornecedor ORDER BY fornecedor.nome ASC";
       
    $result = mysqli_query($conexao,$query) or die(mysqli_error($conexao) . "<br><br>" . $query);
    if(mysqli_num_rows($result) > 0){

        ?>
        <table class="table-consulta">
            <thead>
                <tr>
                    <th><h3>nome</h3></th>
                    <th><h3>telefone</h3></th>
                    <th><h3>email</h3></th>
                    <th><h3>ações</h3></th>
                </tr>
            </thead>
            <tbody>
        <?php

        while ($linha = @mysqli_fetch_array($result)) {
            
            ?>
    
            <tr>
                <td><?php echo $linha['nome'];?></td>
                <td><?php echo $linha['telefone'];?></td>
                <td><?php echo $linha['email'];?></td>
                <td>
                    <a href="?pagina=admin/fornecedor/fornecedor_form.php&id=<?php echo $linha['id_fornecedor'];?>" class="btn">Editar</a>
                    <a onclick="confirm('Você tem certeza que deseja excluir o fornecedor <?php echo $linha['nome']; ?>') ? window.location = '?pagina=admin/fornecedor/exclui_fornecedor.php&id=<?php echo $linha['id_fornecedor'];?>' : '' " class="btn">Excluir</a>
                </td>
            </tr>
            <?php
            $contador++;
        }
    } else {
        mensagem("Nenhum fornecedor cadastrado</td>");
    }
    ?>
            </tbody>
        </table>
    </div>
       
    </section>
