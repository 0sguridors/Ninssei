<?php

if (empty($_POST['email']) || (empty($_POST['senha']))) {
	$ir_para = '?pagina=form_login.php';
}else{
	$senha = mysqli_real_escape_string($conexao, $_POST['senha']);
	$email = mysqli_real_escape_string($conexao, $_POST['email']);
	
	$validacao = "SELECT * FROM cliente WHERE email = '{$email}' AND senha = md5('{$senha}')";
	
	$result = mysqli_query($conexao, $validacao);
	
	if(mysqli_num_rows($result) > 0){
		$linha = @mysqli_fetch_array($result);
		$_SESSION['usuario_logado'] = $linha;
		$ir_para = '?login=1';
	}else{
		$ir_para = ("?pagina=form_login.php&erro=1");
	}
}


?>