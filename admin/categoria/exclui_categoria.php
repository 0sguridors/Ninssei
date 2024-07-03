<?php

$id_excluir = pos_arr('id', $_GET,null);

$sql = "SELECT id_categoria FROM categoria WHERE id_categoria = $id_excluir";
$result = mysqli_query($conexao, $sql);


if($id_excluir && mysqli_num_rows($result) > 0){
    $sqlExcluirProduto = "DELETE FROM categoria WHERE id_categoria = $id_excluir";
    $resultExcluir = mysqli_query($conexao, $sqlExcluirProduto);

    if($resultExcluir){
        mensagem("Categoria Excluído com sucesso");
    }else{
        mensagem("Categoria não foi excluido.");
    }

}else{
    mensagem("Categoria não encontrada.");
}

mensagem('<a class="btn" onclick="history.back()">Clique Aqui</a> para voltar.');