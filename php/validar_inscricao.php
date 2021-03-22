<?php
    require_once("conexao_bd.php");

    if (isset($_POST["codigoUs"])) 
    {
        $codigoUs = $_POST["codigoUs"];
        $codigoEv = $_POST["codigoEv"];
        
        $query_inscricao = "INSERT INTO eventos_usuario
                          (CodEv, CodUs) 
                          VALUES ('$codigoEv','$codigoUs')";
        
        $inscricao = mysqli_query($conexao,$query_inscricao);
        
        if ($inscricao){
            echo "sucesso";
        } else {
            echo "erro";
        }
    }
?>