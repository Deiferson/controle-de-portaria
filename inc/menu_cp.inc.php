<nav class="navbar navbar-inverse">
    <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="cp.php"><span class="glyphicon glyphicon-home"></span></a>
    </div>
    <ul class="nav navbar-nav">
        
    </ul>
    <ul class="nav navbar-nav navbar-right">
	<li class="dropdown">
        	<a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-download"> Gerar excel</span>
        	<span class="caret"></span></a>
        	<ul class="dropdown-menu">
          		<li><a href="download.php?r=1">Entrada e saida</a></li>                   		
          		<li><a href="download.php?r=2">Entrada sem saida</a></li>
			        <li><a href="download.php?r=3">Saida sem entrada</a></li>
          		<li><a href="download.php?r=4">Faltas</a></li>
        	</ul>
      	</li>
    	<li class="dropdown">
        	<a class="dropdown-toggle" data-toggle="dropdown" href="#">Relatório</span>
        	<span class="caret"></span></a>
        	<ul class="dropdown-menu">
          		<li><a href="cp_relatorio.php">Entrada e saida</a></li>                   		
          		<li><a href="cp_relatorio_E.php">Entrada sem saida</a></li>
			<li><a href="cp_relatorio_S.php">Saida sem entrada</a></li>
          		<li><a href="cp_relatorio_F.php">Faltas</a></li>
        	</ul>
      	</li>
        <li><a href="cp_list_user.php">Usuários</a></li>
        <li><a href="cp_list_local.php">Locais</a></li>
    	<li ><a>Bem vindo <?php echo $sessao->getLogin(); ?>!!!</a></li>
    	<li class="dropdown">
        	<a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-cog"></span>
        	<span class="caret"></span></a>
        	<ul class="dropdown-menu">
          		<li><a href="update_pass.php">Mudar senha</a></li>
           		<li class="divider"></li> 
          		<li><a href="cp_insert_user.php">Cadastrar Usuário</a></li>
              <li><a href="cp_insert_local.php">Cadastrar Local</a></li>
              
          		<li class="divider"></li>  
          		<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Sair</a></li>              
        	</ul>
      </li>
      	
    </ul>
    </div>
</nav>

