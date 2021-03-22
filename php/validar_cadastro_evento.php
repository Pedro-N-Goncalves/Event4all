<?php
    session_start();
    require("funcoes_upload.php");
    require_once("conexao_bd.php");
    
    if (isset($_POST["nomeev"]))
    {   
        $codigoEv = rand(100000,999999);
        $nomeEv = $_POST["nomeev"];
        $realizador = $_POST["realizador"];
        $dataInicio = $_POST["datainicio"];
        $dataFim = $_POST["datafim"];
        $local = $_POST["local"];
        $capacidade = $_POST["capacidade"];
        $descricaoEv = $_POST["descricao"];
        $codadm = $_SESSION["cod"];
        
        if ($nomeEv == ""){
            echo "Insira um nome para o evento!";
        } elseif ($realizador == ""){
            echo "Insira o realizador do evento!";
        } elseif ($dataInicio == ""){
            echo "Insira a data de início do evento!";
        } elseif ($dataFim == ""){
            echo "Insira a data de término do evento!";
        } elseif ($local == ""){
            echo "Insira o local do evento!";
        } elseif ($capacidade == ""){
            echo "Insira a capacidade máxima do evento!";
        } elseif ($descricaoEv == ""){
            echo "Insira uma descrição para o evento!";
        } elseif ($_FILES["select-imagem"]["name"] == null){
            echo "Nenhuma imagem foi selecionada!";
        } else {     
            $extensao = strtolower(substr(getExtensao($_FILES["select-imagem"]["name"]), 1));
            $extensoes_validas = array("jpg", "jpeg", "png", "pns");
            
            if (!in_array($extensao, $extensoes_validas)){
                echo "A imagem deve estar em formato .jpg, .jpeg, .png ou .pns";
            }
            else 
            { 
                $resultado = salvarImagem($_FILES["select-imagem"]);
                $mensagem = $resultado[0];
                $imagem = $resultado[1];

                if ($mensagem == "Imagem salva com sucesso"){
                    $query_cadastro_ev = "INSERT INTO eventos
                                      (InicioEv, FinalEv, CodEv, NomeEv, DescEv, RealizadorEv, LocalEv, CapacidadeEv, ImagemEv, CodAdm) 
                                      VALUES ('$dataInicio','$dataFim','$codigoEv','$nomeEv','$descricaoEv','$realizador','$local','$capacidade','$imagem','$codadm')";

                    $cadastro_ev = mysqli_query($conexao,$query_cadastro_ev);

                    if ($cadastro_ev){
                        echo "sucesso";
                    }
                } 
                else 
                {
                    echo $mensagem;
                }
            }
        }
    }
?>