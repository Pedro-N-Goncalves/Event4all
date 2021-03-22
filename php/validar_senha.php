<?php
    require_once("conexao_bd.php");

    if (isset($_POST["senha"])) 
    {
        $senha = $_POST["senha"];
        if(!isset($_SESSION))
        {
            session_start();    
            $cod = $_SESSION["cod"];   

            $query_senha_adm = "SELECT * 
                               FROM admins
                               WHERE SenhaAdm = '$senha'";

            $query_senha_us = "SELECT * 
                               FROM usuarios
                               WHERE SenhaUs = '$senha'";
        }
        
        
        $senha = mysqli_query($conexao,$query_senha_adm);
        $info = mysqli_fetch_assoc($senha);
        
        if (!empty($info))
        {
            echo 3;
        }
        else
        {
            $senha = mysqli_query($conexao,$query_senha_us);
            $info = mysqli_fetch_assoc($senha);
            
            if (!empty($info))
            {
                echo 3;
            }
            else
            {
                echo 2;
            }
        }
    }
?>