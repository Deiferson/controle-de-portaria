<?php 
    require './inc/config.inc.php';
    $sessao = new Sessao();
    
    session_start();
    
    if(isset($_SESSION['logado']))
        $sessao->destroySessao();
?>
