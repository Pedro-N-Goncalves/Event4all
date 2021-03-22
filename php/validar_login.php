<?php
    require_once("conexao_bd.php");

    if (isset($_POST["email"])) 
    {
        $email = $_POST["email"];
        $senha = $_POST["senha"];

        $query_login_adm = "SELECT * 
                           FROM admins
                           WHERE EmailAdm = '$email' 
                           AND SenhaAdm = '$senha'";

        $query_login_us = "SELECT * 
                           FROM usuarios
                           WHERE EmailUs = '$email' 
                           AND SenhaUs = '$senha'";
        
        $login = mysqli_query($conexao,$query_login_adm);
        $info = mysqli_fetch_assoc($login);
        
        if (!empty($info))
        {   
            if(!isset($_SESSION))
            {
                session_start();    
                $_SESSION["cod"] = $info["CodAdm"]; 		
                $_SESSION["nome"] = $info["NomeAdm"];
                $_SESSION["email"] = $info["EmailAdm"];
                echo "sucesso"; 
            }
        }
        else
        {
            $login = mysqli_query($conexao,$query_login_us);
            $info = mysqli_fetch_assoc($login);
            
            if (!empty($info))
            {
                if (!isset($_SESSION))
                {
                    session_start();    
                    $_SESSION["cod"] = $info["CodUs"]; 		
                    $_SESSION["nome"] = $info["NomeUs"];
                    $_SESSION["email"] = $info["EmailUs"];
                    echo "sucesso";
                }
            }
            else
            {
                echo "erro";
            }
        }
    }
?>