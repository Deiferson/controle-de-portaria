<?php 
    require './inc/config.inc.php';
    $sessao = new Sessao();
    
    session_start();
    
    if(!isset($_SESSION['logado']))
        $sessao->destroySessao();
    else
        $sessao->checkTime();  

    if ($sessao->getNv()!=1)
        header('Location: cp.php'); 

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Saída</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        
        <?php require './inc/menu.inc.php'; ?>      
   

     
    
      <div class="reg saida">          
          <h1>Saída: <?php echo $sessao->getDescLocal(); ?></h1>
          <form method="POST" action="#">          
          <input type="text" name="ra" placeholder=" Ra aqui" required autocomplete="off">
          <button class="btn btn-success" type="submit"  name="verificar">Verificar</button>
        </form>
      </div>

          <div class='resultado' >
            <?php
                if(isset($_POST['confirmar'])){
                    
                    extract($_POST);

                    $local = $sessao->getIdLocal();
                    $saida = new Out($ra, $local, null, turno());                    
                    $consulta= new OutPdo();
                    $dados = $consulta->insert($saida);                    
                  
                }
            
            ?>

          <form method="POST" action="#">
            <?php
                if(isset($_POST['verificar'])){
                    
                    extract($_POST);

                    $consulta= new AlunoPdo();
                    $dados = $consulta->select($ra); 
                    
                    if($dados) {                 
                    echo "<h2>{$dados['ra_aluno']} -- {$dados['nome_aluno']}</h2>";
                    echo "<input type='hidden' name='ra' value='{$dados['ra_aluno']}'>";
                    echo "<button  class='btn btn-success ' type='submit'  name='confirmar'>Confirmar Saída</button>";

                    
                  }
                      else{
                        echo "<h2>Nenhum registro encontrado!</h2>";
                      }
                }
            
            ?>
            
          </form>
          </div>
          <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>
