<?php

$id_excluir = pos_arr('id', $_GET,null);

$sql = "SELECT id_fornecedor FROM fornecedor WHERE id_fornecedor = $id_excluir";
$result = mysqli_query($conexao, $sql);


if($id_excluir && mysqli_num_rows($result) > 0){
    $sqlExcluirProduto = "DELETE FROM fornecedor WHERE id_fornecedor = $id_excluir";
    $resultExcluir = mysqli_query($conexao, $sqlExcluirProduto);

    if($resultExcluir){
        mensagem("Fornecedor Excluído com sucesso");
    }else{
        mensagem("Fornecedor não foi excluido.");
    }

}else{
    mensagem("Fornecedor não encontrado.");
}

mensagem('<a class="btn" onclick="history.back()">Clique Aqui</a> para voltar.');