<?php
    require_once("conexao_bd.php"); 

    $query_proximos = "SELECT * 
                      FROM eventos 
                      WHERE InicioEv BETWEEN NOW() AND DATE_ADD(NOW(), INTERVAL 1 MONTH) 
                      ORDER BY InicioEv"; 

    $proximos = mysqli_query($conexao,$query_proximos);

    $count = 0;
    $conteudo = '';
    $modal_eventos = '';
    $control = '';
    
    if (mysqli_num_rows($proximos) != 0)
    {   
        while ($linha = mysqli_fetch_assoc($proximos))
        {
            $codigoev = $linha["CodEv"];
            $nome = $linha["NomeEv"];
            $descricao = $linha["DescEv"];
            $Realizador = $linha["RealizadorEv"];
            $Local = $linha["LocalEv"];
            $Inicio = new datetime($linha["InicioEv"]);
            $Final = new datetime($linha["FinalEv"]);
            $Capacidade = $linha["CapacidadeEv"];
            $imagem = $linha["ImagemEv"];

            if ($count == 0)
            {
                $conteudo .=    
                "<div class='item active'>
                    <div class='col-md-4 col-sm-12 evento' role='button' data-toggle='modal' data-target='#modal-evento'>
                        <input type='hidden' value='".$codigoev."'>
                        <img src='".$page.$imagem."' class='img-rounded'>
                        <div class='text'>
                            <h3 class='nome-evento'>".$nome."</h3>
                            <p>".$descricao."</p>
                        </div>
                    </div>";
            }
            elseif ($count % 3 == 0)
            {
                $conteudo .=
                "</div><div class='item'>
                    <div class='col-md-4 col-sm-12 evento' role='button' data-toggle='modal' data-target='#modal-evento'>
                        <input type='hidden' value='".$codigoev."'>
                        <img src='".$page.$imagem."' class='img-rounded'>
                        <div class='text'>
                            <h3 class='nome-evento'>".$nome."</h3>
                            <p>".$descricao."</p>
                        </div>
                    </div>";
                
                $control = 
                "<a class='left carousel-control' href='#eventosproximos' role='button' data-slide='prev'>
                    <span class='glyphicon glyphicon-chevron-left'></span>
                </a>

                <a class='right carousel-control' href='#eventosproximos' role='button' data-slide='next'>
                    <span class='glyphicon glyphicon-chevron-right'></span>
                </a>";
            }
            else
            {
                $conteudo .=    
                "<div class='col-md-4 col-sm-12 evento' role='button' data-toggle='modal' data-target='#modal-evento'>
                    <input type='hidden' value='".$codigoev."'>
                    <img src='".$page.$imagem."' class='img-rounded'>
                    <div class='text'>
                        <h3 class='nome-evento'>".$nome."</h3>
                        <p>".$descricao."</p>
                    </div>
                </div>";
            }
            $count++;
        }
        $conteudo .= "</div>";
    }
    else
    {
        $conteudo .=    
        "<div class='item active'>
            <div class='col-md-12'>
                <div class='text text-center'>
                    <h3 class='nome-evento'>Ainda não há nenhum evento disponível</h3>
                </div>
            </div>
        </div>";
        
        $control = '';
    }
    echo $conteudo;
?>