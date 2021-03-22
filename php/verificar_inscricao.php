<?php 
    require_once("conexao_bd.php");

    if (isset($_POST["codigoUs"]))
    {
        $codUsuario = $_POST["codigoUs"];
        $codEvento = $_POST["codigoEv"];

        $query_verif_inscricao = "SELECT * 
                                FROM eventos_usuario 
                                WHERE CodEv = '$codEvento'
                                AND CodUs = '$codUsuario'";
        
        $verif_inscricao = mysqli_query($conexao,$query_verif_inscricao);
        
        if (mysqli_num_rows($verif_inscricao) != 0){
            echo "inscrito";
        } else {
            echo "não inscrito";
        }
    }
?>