<nav class="navbar navbar-inverse">
    <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="home.php"><span class="glyphicon glyphicon-home"></span></a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="entrada.php">Registrar Entrada</a></li>
        <li><a href="saida.php">Registrar Saída</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <li ><a>Bem vindo <?php echo $sessao->getLogin(); ?>!</a></li>
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-cog"></span>
            <span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li><a href="update_pass.php">Mudar senha</a></li>                
                <li class="divider"></li>  
                <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Sair</a></li>              
            </ul>
        </li>
    </ul>
    </div>
</nav>