<section>
    </header>
    <section class="pagamento">
    <section>
    <a href="?pagina=todos-produtos.php&id<?php echo $id_produto;?>" class="btn" onclick="showPopup('PIX')">PIX</a>
    <a href="?<?php echo $id_produto;?>" class="btn" onclick="showPopup('Cartão de débito')">Cartão de débito</a>
    <a href="?<?php echo $id_produto;?>" class="btn" onclick="showPopup('Cartão de crédito')">Cartão de crédito</a>
</section>

<script>
    function showPopup(paymentMethod) {
        alert('Pagamento realizado com sucesso!\nMétodo de pagamento: ' + paymentMethod);
        redirectToIndex();
    }

    function redirectToIndex() {
        window.location.href = "index.php";
    }
</script>
