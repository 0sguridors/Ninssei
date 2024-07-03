<?php

$id_excluir = pos_arr('id', $_GET,null);

$sql = "SELECT id_produto FROM produtos WHERE id_produto = $id_excluir";
$result = mysqli_query($conexao, $sql);


if($id_excluir && mysqli_num_rows($result) > 0){
    $sqlExcluirProduto = "DELETE FROM produtos WHERE id_produto = $id_excluir";
    $resultExcluir = mysqli_query($conexao, $sqlExcluirProduto);

    if($resultExcluir){
        mensagem("Produto Excluído com sucesso");
    }else{
        mensagem("Produto não foi excluido.");
    }

}else{
    mensagem("Produto não encontrado.");
}

mensagem('<a class="btn" onclick="history.back()">Clique Aqui</a> para voltar.');