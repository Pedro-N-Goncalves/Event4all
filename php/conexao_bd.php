<?php
    //Abre conexão
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $banco = "event";
    $conexao = mysqli_connect($servidor,$usuario,$senha,$banco);
    mysqli_set_charset($conexao, "utf8");
    
    //testa conexão
    if (mysqli_connect_errno()){
        die("Problema de conexão com o Banco de dados: " . mysqli_connect_errno());
    } 
?>