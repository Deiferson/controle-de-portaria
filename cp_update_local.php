<?php 
    require './inc/config.inc.php';
    $sessao = new Sessao();
    
    session_start();
    
    if(!isset($_SESSION['logado']))
        $sessao->destroySessao();   
      else if($sessao->getNv()!=2)
      header('Location: home.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Atualizar local</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>       

        <?php  require './inc/menu_cp.inc.php'; extract($_POST);?>
        
        <div class="container">            
            <div class="row">
            <form class="col-xs-5" method="POST" action="#">                
                <div class="form-group">
                    <label for="exampleInputPassword1">Nova descrição:</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="descrição" name="newDesc">
                </div>
                <input type="hidden" name="idLocal" value="<?php echo $idUpdate ?>">
                <button name="confirmar" value="confirmar" class="btn btn-primary">confirmar</button>
            </form>
            
            </div>
            <br>

            <?php    
                if (isset($_POST['confirmar'])) {
                    
                    extract($_POST);                    
                    $local = new Local($idLocal, $newDesc);

                    $localPdo = new LocalPdo();
                    $dados = $localPdo->update($local);

                    header('Location: cp_list_local.php');   
                                  
                }
            ?> 



        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>