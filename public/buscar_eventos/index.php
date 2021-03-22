<?php
    session_start();
    require_once("../../php/conexao_bd.php"); 

    if (isset($_GET["busca"])){
        $busca = $_GET["busca"];
    } 

    $query_busca = "SELECT * 
                    FROM eventos 
                    WHERE NomeEv LIKE '%".$busca."%' 
                    AND InicioEv >= NOW() ";

    if (isset($_GET["sort"])){
        if ($_GET["sort"] == "proximos"){
            $query_busca .= "ORDER BY InicioEv";
        } else {
            $query_busca .= "ORDER BY InicioEv DESC";
        }
    } 

    $resultado = mysqli_query($conexao,$query_busca);

    $count = 0;
    $conteudo = '';
    $modal_eventos = '';
    $control = '';

    if (mysqli_num_rows($resultado) != 0)
    {
        while ($linha = mysqli_fetch_assoc($resultado))
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
                        <img src='../".$imagem."' class='img-rounded'>
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
                        <img src='../".$imagem."' class='img-rounded'>
                        <div class='text'>
                            <h3 class='nome-evento'>".$nome."</h3>
                            <p>".$descricao."</p>
                        </div>
                    </div>";
                
                $control = 
                "<a class='left carousel-control' href='#eventos' role='button' data-slide='prev'>
                    <span class='glyphicon glyphicon-chevron-left'></span>
                </a>

                <a class='right carousel-control' href='#eventos' role='button' data-slide='next'>
                    <span class='glyphicon glyphicon-chevron-right'></span>
                </a>";
            }
            else
            {
                $conteudo .=    
                "<div class='col-md-4 col-sm-12 evento' role='button' data-toggle='modal' data-target='#modal-evento'>
                    <input type='hidden' value='".$codigoev."'>
                    <img src='../".$imagem."' class='img-rounded'>
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
                <div class='text'>
                    <h3 class='nome-evento'>Não foi encontrado nenhum evento</h3>
                </div>
            </div>
        </div>";
        
        $control = '';
    }
?>

<?php  
    if (isset($_GET["escolha"])){
        $tema = $_GET["escolha"];
        if ($tema == "Style" || $tema == "Style-Dark"){
            setcookie("tema", $tema, time() + 3600 * 24 * 100, "/");
            header("location:index.php?busca=" . $busca);
            exit;
        }
    }
    include("../_templates/definir_tema.php");
?>

<html>
    <head>
        <!--metadados-->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Equipe 05">
        <meta name="description" content="Pesquise facilmente todos os eventos de seu interesse!">
        <meta name="keywords" content="event, event4all, procurar, eventos, busca">
        
        <!--bootstrap-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
        <!--google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet">
        
        <!--interno-->
        <script type="text/javascript" src="../_js/funcoes.js"></script>
        <link rel="stylesheet" type="text/css" href="../_css/<?php echo $tema;?>.css">
        <link rel="shortcut icon" href="../_templates/icon.png" type="image/x-icon">
        
        <title>
			Busca
        </title>
	</head>

	<body>
        <?php require("../_templates/header.php") ?>    
        <div class="container-fluid" id="content2">
            <h2 class="titulo-lista">Resultados:
                <div class="dropdown" id="filtro-eventos">
                    <button id="menufiltro" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <span class="glyphicon glyphicon-sort" style="top:2px"></span>&ensp;
                            Filtrar datas
                        <span class="glyphicon glyphicon-menu-down" style="top:2px;padding-left:5px"></span>
                    </button>

                    <ul class="menufiltro dropdown-menu" aria-labelledby="menufiltro">
                        <li>
                            <a class="dropdown-item" href="index.php?busca=<?php echo $busca; ?>&sort=proximos">
                                <span class="glyphicon glyphicon-arrow-right" style="top: 2px"></span>&ensp;Mais próximas
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="index.php?busca=<?php echo $busca; ?>&sort=distantes">
                                <span class="glyphicon glyphicon-arrow-left" style="top: 2px"></span>&ensp;Mais distantes
                            </a>
                        </li>
                    </ul>
                </div>
            </h2>
            <div class="row">
                <div class="carousel slide" data-interval="false" id="eventos">
                    <div class="carousel-inner">
                        <?php echo $conteudo; ?>
                    </div>
                    <?php echo $control; ?>
                </div>
            </div>
        </div>
        
        <input class="page" type="hidden" value="<?php echo "$page";?>">
        <?php require("../_templates/modal_evento.php"); ?>

		<footer class="footer">
			Projeto Integrado E &copy; 2018
		</footer>
	</body>
</html>