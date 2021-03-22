<?php
    require_once("conexao_bd.php");

    if (isset($_POST["nome"])) 
    {
        $nome = $_POST["nome"];
        if (!isset($_SESSION)){
            session_start();           
        }
        
        $cod = $_SESSION["cod"];  
        
        if (strlen($cod) == 6)
        { 
            $query_altnome = "UPDATE admins 
                                SET NomeAdm = '$nome' 
                                WHERE CodAdm = '$cod'";
        } else {
            $query_altnome = "UPDATE usuarios
                                SET NomeUs = '$nome'
                                WHERE CodUs = '$cod'";
        }
        
        $altnome = mysqli_query($conexao,$query_altnome);

        if ($altnome){
            $_SESSION["nome"] = $nome;
            echo 3;
        } else {
            echo 2;
        }
    }
?>