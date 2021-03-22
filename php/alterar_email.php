<?php
    require_once("conexao_bd.php");

    if (isset($_POST["email"])) 
    {
        $email = $_POST["email"];
        if (!isset($_SESSION)){
            session_start();              
        }
        
        $cod = $_SESSION["cod"];  
        
        if (strlen($cod) == 6)
        { 
            $query_altemail = "UPDATE admins 
                                SET EmailAdm = '$email' 
                                WHERE CodAdm = '$cod'";
        } else {
            $query_altemail = "UPDATE usuarios
                                SET EmailUs = '$email'
                                WHERE CodUs = '$cod'";
        }
        
        $altemail = mysqli_query($conexao,$query_altemail);
        
        if ($altemail){
            $_SESSION["email"] = $email;
            echo 3;
        } else {
            echo 2;
        }
    }
?>