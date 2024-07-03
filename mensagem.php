<?php
  if(!is_null(@$mensagem) && $mensagem != ''){
      ?>
  <div class="form-container">
    <label>
      <?php echo $mensagem; ?>
    </label>
  </div>
    <?php
  }
?>