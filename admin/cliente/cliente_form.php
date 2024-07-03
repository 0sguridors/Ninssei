<?php

$id_cliente = pos_arr('id', $_GET, null);
$linha;
if ($id_cliente) {
    $query = "SELECT * FROM cliente WHERE cliente.id_cliente = $id_cliente";
    $result = mysqli_query($conexao, $query);
    $linha = mysqli_fetch_array($result);
}
if (!$id_cliente || is_null($linha)) {

    
    $linha = [];
    $linha['nome']            = '';
	$linha['cpf']             = '';
	$linha['dtnasc']          = '';
	$linha['telefone']        = '';
	$linha['email']           = '';
	$linha['endereco']        = '';
	$linha['cep']             = '';
	$linha['senha']           = '';
	$linha['administrador']   = '';
    $id_cliente = '';
}


?>
<form action="?pagina=admin/cliente/edita_cliente.php&id_cliente=<?php echo $id_cliente; ?>" method="POST" >
    <div class="form-container">

        <div>
            <label for="fnome">nome</label>
            <input type="text" id="fnome"          name="nome"          value="<?php echo $linha['nome'];          ?>">
        </div>
        <div>
            <label for="fcpf">cpf</label>
            <input type="text" id="fcpf"           name="cpf"           value="<?php echo $linha['cpf'];           ?>">
        </div>
        <div>
            <label for="fdtnasc">dtnasc</label>
            <input type="text" id="fdtnasc"        name="dtnasc"        value="<?php echo $linha['dtnasc'];        ?>">
        </div>
        <div>
            <label for="ftelefone">telefone</label>
            <input type="text" id="ftelefone"      name="telefone"      value="<?php echo $linha['telefone'];      ?>">
        </div>
        <div>
            <label for="femail">email</label>
            <input type="text" id="femail"         name="email"         value="<?php echo $linha['email'];         ?>">
        </div>
        <div>
            <label for="fendereco">endereco</label>
            <input type="text" id="fendereco"      name="endereco"      value="<?php echo $linha['endereco'];      ?>">
        </div>
        <div>
            <label for="fcep">cep</label>
            <input type="text" id="fcep"           name="cep"           value="<?php echo $linha['cep'];           ?>">
        </div>
        <div>
            <label for="fsenha">senha</label>
            <input type="text" id="fsenha"         name="senha">
        </div>
		<div>
            <label for="fadministrador">administrador</label>
			<select id="fadministrador" name="administrador" >
				<option >Seleciona uma opção</option>
				<option value='S' <?php echo $linha['administrador'] == 'S' ? 'selected' : '' ?>>Sim</option>
				<option value='N' <?php echo $linha['administrador'] == 'N' ? 'selected' : '' ?>>Não</option>
			</select>
		</div>
        <div class="btn-container">
            <input type="submit" value="Enviar" class='btn'>
        </div>
    </div>
</form>
<?php
?>

<div class="btn-container">
    <a href="?pagina=admin/cliente/lista_cadastro_cliente.php" class='btn'>Retornar à consulta de Clientes</a>
</div>