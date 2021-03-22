<?php
    require_once("conexao_bd.php");

    if (!isset($_SESSION)){
        session_start();           
    }

    $cod = $_SESSION["cod"];  

    if (strlen($cod) == 6)
    { 
        $query_exclusao = "DELETE FROM admins 
                            WHERE CodAdm = '$cod'";
    } else {
        $query_exclusao = "DELETE FROM usuarios 
                            WHERE CodUs = '$cod'";
    }

    $exclusao = mysqli_query($conexao,$query_exclusao);

    if ($exclusao){
        session_destroy();
        header("location:../public/index.php");
        exit;
    }
?>