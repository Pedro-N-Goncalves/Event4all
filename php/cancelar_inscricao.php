<?php
    require_once("conexao_bd.php");

    if (isset($_POST["codigoUs"])) 
    {
        $codigoUs = $_POST["codigoUs"];
        $codigoEv = $_POST["codigoEv"];
        
        $query_cancela_inscricao = "DELETE FROM eventos_usuario 
        						WHERE CodEv = '$codigoEv'
        						AND CodUs = '$codigoUs'";
        
        $cancela_inscricao = mysqli_query($conexao,$query_cancela_inscricao);
        
        if ($cancela_inscricao){
            echo "sucesso";
        } else {
            echo "erro";
        }
    }
?>