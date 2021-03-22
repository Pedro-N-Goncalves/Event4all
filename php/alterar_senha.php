<?php
    require_once("conexao_bd.php");

    if (isset($_POST["senha"])) 
    {
        $senha = $_POST["senha"];
        if (!isset($_SESSION)){
            session_start();
        }
        
        $cod = $_SESSION["cod"];   
        
        if (strlen($cod) == 6)
        { 
            $query_altsenha = "UPDATE admins 
                                SET SenhaAdm = '$senha' 
                                WHERE CodAdm = '$cod'";
        } else {
            $query_altsenha = "UPDATE usuarios
                                SET SenhaUs = '$senha'
                                WHERE CodUs = '$cod'";
        }
        
        $altsenha = mysqli_query($conexao,$query_altsenha);
        
        if ($altsenha){
            echo 3;
        } else {
            echo 2;
        }
    }
?>