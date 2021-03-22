<?php
    session_start(); 
    require_once("conexao_bd.php");

    if (isset($_POST["codev"]))
    {
        $codev = $_POST["codev"];
        $query_exclusao_ev = "DELETE FROM eventos 
                            WHERE CodEv = '$codev'";

        $exclusao_ev = mysqli_query($conexao,$query_exclusao_ev);

        if ($exclusao_ev){
            echo "sucesso";
            exit;
        }
    }
?>