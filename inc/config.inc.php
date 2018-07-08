<?php
//CONFIGURAÇÃO DE CONEXÃO COM O BANCO DE DADOS:
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DBSA', 'es');

define('WS_ACCEPT', 'alert-success');
define('WS_ERROR','alert-danger');
define('WS_INFOR','alert-info');

    function showMessage($Msg, $ErrNo)
    {
        if ($ErrNo == WS_ERROR)
            $CssClass = WS_ERROR;
        elseif ($ErrNo == WS_INFOR)
            $CssClass = WS_INFOR;
        elseif ($ErrNo == WS_ACCEPT)
            $CssClass = WS_ACCEPT;
        
        echo "<p class='alert {$CssClass}'>{$Msg}</p>";
        
    }

    function checkEmpty($array)
    {
        $error = "";
        foreach ($array as $indice => $values){
            if (empty($values)) {
                $error .= ucfirst($indice)."<br>";
            }
        }

        if (empty($error)) {
            return true;
        }
        else {
            die("<div class= 'alert alert-danger'>Os seguintes campos estão vazios: {$error}</div>");
        }    
    }    

    function compare($senha1, $senha2)
    {      
        if($senha1==$senha2){
            return true;
        }
        else{
           showMessage("Confirmação de senha inválida!",WS_ERROR);
        }
        
    }


    function turno()
    {
        $h = hour();

        if ($h>=8 && $h<=13) {
            return 1;
        }

        if ($h>=19 && $h<=23) {
            return 2;
        }

    }

    function hour()
    {
        date_default_timezone_set('America/Sao_Paulo');
        $date = date('H');
        return $date;
    }

    function day()
    {
        date_default_timezone_set('America/Sao_Paulo');
        $date = date('Y-m-d');
        return $date;
    }







    function __autoload($Class)
    {
        $dirName= 'class';

        if (file_exists("{$dirName}/{$Class}.class.php")) {
            require_once "{$dirName}/{$Class}.class.php";
        } else {
            die("Erro ao incluir {$dirName}/{$Class}.class.php");
        }

    }