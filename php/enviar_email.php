<?php
	$email = $_POST["email"];
    $assunto = $_POST["assunto"];
    $mensagem = $_POST["mensagem"];
    $destino = $_POST["destino"];
        
    // É necessário indicar que o formato do e-mail é html
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= "From: <'$email'>";
    $headers .= "Bcc: '$destino'\r\n";

    $enviaremail = mail($destino, $assunto, $mensagem, $headers);
    if($enviaremail){
        echo "sucesso";
    } else {
        echo "erro";
    }
?>