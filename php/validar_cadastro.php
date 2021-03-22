<?php
    require_once("conexao_bd.php");

    if (isset($_POST["nome"])) 
    {
        $codigo = rand(10000000,99999999);
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $sexo = $_POST["sexo"];
        $datanasc = $_POST["datanasc"];
        $senha = $_POST["senha"];
        
        $query_cadastro = "INSERT INTO usuarios
                          (CodUs, NomeUs, EmailUs, SenhaUs, SexoUs, DataNascUs) 
                          VALUES ('$codigo','$nome','$email','$senha','$sexo','$datanasc')";
        
        $cadastro = mysqli_query($conexao,$query_cadastro);
        
        if ($cadastro)
        {
            echo 1;
            
            if(!isset($_SESSION))
            {
                session_start();
                $_SESSION["cod"] = $codigo; 		
                $_SESSION["nome"] = $nome;
                $_SESSION["email"] = $email;	
                exit;
            }
        }
        else
        {
            echo 0;
        }
    }
?>