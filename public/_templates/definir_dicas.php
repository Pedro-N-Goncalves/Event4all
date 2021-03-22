<?php
    $dicas;
    if (isset($_COOKIE["dicas"])){
        $dicas = $_COOKIE["dicas"];
    } else {
        $dicas = "off";
    }
?>