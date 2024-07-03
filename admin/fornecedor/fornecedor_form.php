<?php

$id_fornecedor = pos_arr('id', $_GET, null);
$linha;
if ($id_fornecedor) {
    $query = "SELECT * FROM fornecedor WHERE fornecedor.id_fornecedor = $id_fornecedor";
    $result = mysqli_query($conexao, $query);
    $linha = mysqli_fetch_array($result);
}
if (!$id_fornecedor || is_null($linha)) {
    $linha = [];
    $linha['cnpj']        = '';
    $linha['nome']        = '';
    $linha['telefone']    = '';
    $linha['email']       = '';
    $linha['endereco']    = '';
    $linha['cep']         = '';
    $id_fornecedor = '';
}


?>
<form action="?pagina=admin/fornecedor/edita_fornecedor.php&id_fornecedor=<?php echo $id_fornecedor; ?>" method="POST" >
    <div class="form-container">

        <div>
            <label for="fcnpj">cnpj</label>
            <input type="text" id="fcnpj" name="cnpj" value="<?php echo $linha['cnpj']; ?>">
        </div>
        <div>
            <label for="fnome">nome</label>
            <input type="text" id="fnome" name="nome" value="<?php echo $linha['nome']; ?>">
        </div>
        <div>
            <label for="ftelefone">telefone</label>
            <input type="text" id="ftelefone" name="telefone" value="<?php echo $linha['telefone']; ?>">
        </div>
        <div>
            <label for="femail">email</label>
            <input type="text" id="femail" name="email" value="<?php echo $linha['email']; ?>">
        </div>
        <div>
            <label for="fendereco">endereco</label>
            <input type="text" id="fendereco" name="endereco" value="<?php echo $linha['endereco']; ?>">
        </div>
        <div>
            <label for="fcep">cep</label>
            <input type="text" id="fcep" name="cep" value="<?php echo $linha['cep']; ?>">
        </div>
        <div class="btn-container">
            <input type="submit" value="Enviar" class='btn'>
        </div>
    </div>
</form>
<?php
?>

<div class="btn-container">
    <a href="?pagina=admin/fornecedor/lista_cadastro_fornecedor.php" class='btn'>Retornar à consulta de Fornecedores</a>
</div>