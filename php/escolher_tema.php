<?php
    $tema;
    if (isset($_POST["tema"])){
        $tema = $_POST["tema"];
        setcookie("tema", $tema);
    }
?>