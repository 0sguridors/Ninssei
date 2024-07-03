<?php
include ('conexao.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo array_key_exists('titulo', $_GET) ? $_GET['titulo'] : 'VCarros'  ?></title>
    <?php include('head.html'); ?>
</head>
<body>
    <header>
        <div class="header-1">
            <a href="#"  class="logo"><i class="fa-solid fa-car"></i>VCarros</a>

            <form action="?pagina=busca.php&titulo=Pesquisar" class="search-box-container" name="form1" method="POST">
                <input type="search" id="search-box" placeholder="Pesquise aqui..." name="pesquisa">
                <label for="search-box" class="fas fa-search" onclick="processar();"></label>
            </form>
        </div>
        <div class="header-2">
            <div id="menu-bar" class="fas fa-bars"></div>
            <nav class="navbar">
                <a href="?">Página Inicial</a>
                <a href="?pagina=categorias.php">Categorias</a>
                <a href="?pagina=todos-produtos.php&titulo=Produtos">Todos os Produtos</a>
                <a href="?pagina=inicio.php#contact">Suporte</a>
                <?php
                $isAdministrador = $usuario && $usuario['administrador'] == 'S';
                //$isAdministrador = false;
                if($isAdministrador){
                    ?>
                <a href="?pagina=administracao.php">Administração</a>
                    <?php
                }
                ?>
            </nav>
        <div class="icons">
            <a href="?pagina=carrinho.php&titulo=Carrinho" class="fas fa-shopping-cart" id="shopping-cart"></a>
            <a href="?pagina=form_login.php&titulo=Login" class="fas fa-user-circle" id="user-icon"></a>
            <?php
                if($usuario){
                    echo "<a style=\"font-size:small;\" href=\"?pagina=logout.php\"> Sair</a>";
                    echo "<br><br><span> Seja bem vindo, {$usuario['nome']}</span>";
                }
            ?>
        </div>
        </div>
    </header>

    <?php
        $login = array_key_exists('login', $_GET) ? $_GET['login'] : '0';
        if($login == '1'){
            ?>
<div class="form-container">
    <label>
      Login Feito com Sucesso
    </label>
  </div>
            <?php

        }else{



            $paginaCarregar = pos_arr('pagina',$_GET, 'inicio.php');
            if(file_exists($paginaCarregar)){
                if(str_contains($paginaCarregar, 'admin') && !$isAdministrador){
                    mensagem("Sem permissão");
                }else{
                    include($paginaCarregar);
                }
            }else{
                include('inicio.php');
            }
            if(!is_null(@$ir_para)){
                ?>
    <script type="text/javascript">
        window.location = "<?php echo $ir_para; ?>";

    </script>
                <?php
            }
        }
    ?>

<footer>
    <section class="footer">

        <div class="box-container">

            <div class="box">
                <a href="index.php" class="logo"><i class="fas fa-medkit"></i>Ninssei</a>
                <p>A Melhor Farmácia online que se preocupa com você!</p>
                <div class="share">
                    <a href="#" class="btn fab fa-facebook-f"></a>
                    <a href="#" class="btn fab fa-twitter"></a>
                    <a href="#" class="btn fab fa-instagram"></a>
                    <a href="#" class="btn fab fa-linkedin"></a>
                </div>
            </div>

        </div>

        <h1 class="credit"> Criado por <span> Mariana G. Cavilha, Rafael Schuck Segatto, Leonardo Rodriguez Ferrari, Rafael Brennsen, João Pedro dos Santos </span> - Todos os direitos reservados, 2023. <br> <br> Encontrou algum problema? Nos avise! Ninssei@Hotmail.Com</h1>
    </section>
</footer>
<script language="javascript">
function processar() {
    document.form1.submit();
}
</script>
</body>
</html>