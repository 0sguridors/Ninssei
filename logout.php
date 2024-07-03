<?php
    if(pos_arr('usuario_logado',$_SESSION,NULL) ){
        unset($_SESSION['usuario_logado']);
        mensagem("Você saiu");
    }else{
        mensagem("Sem usuário logado");
    }

    