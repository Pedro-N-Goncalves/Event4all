<?php
    session_start();
    require("funcoes_upload.php");
    require_once("conexao_bd.php");
    
    if (isset($_POST["nomeev"]))
    {   
        $codEv = $_POST["codev"];
        $nomeEv = $_POST["nomeev"];
        $realizador = $_POST["realizador"];
        $dataInicio = $_POST["datainicio"];
        $dataFim = $_POST["datafim"];
        $local = $_POST["local"];
        $capacidade = $_POST["capacidade"];
        $descricaoEv = $_POST["descricao"];
        
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
                    $query_altera_ev = "UPDATE eventos
                                      SET InicioEv = '$dataInicio', 
                                      FinalEv = '$dataFim', 
                                      NomeEv = '$nomeEv', 
                                      DescEv = '$descricaoEv', 
                                      RealizadorEv = '$realizador', 
                                      LocalEv = '$local', 
                                      CapacidadeEv = '$capacidade', 
                                      ImagemEv = '$imagem'
                                      WHERE CodEv = '$codEv'"; 

                    $altera_ev = mysqli_query($conexao,$query_altera_ev);

                    if ($altera_ev){
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