<?php
    function gerarCodigo()
    {
        $charlist = "1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $tamanho = 20;
        $character = "";
        $cod_chars = "";
        
        for ($i = 0; $i < $tamanho; $i++)
        {
            $character = substr($charlist, rand(0,35), 1);
            $cod_chars .= $character;
        }
        
        date_default_timezone_set("America/Sao_Paulo");
        $agora = getdate();
        $cod_data = $agora["year"] . "_" . $agora["yday"] . "_" . $agora["hours"] . $agora["minutes"] . $agora["seconds"];
        return $cod_data."_".$cod_chars;
    }

    function getExtensao($nome){
        return strrchr($nome, ".");
    }

    function getErro($numero_erro)
    {
        $array_erros = array(
            UPLOAD_ERR_OK => "Sem erro.",
            UPLOAD_ERR_INI_SIZE => "A imagem selecionada excede o limite máximo de 4MB.",
            UPLOAD_ERR_FORM_SIZE => "A imagem selecionada excede o limite máximo de 4MB.",
            UPLOAD_ERR_PARTIAL => "O upload da imagem foi feito parcialmente.",
            UPLOAD_ERR_NO_FILE => "Nenhuma imagem foi selecionada.",
            UPLOAD_ERR_NO_TMP_DIR => "Pasta temporária ausente.",
            UPLOAD_ERR_CANT_WRITE => "Falha ao gravar a imagem  disco.",
            UPLOAD_ERR_EXTENSION => "Uma extensão do PHP interrompeu o upload da imagem."
        );
        return $array_erros[$numero_erro];
    }

    function salvarImagem($imagem)
    {
        $arquivo_temporario = $imagem["tmp_name"];
        $nome_original = $imagem["name"];
        $nome_novo = "img_" . gerarCodigo() . getExtensao($nome_original);
        $nome_completo = "../public/_img/" . $nome_novo;
        
        if (move_uploaded_file($arquivo_temporario, $nome_completo)){
            return array("Imagem salva com sucesso", $nome_completo);
        } else {
            return array(getErro($imagem["error"]),"");
        }
    }
?>