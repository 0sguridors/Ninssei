<?php

$id_excluir = pos_arr('id', $_GET,null);

$sql = "SELECT id_cliente FROM cliente WHERE id_cliente = $id_excluir";
$result = mysqli_query($conexao, $sql);


if($id_excluir && mysqli_num_rows($result) > 0){
    $sqlExcluirProduto = "DELETE FROM cliente WHERE id_cliente = $id_excluir";
    $resultExcluir = mysqli_query($conexao, $sqlExcluirProduto);

    if($resultExcluir){
        mensagem("Cliente excluído com sucesso");
    }else{
        mensagem("Cliente não foi excluido.");
    }

}else{
    mensagem("Cliente não encontrado.");
}

mensagem('<a class="btn" onclick="history.back()">Clique Aqui</a>para voltar.');