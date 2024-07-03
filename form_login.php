<div class="form-container">
  <div>
    <form action="?pagina=login.php" method="POST">
      <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email">
      </div>
      <div>
        <label for="password">Senha:</label>
        <input type="password" id="password" name="senha">
        <div class="btn-container">
          <input type="submit" value="Enviar" class='btn'>
          <a href="?pagina=cadastro.html" class='btn btn-return'>Registrar Nova Conta</a>
          <a href="?" class='btn btn-return'>Retornar à Página Inicial</a>
      </div>
      </div>
  </div>

      <?php
        if(pos_arr('erro',$_GET,null)){
          mensagem('Erro ao fazer login');
        }
      ?>

</div>
